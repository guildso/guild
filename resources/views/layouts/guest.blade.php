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
        @include('partials.dark-mode-toggle')

    </head>
    <body>
        <div class="relative flex justify-center overflow-hidden min-h-screen bg-gray-50 dark:bg-gray-900">
            
            <div class="container relative z-50 flex-shrink-0 w-full font-sans antialiased text-gray-900 md:max-w-xl">
                {{ $slot }}
            </div>

            
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>

    

    </body>
</html>
