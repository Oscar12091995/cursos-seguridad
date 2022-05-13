<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
        
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme en este dispositivo') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-jet-button>
            </div>
        </form>

        
    </x-jet-authentication-card> --}}

    <div class="bg-white md:h-screen sm:h-full w-screen sm:my-0 my-12">
        <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
            <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                <div class="flex flex-col w-full md:w-1/2 p-4">
                    <div class="flex flex-col flex-1 justify-center mb-8">
                        <h1 class="mb-2 text-3xl font-black tracking-tighter text-black md:text-5xl title-font text-center">Iniciar Sesión</h1>
                        <div class="w-full mt-4">
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="flex flex-col mt-4">
                                    <x-jet-label for="email" value="{{ __('Correo') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                <div class="flex flex-col mt-4">
                                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>
                                <div class="flex items-center mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme en este dispositivo') }}</span>
                                    </label>
                                </div>
                                <div class="flex flex-col mt-8">
                                   {{--  @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste la contraseña?') }}
                                    </a>
                                    @endif
                                     --}}
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                        Login
                                    </button>
                                    {{-- <x-jet-button class="ml-4">
                                        {{ __('Iniciar') }}
                                    </x-jet-button> --}}
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                @if (Route::has('password.request'))
                                <a class="no-underline hover:underline text-blue-dark text-xs" href="{{ route('password.request') }}">
                                    ¿Olvidaste la contraseña?
                                </a>
                                @endif
                                
                            </div>
                            <div class="text-center">
                                <a class="no-underline text-center hover:underline text-blue-dark text-xs " href="{{route('home')}}"><i class="fas fa-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="items-center text-center">
                        <x-jet-label value="{{ __('© Seguridad Industrial ISLANDER S.A de C.V') }}" />
                    </div>
                </div>
                
                <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url({{asset('images/inicio/security-element-1582318_640.jpg')}}); background-size: cover; background-position: center center;"></div>
            </div>
        </div>
    </div>
</x-guest-layout>
