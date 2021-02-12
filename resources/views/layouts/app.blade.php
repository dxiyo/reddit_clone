<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://kit.fontawesome.com/e2e919f470.js" crossorigin="anonymous"></script>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-200 dark:bg-gray-900">
            
            @yield('nav')
            

            @yield('header')

            <!-- Page Content -->
            <main class="xl:w-11/12 mx-auto">
                {{-- {{ $slot }} --}}

                <div class="mx-auto w-full lg:w-11/12 xl:w-9/12 h-full mt-6 rounded flex">
                    <div class="w-11/12 mx-auto lg:w-2/3 rounded height-60 flex-col">
                        @yield('content')
                    </div>
                    <div class="hidden lg:block lg:w-1/3 rounded height-60 ml-8">
                        @yield('sidebar')
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        {{-- ckeditor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    </body>
</html>
