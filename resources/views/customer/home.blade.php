<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziara Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 font-sans">

@include('partials.customer-navbar')
<!-- Navbar -->
<header class="bg-gray-100 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800">Ziara</a>

        <div class="space-x-4">
            @auth
                <span class="text-gray-700">Hi, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-3 py-1 text-gray-700 hover:text-black">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-1 text-gray-700 hover:text-black">Register</a>
            @endauth
        </div>
    </div>
</header>

<!-- Hero Banner -->
<section class="relative bg-gray-200 h-[400px] flex items-center justify-center mb-10">
    <img src="{{ asset('images/hero.jpg') }}" alt="Ziara Hero" class="absolute w-full h-full object-cover opacity-70">
    <div class="relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Step Into Style</h1>
        <p class="text-lg md:text-xl text-gray-700 mb-6">Discover the latest fashion for men and women</p>
       
    </div>
</section>

<!-- Best Selling Products -->


<!-- Shop by Category -->
<section class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 text-center">Shop By Category</h2>
        
    </div>
</section>

<!-- New Arrivals -->
<section class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold mb-6">New Arrivals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      
    </div>
</section>

<!-- About Section -->
<section class="bg-gray-100 py-10">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4">About Ziara</h2>
        <p class="text-gray-700 mb-6">
            Ziara Store is your one-stop online fashion destination for men and women. 
            We curate the latest trends, ensuring quality and style at every step.
        </p>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-200 py-6 mt-10 text-center">
    <p>&copy; 2026 Ziara Store. All rights reserved.</p>
</footer>

</body>
</html>
