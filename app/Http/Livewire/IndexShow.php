<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Services\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class IndexShow extends Component
{
    use WithPagination;
    public function render()
    {
        /* $courses = (auth()->user()->courses_enrolled)
        ->where('status', '3')
        ->paginate(8); */
        $courses = (auth()->user()->courses_enrolled);
        $cart = new Cart;
        $cart->clear();
        
        return view('livewire.index-show', compact('courses'));
    }

    
}
