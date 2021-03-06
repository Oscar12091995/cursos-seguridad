<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['delete'];

    public function render()
    {
        $courses = Course::where('title', 'like', '%' . $this->search . '%')
        ->where('user_id', auth()->user()->id)
        ->latest('id')
        ->paginate(8);
        
        return view('livewire.instructor.courses-index', compact('courses'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }

    

    public function delete(Course $course){
        $course->delete();
    }
}
