<?php
namespace App\Traits\Teacher;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

trait ManageCoupons {


    public function __construct()
    {
        $this->middleware('can:Leer Cupones')->only('index');
        $this->middleware('can:Crear Cupones')->only('create', 'store');
        $this->middleware('can:Editar Cupones')->only('edit', 'update');
        $this->middleware('can:Eliminar Cupones')->only('destroy');
        
    }
    
    public function index() {
        
        $coupons = Coupon::forTeacher();
        return view('admin.cupones.index', compact('coupons'));
    }

    public function create() {
        $coupon = new Coupon;
        $title = __("Crear un nuevo cupón");
        $textButton = __("Dar de alta el cupón");
        $options = ['route' => ['admin.cupones.store']];
        return view('admin.cupones.create', compact('title', 'coupon', 'options', 'textButton'));
    }

    public function store(CouponRequest $request, Coupon $coupon) {

        try {
            \DB::beginTransaction();
            $input = $this->couponInput();
            $coupon = Coupon::create($input);
            $coupon->courses()->sync(request("courses"), false);
            \DB::commit();
         /*    session()->flash("message", ["success", __("Cupón creado satisfactoriamente")]); */
            return redirect(route('admin.cupones.index', ['coupon' => $coupon]))->with('crear', 'Cupón creado satisfactoriamente');
        } catch (\Throwable $exception) {
            \DB::rollBack();
            session()->flash("message", ["danger", $exception->getMessage()]);
            return back();
        }
        
    }

    public function edit(Coupon $coupon) {
        $coupon->load("courses");
        $title = __("Editar el cupón :coupon", ["coupon" => $coupon->code]);
        $textButton = __("Actualizar cupón");
        $options = ['route' => ['admin.cupones.update', ["coupon" => $coupon]]];
        $update = true;
        return view('admin.cupones.edit', compact('title', 'coupon', 'options', 'textButton', 'update'));
    }

    public function update(CouponRequest $request, Coupon $coupon) {
        try {
            \DB::beginTransaction();
            $input = $this->couponInput();
            $coupon->fill($input)->save();
            $coupon->courses()->sync(request("courses"));
            \DB::commit();
           /*  session()->flash("message", ["success", __("Cupón actualizado satisfactoriamente")]); */
            return redirect(route('admin.cupones.index', ['coupon' => $coupon]))->with('editar','Cupón actualizado satisfactoriamente');
        } catch (\Throwable $exception) {
            \DB::rollBack();
            session()->flash("message", ["danger", $exception->getMessage()]);
            return back();
        }
    }

    public function destroy(Coupon $coupon) {
        /* if (request()->ajax()) {
            $coupon->delete();
            session()->flash("message", ["success", __("El cupón :code ha sido eliminado correctamente", [
                "code" => $coupon->code
            ])]);
        } */
        $coupon->delete();
        return redirect()->route('admin.cupones.index', $coupon)->with('eliminar', 'Cupón eliminado con exito!');
    }

    protected function couponInput(): array {
        return request()->only(
            "code", "description", "discount_type", "discount", "enabled", "expires_at"
        );
    } 
} 
