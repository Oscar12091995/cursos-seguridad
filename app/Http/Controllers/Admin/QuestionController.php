<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Quize;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:Leer preguntas')->only('index');
        $this->middleware('can:Crear preguntas')->only('create', 'store');
        $this->middleware('can:Editar preguntas')->only('edit', 'update');
        $this->middleware('can:Eliminar preguntas')->only('destroy');
        
    }

    public function index($id)
    {
        $quiz = Quize::whereId($id)->with('questions')->first();
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quize::find($id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        Quize::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->with('crear', 'Pregunta creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id, $id)
    {
        return $quiz_id.' - '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        $question = Quize::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'No se encontró ninguna prueba o pregunta');
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id, $question_id)
    {
        Quize::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());
        return redirect()->route('questions.index', $quiz_id)->with('editar', 'Pregunta actualizada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$question_id)
    {
        Quize::find($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index', $quiz_id)->with('eliminar', 'Pregunta eliminada con exito!');
    }
}
