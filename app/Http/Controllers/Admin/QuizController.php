<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Models\Course;
use App\Models\Quize;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'course_id' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:Leer cuestionarios')->only('index');
        $this->middleware('can:Crear cuestionarios')->only('create', 'store');
        $this->middleware('can:Editar cuestionarios')->only('edit', 'update');
        $this->middleware('can:Eliminar cuestionarios')->only('destroy');
        
    }

    public function index()
    {

        $quizzes = Quize::withCount('questions');  
        if(request()->get('title')){
            $quizzes = $quizzes->where('title', 'LIKE', "%".request()->get('title')."%");
        };
        if(request()->get('status')){
            $quizzes = $quizzes->where('status',request()->get('status'));
        };
        $quizzes = $quizzes->paginate(5);
        
        return view('admin.quiz.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.quiz.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        Quize::create($request->post());
        return redirect()->route('quizzes.index')->with('crear', 'Cuestionario creado con exito!');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quize::with('topTen.user')->withCount('questions')->find($id) ?? abort(404,'Cuestionario no encontrado');
        
        return view('admin.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $quiz = Quize::withCount('questions')->find($id) ?? abort(404, 'Cuestionario no encontrado');
        return view('admin.quiz.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz = Quize::find($id) ?? abort(404, 'Cuestionario no encontrado');
        Quize::find($id)->update($request->except(['_method','_token']));

        return redirect()->route('quizzes.index')->with('editar', 'Cuestionario actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quize::find($id) ?? abort(404, 'Cuestionario no encontrado');
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('eliminar', 'Cuestionario eliminado con exito!');
    }
}
