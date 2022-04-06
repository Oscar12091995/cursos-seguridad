<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error!</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="min-w-screen min-h-screen bg-blue-100 flex items-center p-5 lg:p-20 overflow-hidden relative">
        <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left">
            <div class="w-full md:w-1/2">
                <div class="mb-10 lg:mb-20">
                    <div class="w-full lg:w-6/12 px-4">
                        <img src="{{asset('images/LOGO.PNG')}}" alt="">
                    </div>
                </div>
                <div class="mb-10 md:mb-20 text-gray-600 font-light">
                    <h3 class="font-black uppercase text-5xl lg:text-3xl text-yellow-500 mb-10">404!</h3>
                    <p>Error! la página que intentas buscar no existe.</p>
                    <p>Intente buscar de nuevo o utilice el botón volver a continuación</p>
                </div>
                <div class="mb-20 md:mb-0">
                    <a class="text-lg font-light outline-none focus:outline-none transform transition-all hover:scale-110 text-yellow-500 hover:text-yellow-600" href="/"><i class="fas fa-arrow-left mr-2"></i>Volver</a>
                </div>
            </div>
            <div class="w-full md:w-1/2 text-center">
                <img src="{{asset('images/sign-304093_1280.png')}}" alt="">
            </div>
        </div>
        <div class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform"></div>
        <div class="w-96 h-full bg-yellow-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform"></div>
    </div>
</body>
</html>
