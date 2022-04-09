<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>Cursos Seguridad Industrial Islander</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/inicio/reflective-vest.png') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.css" integrity="sha512-xcz2kgNDovRs9/wYWii2XSBEDlpaTq99iewiGN3PR/pNnPaSDiw6wHpXU0kFyonevdVj/MkeesxMII8sgolFCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('js/curp.js')}}"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        
        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
        
        @stack('script')
    </body>
</html>
