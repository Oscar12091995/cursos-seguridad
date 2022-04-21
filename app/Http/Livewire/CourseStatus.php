<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Livewire\Component;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Quize;
use Illuminate\Http\Request;
use App\Models\Result;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    public function render()
    {
        $quizzes = Quize::where('status', 'publicado')->where(
            function($query){
                $query->whereNull('finished_at')->orWhere('finished_at','>',now());
            }
        )->withCount('questions')->paginate(5);
        $results = auth()->user()->results;
        return view('livewire.course-status', compact('quizzes','results'));
    }

 

    public function mount(Course $course){
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if(!$lesson->completed){
                $this->current = $lesson;
                break;
            }
        }
        if (!$this->current ) {
            # code...
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);
    }

    //metodos

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
        /* cambiamos leccion actual */                  
    }

    public function completed(){
        if($this->current->completed){
            //eliminar registro
            $this->current->users()->detach(auth()->user()->id);    
        }else{
            //agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //propiedades computadas

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
        /* calcular indice */
    }

    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
    $i = 0;
    foreach ($this->course->lessons as $lesson) {
        # code...
        if ($lesson->completed) {
            # code...
            $i++;
        }
    }
    $advance = ($i * 100)/($this->course->lessons->count());
    return round($advance, 2);
    }

    public function download(){
        return response()->download(storage_path('app/public/' . $this->current->resource->url));
    }

    public function quiz($slug){
        $quiz = Quize::whereSlug($slug)->with('questions.my_answer','my_result')->first() ?? abort(404, "Cuestinario no econtrado");

        if($quiz->my_result){
            return view('quiz.quiz_result', compact('quiz'));
        }

        return view('quiz.quiz', compact('quiz'));
    }

    public function quiz_detail($slug){
        $quiz = Quize::whereSlug($slug)->with('my_result','topTen.user')->withCount('questions')->first() ?? abort(404, 'Cuestinario no econtrado');
        return view('quiz.quiz_detail', compact('quiz'));
    }
    
    public function result(Request $request, $slug){
        $quiz = Quize::with('questions')->whereSlug($slug)->first() ?? abort(404,'Cuestinario no econtrado');
        $correct = 0;
        if($quiz->my_result){
            abort(404, 'Has tomado este cuestionario antes');
        }

        foreach($quiz->questions as $question){
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);
            
            if($question->correct_answer ===$request->post($question->id)){
                $correct += 1;
            }
        }
        $points = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions)-$correct;
        Result::create([
            'user_id' => auth()->user()->id,
            'quize_id' => $quiz->id,
            'point' => $points,
            'correct' => $correct ,
            'wrong' => $wrong,
        ]);

        return redirect()->route('quiz.detail',$quiz->slug)->withSuccess("Cuestionario completado. tu puntuación: ".$points);
    }
}
