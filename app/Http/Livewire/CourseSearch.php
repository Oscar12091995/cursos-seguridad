<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseSearch extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.course-search');
    }

    public function getResultsProperty(){
        return Course::where('title', 'LIKE', '%' . $this->search . '%')
        ->where('status', 3)->take(6)->get();
    }
}
