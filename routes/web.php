<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseStatus;

use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Livewire\CourseIndex;
use App\Http\Livewire\IndexShow;


Route::get('/', HomeController::class )->name('home');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

Route::get('cursos',[CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::get('mis-cursos/', IndexShow::class)->middleware('auth')->name('courses.index-show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');


Route::group(['middleware' => 'auth'], function(){
Route::get('quiz/detay/{slug}',[CourseStatus::class, 'quiz_detail'])->name('quiz.detail');
Route::get('quiz/{slug}',[CourseStatus::class, 'quiz'])->name('quiz.join');
Route::post('quiz/{slug}/result',[CourseStatus::class, 'result'])->name('quiz.result');
});



Route::get('quizzes/{id}/details', [QuizController::class,'show'])->whereNumber('id')->name('quizzes.details');
Route::get('quizzes/{id}', [QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class,'destroy'])->whereNumber('id')->name('questions.destroy');

Route::resource('quizzes', QuizController::class);


Route::resource('quiz/{quiz_id}/questions', QuestionController::class);




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    