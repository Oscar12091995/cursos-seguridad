<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/png" href="{{ asset('images/inicio/reflective-vest.png') }}">

        <title>Cursos Seguridad Industrial Islander</title>
        
        

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        
      <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles
        
        @stack('css')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 items-center justify-center">
            @livewire('navigation-menu')

           

            <!-- Page Content -->
            <div class="md:max-w-7xl w-full mx-auto px-4 py-8 grid grid-cols-5 gap-4">
                <aside class="mt-4 sticky top-0 order-1 sm:order-1">
                    <h1 class="font-bold text-2xl mb-4" style="color: rgb(32, 56, 100)"><a href="{{route('instructor.courses.index')}}" class="mr-2 text-2xl" data-toggle="tooltip"
                        data-placement="top" title="Regresar"><i class="fas fa-angle-left cursor-pointer text-2xl"></i></a>Edición del Curso </h1>
                    <ul class="text-sm text-gray-800 font-light mb-2">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit', $course)}}">Información del Curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.curriculum', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del Curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.goals', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del Curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.quiz', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.quiz', $course)}}">Examen del Curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes del Curso</a>
                        </li>
                        @if ($course->observation)
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-blue-900 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.observation', $course)}}">Observaciones del curso</a>
                        </li>
                        
                            
                        @endif
                    </ul>
                    @switch($course->status)
                        @case(1)
                        <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold transition-colors duration-700 transform border bg-red-500 hover:bg-white hover:text-black hover:border-black text-gray-100 focus:border-4 border-indigo-300 rounded-xl">Solicitar aprobación del curso</button>
                        </form>
                            @break
                        @case(2)
                                <div class="flex bg-yellow-500 max-w-sm mb-4 shadow-lg rounded overflow-hidden">
                                    <div class="w-16 bg-yellow">
                                        <div class="p-4">
                                            <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M503.191 381.957c-.055-.096-.111-.19-.168-.286L312.267 63.218l-.059-.098c-9.104-15.01-23.51-25.577-40.561-29.752-17.053-4.178-34.709-1.461-49.72 7.644a66 66 0 0 0-22.108 22.109l-.058.097L9.004 381.669c-.057.096-.113.191-.168.287-8.779 15.203-11.112 32.915-6.569 49.872 4.543 16.958 15.416 31.131 30.62 39.91a65.88 65.88 0 0 0 32.143 8.804l.228.001h381.513l.227.001c36.237-.399 65.395-30.205 64.997-66.444a65.86 65.86 0 0 0-8.804-32.143zm-56.552 57.224H65.389a24.397 24.397 0 0 1-11.82-3.263c-5.635-3.253-9.665-8.507-11.349-14.792a24.196 24.196 0 0 1 2.365-18.364L235.211 84.53a24.453 24.453 0 0 1 8.169-8.154c5.564-3.374 12.11-4.381 18.429-2.833 6.305 1.544 11.633 5.444 15.009 10.986L467.44 402.76a24.402 24.402 0 0 1 3.194 11.793c.149 13.401-10.608 24.428-23.995 24.628z"/><path d="M256.013 168.924c-11.422 0-20.681 9.26-20.681 20.681v90.085c0 11.423 9.26 20.681 20.681 20.681 11.423 0 20.681-9.259 20.681-20.681v-90.085c.001-11.421-9.258-20.681-20.681-20.681zM270.635 355.151c-3.843-3.851-9.173-6.057-14.624-6.057a20.831 20.831 0 0 0-14.624 6.057c-3.842 3.851-6.057 9.182-6.057 14.624 0 5.452 2.215 10.774 6.057 14.624a20.822 20.822 0 0 0 14.624 6.057c5.45 0 10.772-2.206 14.624-6.057a20.806 20.806 0 0 0 6.057-14.624 20.83 20.83 0 0 0-6.057-14.624z"/></svg>
                                        </div>
                                    </div>
                                    <div class="w-auto text-grey-darker items-center p-4">
                                        <span class="text-lg font-bold pb-4">
                                            Espera!
                                        </span>
                                        <p class="leading-tight">
                                            Este curso esta en revisión
                                        </p>
                                    </div>
                                </div>
                            @break
                        @case(3)
                                <div class="flex bg-green-500 max-w-sm mb-4 shadow-lg rounded overflow-hidden">
                                    <div class="w-16 bg-green">
                                        <div class="p-4">
                                            <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M468.907 214.604c-11.423 0-20.682 9.26-20.682 20.682v20.831c-.031 54.338-21.221 105.412-59.666 143.812-38.417 38.372-89.467 59.5-143.761 59.5h-.12C132.506 459.365 41.3 368.056 41.364 255.883c.031-54.337 21.221-105.411 59.667-143.813 38.417-38.372 89.468-59.5 143.761-59.5h.12c28.672.016 56.49 5.942 82.68 17.611 10.436 4.65 22.659-.041 27.309-10.474 4.648-10.433-.04-22.659-10.474-27.309-31.516-14.043-64.989-21.173-99.492-21.192h-.144c-65.329 0-126.767 25.428-172.993 71.6C25.536 129.014.038 190.473 0 255.861c-.037 65.386 25.389 126.874 71.599 173.136 46.21 46.262 107.668 71.76 173.055 71.798h.144c65.329 0 126.767-25.427 172.993-71.6 46.262-46.209 71.76-107.668 71.798-173.066v-20.842c0-11.423-9.259-20.683-20.682-20.683z"/><path d="M505.942 39.803c-8.077-8.076-21.172-8.076-29.249 0L244.794 271.701l-52.609-52.609c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.077-8.077 21.172 0 29.249l67.234 67.234a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058L505.942 69.052c8.077-8.077 8.077-21.172 0-29.249z"/></svg>
                                        </div>
                                    </div>
                                    <div class="w-auto text-grey-darker items-center p-4 text-white">
                                        <span class="text-lg font-bold pb-4">
                                            Excelente!
                                        </span>
                                        <p class="leading-tight text-sm">
                                            Este curso se encuentra publicado
                                        </p>
                                    </div>
                                </div>
                            @break
                        @default
                    @endswitch
                  
                </aside>
                <div class="col-span-4 px-6 py-4 order-2 sm:order-2">
                    <main class="px-6 py-4 text-gray-900">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')
       
        @livewireScripts

        @stack('script')

        @isset($js)
            {{$js}}
        @endisset
       

       
    </body>
    
</html>
