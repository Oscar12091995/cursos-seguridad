<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Quize;
use Livewire\WithPagination;

class CoursesQuiz extends Component
{


    use WithPagination;

    public $course, $search; 
    protected $listeners = ['render' => 'render'];

    public function mount(Quize $quize){
        $this->quize = $quize;
    }
    public function render()
    {
        $quizzes = $this->course->exams()->withCount('questions')
        /* $quizzes = Quize::withCount('questions');   */
        ->where('title', 'LIKE', '%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.instructor.courses-quiz', compact('quizzes'));
    }

  
}
