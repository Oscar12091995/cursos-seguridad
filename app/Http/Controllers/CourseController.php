<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;
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

    public function applyCoupon(Course $course){
        session()->remove("coupon");
        session()->save();

        $code = request("coupon");
        $coupon = Coupon::available($code)->first();
        if (!$coupon) {
            return back()->with('danger', 'El cupón que has introducido no existe');
        }

        $totalCourses = $coupon->courses()->where("id");

        if ($totalCourses) {
            session()->put("coupon", $code);
            session()->save();
            
            return back()->with('success','El cupón se ha aplicado correctamente');
            
                        
        }
        return back()->with('error', 'El cupón no se puede aplicar');

        

    }

    protected function removeCoupon():void {
        session()->remove("coupon");
        session()->save();
    }

    

}
