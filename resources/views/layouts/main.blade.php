<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ pondok('nama') ?? env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Attr -->
    <link rel="stylesheet" href="{{ asset('attr/css/tailwind.output.css') }}" />
    <script src="{{ asset('attr/js/init-alpine.js') }}"></script>

    @yield('topJquery')
    @livewireStyles

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
        @include('main.dekstop-sidebar')
        @include('main.mobile-sidebar')
        <div class="flex flex-col flex-1">
            @include('main.header')
            <main class="h-full w-full overflow-y-auto text-gray-900 dark:text-gray-300">
                <div class="px-4 py-4">
                    <section class="h-full pb-6 overflow-y-auto">
                        <div class="container grid px-2 mx-auto">
                            {{ $slot }}
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
    @yield('botJquery')
</body>

</html>
