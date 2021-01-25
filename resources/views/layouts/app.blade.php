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


        <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  
        @livewireStyles

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="bg-gray-100">

        <header class="shadow bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center">
        
                <a href="/">
                    <img class="h-16 mr-3" src="{{asset('img/logo_principal.jpeg')}}">
                </a>
        
                <div class="flex-1 relative">
        
                    <div class="mb-1 flex justify-between">
                        <h1 class="text-primary text-xl uppercase">Programa de beneficios</h1>


                        <form action="{{route('logout')}}" method="POST">

                            @csrf

                            <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-sign-out-alt text-lg mr-1"></i>
                                {{ session('customer')->name }}
                            </button>
                        </form>

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

        @isset($js)
            {{$js}}
        @endisset
        
        @livewireScripts
    </body>
</html>