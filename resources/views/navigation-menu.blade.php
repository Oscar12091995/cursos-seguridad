

<nav class="relative px-4 py-4 flex justify-between items-center bg-white shadow-lg" style="z-index: 900;">
    <a class="text-3xl font-bold leading-none sm:ml-2 lg:ml-32" href="{{ route('home') }}">
        <img class="rounded-xl h-16 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/forklift.png')}}" alt="Seguridad Montacargas">
    </a>
    {{-- hamburger menu --}}
    <div class="sm:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-2/4 transform -translate-y-1/2 -translate-x-1/2  lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
            {{-- navigation links --}}
                <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Inicio') }}
                </x-jet-nav-link>
        </li>
        <li>
            <x-jet-nav-link href="{{ route('courses.index') }}" :active="request()->routeIs('courses.index')" data-toggle="tab" >
                Cursos
            </x-jet-nav-link>
        </li>
        
        <li>
            @auth
            <x-jet-nav-link href="{{ route('courses.index-show') }}" :active="request()->routeIs('courses.index-show')" data-toggle="tab" >
                Mi Aprendizaje
            </x-jet-nav-link>
            @endauth
        </li>
        <li>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full py-2 mt-2 text-sm text-gray-600 font-medium text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 hover:text-gray-900 focus:text-gray-900  focus:outline-none focus:shadow-outline">
                  <span>REGISTROS</span>
                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <span class="text-gray-400 text-sm px-4 py-2 mt-2">Capacitación</span>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Registro STPS Pág. 1</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Registro STPS Pág. 2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Registro STPS Pág. 3</a>
                        <hr class="mb-2">
                        <span class="text-gray-400 text-sm px-4 py-2 mt-2">Protección civil</span>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Reg. DPCE-APF-035-2020</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Reg. DPCE-IPF-262-2020</a>
                        <hr class="mb-2">
                        <span class="text-gray-400 text-sm px-4 py-2 mt-2">Permiso REPSE</span>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Reg. AR11572-2021</a>
                    </div>
                </div>
            </div>
        </li>
 
    </ul>

    <div class="hidden sm:flex sm:items-center sm:mr-2 lg:mr-32" style="z-index: 900;">
        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                {{ Auth::user()->currentTeam->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <div class="w-60">
                            <!-- Team Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </div>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        @endif

        <!-- Settings Dropdown -->
        @auth
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ Auth::user()->name }} {{ Auth::user()->apellidos }}
                        </div>
                        <hr>
                        <div class="block px-4 py-2 text-xs text-gray-800">
                                {{ __('Manage Account') }}
                        </div>
                        <hr>
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Perfil') }}
                        </x-jet-dropdown-link>
                        @can('Leer cursos')
                        <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                            {{ __('Instructor') }}
                        </x-jet-dropdown-link>
                        @endcan

                        @can('Leer cuestionarios')
                        <x-jet-dropdown-link href="{{ route('quizzes.index') }}">
                            Cuestionarios
                        </x-jet-dropdown-link>
                        @endcan

                        @can('Ver dashboard')
                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                            Administración
                        </x-jet-dropdown-link>
                        
                        @endcan
                       

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        @else
            <div class="top-1/2 left-full">
                <a href="{{ route('login') }}" class="p-2 pl-5 pr-5 transition-colors duration-700 transform border bg-blue-500 hover:bg-white hover:text-blue-900 hover:border-blue-900 text-gray-100 text-sm rounded-lg focus:border-4 border-indigo-300">Iniciar Sesión</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 p-2 pl-5 pr-5 transition-colors duration-700 transform border bg-red-500 border-red-500 hover:bg-transparent hover:text-black hover:border-black text-gray-100 text-sm rounded-lg focus:border-4 ">Registrate</a>
            @endif
            </div>
        @endauth
    </div>
</nav>
  <!-- Responsive Navigation Menu -->
<div class="navbar-menu z-50 hidden md:hidden absolute "  style="z-index: 1000;">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img class="rounded-xl h-16 w-full object-cover" width="100%" height="100%" src="{{asset('images/inicio/forklift.png')}}" alt="Seguridad Montacargas">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li>
                    @auth
                        <div class="flex items-center px-4 mb-8">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 mr-3">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif
            
                            <div>
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>    
                    @endauth
                </li>
                <li class="mb-1">
                    {{-- <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Home</a> --}}
                    {{-- nav link mobile --}}
                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-jet-responsive-nav-link>
                   
                </li>
                <li class="mb-1">
                    @auth
                        <x-jet-responsive-nav-link href="{{ route('courses.index') }}" :active="request()->routeIs('courses.index')">
                            {{ __('Cursos') }}
                        </x-jet-responsive-nav-link>
                    @endauth
                </li>
                <li class="mb-1">
                    @auth
                        <x-jet-responsive-nav-link href="{{ route('courses.index-show') }}" :active="request()->routeIs('courses.index-show')">
                            {{ __('Mi Aprendizaje') }}
                        </x-jet-responsive-nav-link>
                    @endauth
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                @auth
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
                        @can('Leer cursos')
                        <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }} " :active="request()->routeIs('instructor.courses.index')">
                            Instructor
                        </x-jet-responsive-nav-link>
                         @endcan
                         @can('Leer cuestionarios')
                        <x-jet-responsive-nav-link href="{{ route('quizzes.index') }}" :active="request()->routeIs('admin.home')">
                            Cuestionarios
                        </x-jet-responsive-nav-link>
                        @endcan
                        @can('Ver dashboard')
                        <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                            Administración
                        </x-jet-responsive-nav-link>
                        @endcan
        
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif
        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-jet-responsive-nav-link>
                        </form>
        
                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>
        
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>
        
                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>
        
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-jet-responsive-nav-link>
                            @endcan
        
                            <div class="border-t border-gray-200"></div>
        
                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>
        
                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        @endif
                    </div>
                @else
                    <a href="{{ route('login') }}" class="mr-2 ml-2 block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold transition-colors duration-700 transform border bg-blue-500 hover:bg-white hover:text-blue-900 hover:border-blue-900 text-gray-100 focus:border-4 border-indigo-300 rounded-xl">Iniciar Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="mr-2 ml-2 block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold transition-colors duration-700 transform border bg-red-500 hover:bg-white hover:text-black hover:border-black text-gray-100 focus:border-4 border-indigo-300 rounded-xl ">Registrate</a>
                    @endif
                @endauth
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span>Copyright © 2021</span>
            </p>
        </div>
    </nav>
</div>