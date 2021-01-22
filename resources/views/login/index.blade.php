<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        {{-- Tailwind --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- Font awesome --}}
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
<body class="bg-cover bg-center h-screen py-8" style="background-image: url({{asset('img/women-5818607_1920.jpg')}})">
    
    <div class="container mx-auto relative h-full flex items-center justify-center">
        <img class="absolute left-0 top-0 h-24" src="{{asset('img/logo_principal.jpeg')}}">

        <article class="w-96 bg-white bg-opacity-50">
            <header class="bg-primary py-2">
                <h1 class="text-center font-bold text-white text-xl">INGRESAR</h1>
            </header>

            <div class="p-4">
                <form action="{{route('session')}}" method="POST">
                    @csrf

                    <input name="rut" autocomplete="off" class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" placeholder="Ingrese el RUT de la empresa"/>

                    @if (session('info'))
                        <span class="text-sm text-red-600 font-bold">{{session('info')}}</span>
                    @endif

                    <div class="flex justify-center mt-2">
                        <button class="btn btn-secondary" type="submit">Iniciar sesión</button>
                    </div>

                </form>
            </div>
        </article>

    </div>

</body>
</html>