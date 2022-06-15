<x-app-layout>
    @inject("cart", "App\Services\Cart")

    <section class="text-gray-600" x-data="app">
        <div class="flex flex-col justify-center mt-12">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow md:shadow-lg rounded-sm border border-gray-200">
                @if (session('añadir'))
                    <div class=" text-sm text-blue-600 bg-blue-200 border border-blue-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                        <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-blue-500">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <strong class="mr-1 ml-2 py-8">{{session('añadir')}}</strong>
                        <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                            <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-blue-900" aria-hidden="true" >×</span>
                        </button>
                    </div>
                @endif
                @if (session('eliminado'))
                    <div class=" text-sm text-blue-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                        <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-red-500">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <strong class="mr-1 ml-2 py-8">{{session('eliminado')}}</strong>
                        <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                            <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
                        </button>
                    </div>
                @endif
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-gray-800">Usted va a comprar</div>
                </header>
    
                <div class="overflow-x-auto p-3">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-600 bg-gray-50">
                            <tr>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Curso</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Categoría</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Precio</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-center">Acciones</div>
                                </th>
                            </tr>
                        </thead>
    
                      
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse ($cart->getContent() as $course)
                            <!-- record 1 -->
                            <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{Str::limit($course->subtitle, 20)}}
                                       
                                    </div>
                                    <span class="text-sm text-red-500">{{ Str::limit($course->title, 20) }}</span>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">{{$course->category->name}}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{$course->price->value}} MXN
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="flex justify-center">
                                        <a href="{{ route("remove_course_from_cart", ["course" => $course]) }}">
                                            <svg class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-4">
                                    <div class="text-center justify-items-center font-semibold text-gray-800">
                                        {!! __("No tienes nada para comprar") !!} <a class="text-blue-900 font-extrabold" href="{{ route('courses.index') }}">VOLVER A CURSOS</a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
    
                        </tbody>

                    </table>
                </div>
    
                <!-- total amount -->
                <div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-4">
                    <div>{{ __("Total: :total MXN", ["total" => $cart->totalAmount()]) }}</div>
                </div>
                <div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-4">
                    <hr>
                    <div class="text-blue-600">  
                        @if(session()->has("coupon"))
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>
                                <div class="pt-2" style="font-size: 25px">
                                    {{ __("Precio con descuento :total", ["total" => $cart->totalAmountWithDiscount()]) }}
                                </div>
                            </td>
                        </tr>
                        @endif
                    </div>
                </div>
                <div class="flex justify-end px-2 space-x-4 w-full">
                    @if (session('danger'))
                        <div class=" text-sm w-80 text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                            <strong class="mr-1">{{session('danger')}}</strong>
                            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                                <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
                            </button>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class=" text-sm w-80 text-green-600 bg-green-200 border border-green-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                            <strong class="mr-1">{{session('success')}}</strong>
                            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                                <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-green-900" aria-hidden="true" >×</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class=" text-sm w-80 text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                            <strong class="mr-1">{{session('error')}}</strong>
                            <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                                <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
                            </button>
                        </div>
                    @endif
                </div>
               
                <div class="flex justify-end p-4 sm:items-center sm:justify-center">          
                    <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                    <form class="intro-newslatter" action="{{ route('apply_coupon') }}" method="POST">
                        @csrf
                        <input class="sm:w-40 md:w-80 order-1" type="text" name="coupon" placeholder="{{ __("¿Tienes un cupón de descuento?") }}" required value="{{ session("coupon") }}"/>
                        <button type="submit" class="order-2 py-2 px-2 md:mt-auto font-semibold text-xl text-white transition duration-500 ease-in-out transform bg-red-600 rounded-lg  hover:bg-red-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                            {{ __("Canjear") }}
                        </button>
                    </form>
                </div>
               
                <div class="flex justify-end items-center">
                    @if($cart->hasProducts() === 1)
                        
                            <div class="col-12 mb-5">
                               @if ($cart->totalAmountWithDiscount() == 0)
                               <form action="{{route('courses.enrolled', $course)}}" method="post">
                                @csrf
                                    <button class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                                    Llevar curso
                                    </button>
                                </form>
                               @else
                                <a href="{{ route('payment.checkout', $course) }}" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">{{ __("Proceder a pagar") }}</a>
                               @endif
                            </div>
                       
                    @else
                        <div class="px-6 text- py-6 text-gray-600 uppercase">No es posible proceder al pago Colocaste el mismo Curso debes de Eliminar y proceder a pagar el curso </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- <div>
        <div class="row">
            <div class="table-responsive pt-5 mt-5">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>{{ __("Curso") }}</th>
                        <th>{{ __("Precio") }}</th>
                        <th>{{ __("Acciones") }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->getContent() as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->price->value }}</td>
                            <td>
                                <a
                                    href="{{ route("remove_course_from_cart", ["course" => $course]) }}"
                                    class="btn btn-outline-danger"
                                >
                                    {{ __("Eliminar") }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-results">
                                    {!! __("No tienes ningún curso en el carrito") !!}
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-dark brand-text font-weight-bold">
                        <tr>
                            <td colspan="2">
                                <form class="intro-newslatter" action="{{ route('apply_coupon') }}" method="POST">
                                    @csrf
                                    <input type="text" name="coupon" placeholder="{{ __("¿Tienes un cupón de descuento?") }}" value="{{ session("coupon") }}"/>
                                    <button type="submit" class="site-btn">
                                        {{ __("Canjear") }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="pt-2" style="font-size: 25px">
                                    {{ __("Total :total", ["total" => $cart->totalAmount()]) }}
                                </div>
                            </td>
                        </tr>
                        @if(session()->has("coupon"))
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>
                                    <div class="pt-2" style="font-size: 25px">
                                        {{ __("Con descuento :total", ["total" => $cart->totalAmountWithDiscount()]) }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tfoot>
                </table>
            </div>
        </div>

        @if($cart->hasProducts())
            <div class="row">
                <div class="col-12 mb-5">
                    <a href="{{ route('payment.checkout', $course) }}" class="site-btn float-right">{{ __("Procesar pedido") }}</a>
                </div>
            </div>
        @endif
    </div> --}}
{{-- AGREGAR TARJETAS DE LOS INSTRUCTORES MERAMENTE INFORMATIVA
     AGREGAR DIAPOSITIVAS DE OBJETIVOS Y TEMARIO EN LAS PRESENTACIONES
    --}}
    
</x-app-layout>