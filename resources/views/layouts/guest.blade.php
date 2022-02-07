<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>[x-cloak]{ display:none }</style>

        @livewireStyles

    </head>
    <body>
        <div class="relative flex overflow-hidden">
            <div class="container relative z-50 flex-shrink-0 w-full font-sans antialiased text-gray-900 md:max-w-xl">
                {{ $slot }}
            </div>
            <img src="/images/auth-bg.jpg" class="relative z-10 object-cover w-full h-screen">

            <div class="absolute inset-0 z-20 w-full h-full opacity-25 bg-gradient-to-l from-black to-transparent"></div>
            <svg class="absolute top-0 right-0 z-20 w-8 h-auto mt-5 mr-5 text-white fill-current" viewBox="0 0 1284 1479" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g transform="translate(-608 -511)"><g transform="translate(608 511)"><path d="M683.972 1290.151l-41.96 19.542-41.977-19.522c-141.32-65.735-467.021-255.734-439.302-599.21 14.258-151.09 23.272-252.296 29.06-319.72l5.71-66.765 446.53-137.92 446.527 137.92 5.712 66.783c4.245 49.511 10.249 117.232 18.745 209.006H913.264c-4.468-48.398-8.22-89.865-11.361-125.244l-259.87-80.265-259.872 80.265c-5.594 63.132-13.131 145.767-23.291 253.286-15.462 191.766 168.32 319.934 283.084 380.657 90.57-48.02 224.132-138.345 268.744-270H641.89V659.83H1120.445c.839 8.922 1.698 18.028 2.576 27.322 27.992 346.838-297.711 537.205-439.05 602.998m597.599-616.868c-29.585-312.649-36.5-409.134-37.918-431.22l-3.031-57.169L642.05.005 43.58 185.127l-3.107 55.245c-.952 15.482-7.013 105.79-38.288 436.718-32.77 405.99 309.406 680.41 612.42 791.637l27.429 10.063 27.389-10.063c303.014-111.267 645.132-386.348 612.148-795.444"></path></g></g></g></svg>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    </body>
</html>
