<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quize;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //  
   /*  $usersCont = User::count();
    $coursesCont = Course::count();
    $enterprisesCont = Enterprises::count();
    $coursespend = Course::all()->where('status', 2)->count(); */
    /* $teachersCont = User::has('courses_dictated')->count(); */

    public function index(){
        $usersCont = User::count();
        $coursesCont = Course::count();
        $coursespend = Course::all()->where('status', 2)->count();
        $examscont = Quize::count();
        $teachersCont = User::has('courses_dictated')->get();
        /* $teachersCont = User::all(); */
        return view('admin.index', ['users_count' => $usersCont, 'courses_count' => $coursesCont, 'coursespend_count' => $coursespend, 'exams_count' => $examscont, 'teachers_count' => $teachersCont]);
    }
    
}
