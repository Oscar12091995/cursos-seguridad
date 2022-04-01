<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CoursesReviews extends Component
{
    public $courseid, $comment;

    public $rating = 5;

   public function mount(Course $course){
       $this->courseid = $course->id;
   }
    public function render()
    {
        $course = Course::find($this->courseid);

        return view('livewire.courses-reviews', compact('course'));
    }
    public function store(){
        $course = Course::find($this->courseid);

        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
    }
}
