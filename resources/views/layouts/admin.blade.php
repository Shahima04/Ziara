<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Page')</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-white min-h-screen">

    <main class="w-full mx-auto px-2 py-2">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
