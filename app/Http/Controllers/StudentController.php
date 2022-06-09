<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ManageCart;
use App\Traits\Student\ManageCourses;
use App\Traits\Student\ManageOrders;
use App\Traits\Student\ManageWishlists;
use App\Models\Coupon;
use App\Models\Course;
use App\Services\Cart;

class StudentController extends Controller
{
    /* use ManageCart, ManageCourses, ManageOrders, ManageWishlists; */
   /*  use ManageCart; */

    public function showCart() {
        return view("payment.cart");
    }

    public function addCourseToCart(Course $course) {
        $cart = new Cart;
        $cart->addCourse($course);
        /* session()->flash("message", ["success", __("Curso añadido a la orden correctamente")]); */
        /* session()->with('añadir', 'Curso añadido al carrito'); */
        return redirect(route('cart'))->with('añadir', 'Curso añadido a la orden correctamente');
    }

    public function removeCourseFromCart(Course $course) {
        $cart = new Cart;
        $cart->removeCourse($course->id);
        /* session()->flash("message", ["success", __("Curso eliminado del carrito correctamente")]); */
        /* session()->with('eliminado', 'Curso eliminado del carrito correctamente'); */
        return back()->with('eliminado', 'Curso eliminado de la orden correctamente');
    }

    public function applyCoupon() {
        session()->remove("coupon");
        session()->save();

        $code = request("coupon");
        $coupon = Coupon::available($code)->first();
        if (!$coupon) {
            /* session()->flash("message", ["danger", __("El cupón que has introducido no existe")]); */
            return back()->with('danger', 'El cupón que has introducido no existe');
            /* return back(); */
        }

        $cart = new Cart;
        $coursesInCart = $cart->getContent()->pluck("id");
        $totalCourses = $coupon->courses()->whereIn("id", $coursesInCart)->count();

        if ($totalCourses) {
            session()->put("coupon", $code);
            session()->save();
            /* session()->flash("message", ["success", __("El cupón se ha aplicado correctamente")]); */
            /* session()->with('success','El cupón se ha aplicado correctamente'); */
            return back()->with('success','El cupón se ha aplicado correctamente');
        }
        /* session()->flash("message", ["danger", __("El cupón no se puede aplicar")]); */
        return back()->with('error', 'El cupón no se puede aplicar');
        
    }
    
}
