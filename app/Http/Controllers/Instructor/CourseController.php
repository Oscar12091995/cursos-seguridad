<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use App\Models\Quize;
use App\Models\User;



use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $course;
    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
        
        
    }

    public function index()
    {
        //
        return view('instructor.courses.index');
    }
    public function mount(Course $course){
        $this->course->id = $course;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        
        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'hcourse' => 'required',
            'atematic' => 'required',
            'file' => 'image',
        ]);
        $course = Course::create($request->all());

        

        if ($request->file('file')) {
           $url = Storage::put('courses', $request->file('file'));

           $course->image()->create([
            'url' => $url
           ]);
        }
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $this->authorize('dicatated', $course);
        //
        $categories = Category::pluck('name', 'id');
        
        $levels = Level::pluck('name', 'id');

        $prices = Price::pluck('name', 'id');
     
        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $course->status = 2;
        $this->authorize('dicatated', $course); 
        $course->students()->detach(auth()->user()->id);
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'hcourse' => 'required',
            'atematic' => 'required',
            'file' => 'image',
        ]);
        $course->update($request->all());
        $course->students()->detach(User::all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            if ($course->image) {
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url
                ]);
            }else{
                $course->image()->create([
                    'url' => $url
                ]);
            }

        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return view('instructor.courses.index');
    }


    public function goals(Course $course){
        $this->authorize('dicatated', $course);
        return view('instructor.courses.goals', compact('course'));
        
    }

    public function quiz(Course $course){
        $this->authorize('dicatated', $course);
        return view('instructor.exam.index', compact('course'));
        
    }

    public function status(Course $course){
        $course->status = 2;
        $course->save();

        if ($course->observation) {
            $course->observation->delete();
        }
        return redirect()->route('instructor.courses.edit', compact('course'));
    }
    public function observation(Course $course){
        return view('instructor.courses.observation', compact('course'));
    }


    public function createexam()
    {
        //

        return view('instructor.exam.create');
    }

    
    
   

}
