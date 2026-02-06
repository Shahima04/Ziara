<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziara</title>
    @vite('resources/css/app.css') {{-- This loads Tailwind / your CSS --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body class="bg-white">
@livewire('navigation-menu')

    <main class="max-w-7xl mx-auto px-6 py-6">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</body>
</html>
