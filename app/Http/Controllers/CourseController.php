<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Livewire\WithPagination;

class CourseController extends Controller
{
    //
    use WithPagination;
    /* public function mycourses(){
        $courses = auth()->user()->courses_enrolled;
        
       return view('courses.index-show', compact('courses'));
    } */
    
    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){

        $this->authorize('published', $course);

        $similares = Course::where('category_id', $course->category_id)
        ->where('id', '!=', $course->id)
        ->where('status', 3)
        ->latest('id')
        ->take(4)
        ->get();

        return view('courses.show', compact('course', 'similares'));
    }

    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);
        
        return redirect()->route('courses.status', $course);
    }
}