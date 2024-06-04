<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" type="text/css" href="/vendor/trix-2.0.8/trix.css">
        <script type="text/javascript" src="/vendor/trix-2.0.8/trix.umd.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="/vendor/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="/vendor/datatables/dataTables.css" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-dark2 dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script type="text/javascript" src="/vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="/vendor/jquery-3.7.1/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="/vendor/datatables/dataTables.js"></script>
        
        @isset($script)
            {{ $script }}
        @endisset
    </body>
</html>
