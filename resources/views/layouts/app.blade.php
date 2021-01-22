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

        @livewireStyles

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="bg-gray-100">

        <header class="shadow overflow-hidden bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center">
        
                <a href="/">
                    <img class="h-16 mr-3" src="{{asset('img/logo_principal.jpeg')}}">
                </a>
        
                <div class="flex-1 relative">
        
                    <div class="mb-1 flex justify-between">
                        <h1 class="text-primary text-xl uppercase">Programa de beneficios</h1>
                    </div>
        
                    <div class="absolute w-screen flex items-center">
                        <span class="h-2 w-2 bg-secondary rounded-full block "></span>
                        <div class="h-0.5 bg-secondary w-full"></div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        
        @livewireScripts
    </body>
</html>