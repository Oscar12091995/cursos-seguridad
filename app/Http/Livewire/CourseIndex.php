<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use App\Services\Cart;
use Livewire\WithPagination;


class CourseIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;
    public $price_id;
    public function render()
    {

        $categories = Category::all();

        $levels = Level::all();
        $prices = Price::all();
        $courses = Course::where('status', '3')
        ->category($this->category_id)
        ->level($this->level_id)
        ->price($this->price_id)
        ->latest('id')
        ->paginate(9);
        $cart = new Cart;
        $cart->clear();
        return view('livewire.course-index', compact('courses', 'categories', 'levels', 'prices'));

        
    }

    public function resetFilters(){
        $this->reset(['category_id', 'level_id', 'price_id']);
    }
    
    /*  public function mycourses(){
     
        $courses = (auth()->user()->courses_enrolled)->where('status', '3');
        
       return view('livewire.index-show', compact('courses'));
    } */
   
}
