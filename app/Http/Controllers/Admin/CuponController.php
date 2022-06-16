<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Models\Course;
use App\Traits\Teacher\ManageCoupons;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;


class CuponController extends Controller
{

    use ManageCoupons;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:Leer Cupones')->only('index');
        $this->middleware('can:Crear Cupones')->only('create', 'store');
        $this->middleware('can:Editar Cupones')->only('edit', 'update');
        $this->middleware('can:Eliminar Cupones')->only('destroy');
        
    } 

    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.cupones.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        /* return view('admin.cupones.create', compact('courses')); */
       /*  $courses = \App\Models\Course::forTeacher()->pluck("title", "id"); */
        $coupon = new Coupon;
        $title = __("Crear un nuevo cupón");
        $textButton = __("Dar de alta el cupón");
        $options = ['route' => ['admin.cupones.store']];
        return view('admin.cupones.create', compact('title', 'coupon', 'options', 'textButton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request, Coupon $coupon)
    {
        
     /* $request->validate([
            'codigo' => 'required|unique:coupons',
            'valor' => 'required|numeric',
            
        ]);

    
        $coupon = Coupon::create($request->all());   

        
        return redirect()->route('admin.cupones.index', compact('coupon'))->with('crear', 'El cupón se creo con exito'); */

      /*   try {
            \DB::beginTransaction();
            $input = $this->couponInput();
            $coupon = Coupon::create($input);
            $coupon->courses()->sync(request("courses"), false);
            \DB::commit();
            session()->flash("message", ["success", __("Cupón creado satisfactoriamente")]);
            return redirect(route('admin.cupones.index', ['coupon' => $coupon]));
        } catch (\Throwable $exception) {
            \DB::rollBack();
            session()->flash("message", ["danger", $exception->getMessage()]);
            return back();
        } */

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
    /*     $courses = Course::all();
        return view('admin.cupones.edit', compact('coupon', 'courses')); */
        $coupon->load("courses");
        $title = __("Editar el cupón :coupon", ["coupon" => $coupon->code]);
        $textButton = __("Actualizar cupón");
        $options = ['route' => ['admin.cupones.update', ["coupon" => $coupon]]];
        $update = true;
        return view('admin.cupones.edit', compact('title', 'coupon', 'options', 'textButton', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
      /*   $request->validate([
            'codigo' => 'required|unique:coupons,codigo,'. $coupon->id,
            'valor' => 'required|numeric',     
        ]);


        $coupon->update($request->all());
    
        return redirect()->route('admin.cupones.index', $coupon)->with('editar', 'El cupón se actualizo con exito'); */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
      /*   $coupon->delete();
        return redirect()->route('admin.cupones.index', $coupon)->with('eliminar', 'Precio eliminado con exito!'); */
        $coupon->delete();
        return redirect()->route('admin.cupones.index', $coupon)->with('eliminar', 'Cupón eliminado con exito!');
    }

    protected function couponInput(): array {
        return request()->only(
            "code", "description", "discount_type", "discount", "enabled", "expires_at"
        );
    } 
}
