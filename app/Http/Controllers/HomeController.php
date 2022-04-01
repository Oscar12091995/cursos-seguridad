<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Price;


class HomeController extends Controller
{
    //
    public $price_id;
    public function __invoke()
    {
        $courses = Course::where('status', '3')
        ->latest('id')
        ->get()
        ->take(8);
       /*  return $courses; */

        return view('welcome', compact('courses'));
    }
}
