<x-app-layout>
    <div class="min-w-screen min-h-screen bg-gray-50 py-5 px-24">
      
        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
            <div class="w-full">
                <div class="-mx-3 md:flex items-start">
                    <div class="px-3 md:w-7/12 lg:pr-10">
                        <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                            <div class="w-full flex items-center">
                                <div class="overflow-hidden rounded-lg w-20 h-20 border border-gray-200">
                                    <img class="object-cover w-full h-full" src="{{url('storage/'.$course->image->url)}}" alt="{{$course->title}}">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-semibold uppercase text-gray-600">{{$course->title}}</h6>
                                    <p class="text-gray-400">Inst. {{$course->teacher->name}}</p>
                                    
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-600 text-xl">${{$course->price->value}}</span><span class="font-semibold text-gray-600 text-sm">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                            <div class="w-full flex items-center">
                                <div class="flex-grow">
                                    <span class="text-gray-600">Total</span>
                                </div>
                                <div class="pl-3">
                                    <span class="font-semibold text-gray-400 text-sm">MXN</span> <span class="font-semibold">${{$course->price->value}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 justify-center items-center md:w-5/12">
                        <div class="justify-center">
                            <a class="text-center block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold cursor-pointer" href="{{route('payment.pay', $course)}}"><i class="mdi mdi-lock-outline mr-1"></i> Pagar ahora</a>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="text-center text-gray-400 text-sm">
                <a href="https://seguridadislander.com.mx" target="_blank" class="focus:outline-none underline text-gray-400"><i class="mdi mdi-beer-outline"></i> Copyright © 2021 Seguridad Industrial Islander S.A de C.V </a>
            </div>
        </div>
    </div>

</x-app-layout>