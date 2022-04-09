<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use PHPUnit\Framework\Constraint\Count;

class PaymentOrder extends Component
{

    public $course;

    protected $listeners = ['payOrder'];

    public function mount(Course $course){
        $this->course = $course;
    }

    public function payOrder(Course $course){

        $course->students()->attach(auth()->user()->id);
        
        return redirect()->route('courses.status', $course);
    }

    public function render()
    {
        return view('livewire.payment-order');
    }
}
