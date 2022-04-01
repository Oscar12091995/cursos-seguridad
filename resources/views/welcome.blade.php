<x-app-layout>
    {{-- seccoin banner de creación de registro --}}
        <section class="flex items-center justify-center bg-black bg-opacity-50 transition duration-300 ease-in-out" style="height: 500px; background-image: url({{asset('images/desk-g0d0bb4863_1920.jpg')}});">
            <div class="bg-center bg-cover w-full h-full flex items-center justify-center bg-black bg-opacity-50 transition duration-300 ease-in-out" >
                <div class="text-center ">
                        <p class="text-xl font-medium tracking-wider text-gray-300">¿Quieres potenciar tus conocimientos en seguridad?</p>
                        <h1 class="mt-6 text-3xl font-bold text-white md:text-5xl">ISLANDER</h1>    
                        <h2 class="mt-6 text-3xl font-bold text-white md:text-5xl">Seguridad Industrial</h2>
                    <div class="flex justify-center mt-8">
                        
                        @auth
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform bg-indigo-600 rounded hover:bg-indigo-500">Crear Cuenta</a>
                            @endif
                        @endauth
                    
                    </div>
                </div>
            </div>
        </section>
    {{-- fin seccion banner de creación de registro --}}

    {{-- seccion de tablero de contenido --}}
        <section class="bg-white mt-24">
            <h4 class="text-grey-600 text-center text-3xl mb-6">CONTENIDO</h4>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/pexels-elevate-1267338.jpg')}}" alt="Seguridad Montacargas">
                        <header class="mt-2">
                            <h2 class="text-center text-xl text-grey-700">Cursos Especializados</h2>
                        </header>
                        <p class="text-sm text-gray-600 text-center">Encontraras una gran variedad de cursos de seguridad industrial que te ayudaran en tu aprendizaje</p>
                    </figure>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/pexels-mohammad-danish-891059.jpg')}}" alt="Test de Seguridad">
                        <header class="mt-2">
                            <h2 class="text-center text-xl text-grey-700">Test de Aprendizaje</h2>
                        </header>
                        <p class="text-sm text-gray-600 text-center">Encontraras pequeños pruebas de lo aprendido, para asegurar tu aprendizaje obtenido del curso</p>
                    </figure>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/pexels-pixabay-272980.jpg')}}" alt="Material de Seguridad Industrial">
                        <header class="mt-2">
                            <h2 class="text-center text-xl text-grey-700">Material de Estudio</h2>
                        </header>
                        <p class="text-sm text-gray-600 text-center">Hemos puesto a tu disposición diverso material para tu aprendizaje eficiente, firme y se facil comprensión</p>
                    </figure>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/pexels-startup-stock-photos-7354.jpg')}}" alt="Seguridad Industrial Online">
                        <header class="mt-2">
                            <h2 class="text-center text-xl text-grey-700">Metodología de aprendizaje</h2>
                        </header>
                        <p class="text-sm text-gray-600 text-center">Desarrollamos y mejoramos continuamente nuestros cursos para ofrecer el mejor rendimiento para su aprendizaje</p>
                    </figure>
                </article>
            </div>
        </section>
    {{-- fin seccion de tablero de contenido --}}
    
    {{-- seccion info --}}
        {{-- <section class="bg-white mt-24">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                width="100%" height="100%" src="{{asset('images/fire-fighting-4495488_640.jpg')}}">
                            </div>
                        </div>
                    </div>
        
                    <div class="mt-8 md:mt-0 md:w-2/3">
                        <h3 class="text-5xl font-semibold text-gray-800">Aprendizaje efectivo en ambito de Seguridad</h3>
                        <ul class="max-w-md mt-4">
                            <li class="text-2xl"><i class="far fa-check-square text-2xl text-blue-900"></i> Aprendizaje a tu medida.</li>
                            <li class="text-2xl"><i class="far fa-check-square text-2xl text-blue-900"></i> Instructores calificados.</li>
                            <li class="text-2xl"><i class="far fa-check-square text-2xl text-blue-900"></i> .</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
    {{-- fin seccion info --}}

    

    {{-- seccion boton de cursos ISLANDER --}}
    <section class="bg-white mt-20">
        <div class="max-w-7xl px-6 py-16 mx-auto">
            <div class="px-8 py-12 bg-blue-900 rounded-md md:px-20 md:flex md:items-center md:justify-between">
                <div>
                    <h4 class="text-2xl font-semibold text-white">Catalogo de Cursos</h4>
                    <p class="max-w-md mt-4 text-gray-400">Ve la lista que hemos creado para ti</p>
                </div>
                
                <a class="block px-8 py-2 mt-6 text-lg font-medium text-center bg-transparent border-2 border-white text-white rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300"
                    href="{{ route('courses.index') }}">Lista de cursos
                </a>
               
            </div>
        </div>
    </section>
    {{-- fin seccion boton de cursos ISLANDER --}}

    <section class="bg-white mt-24 ">
        <div class="md:flex justify-center text-center my-5">
            <h2 class="text-3xl font-semibold text-gray-800">Cursos creados recientemente</h2>
        </div>
     <div class="px-14 md:ml-36 ml-10 mr-10 md:w-10/12 flex flex-col items-center justify-center md:px-20 md:flex md:items-center md:justify-between ">
        <div class="glider-contain items-center ">
            <div class="glider items-center">
                    @foreach ($courses as $course)
                        <x-course-card :course="$course" class="mx-2"/>
                    @endforeach
            </div>
            <button aria-label="Previous" class="glider-prev bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400"><i class="fas fa-angle-left"></i></button>
            <button aria-label="Next" class="glider-next bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400"><i class="fas fa-angle-right"></i></button>
            <div role="tablist" class="dots"></div>
        </div>
     </div>
    </section>  
        

        {{-- seccion footer --}}
        <footer>
            <div class=" bg-white">
                <div class="max-w-2xl mx-auto text-white py-10">
                    <div class="text-center">
                        <div class="flex justify-center my-10">
                            <img class="object-cover object-center rounded-md shadow" alt="logo Seguridad Industrial ISLANDER" width="65%" height="65%" src="{{asset('images/LOGO.png')}}">
                        </div>
                    </div>
                    <div class="mt-28 flex flex-col md:flex-row md:justify-between items-center text-sm text-black">
                        <p class="order-2 md:order-1 mt-8 md:mt-0"> &copy; Seguridad Industrial ISLANDER </p>
                        <div class="order-1 md:order-2">
                            <a class="px-2" href="https://seguridadislander.com.mx" target="blank">Sobre Nosotros</a>
                            <a class="px-2 border-l border-gray-700" href="https://seguridadislander.com.mx/contacto" target="blank">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
         {{--fin seccion footer --}}

         <script>
           /* new Glider(document.querySelector('.glider'), {
            slidesToScroll: 1,
            slidesToShow: 3.5,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
            }); */

            new Glider(document.querySelector('.glider'), {
            // Mobile-first defaults
            slidesToShow: 1,
            slidesToScroll: 1,
            scrollLock: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            },
            responsive: [
                {
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
                },{
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3.3,
                    slidesToScroll: 1,
                    itemWidth: 100,
                    duration: 0.25
                }
                }
            ]
            });
         </script>
</x-app-layout>

