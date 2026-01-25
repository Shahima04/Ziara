<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Ziara</title>
    <link rel="stylesheet" href="{{ asset('src/output.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800 font-sans">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Header -->
<header class="bg-gray-200 p-4 text-center">
    <h1 class="text-2xl font-bold">Shop Ziara</h1>
    @auth
        <p>Welcome, {{ auth()->user()->name }}</p>
    @else
        <p><a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a></p>
    @endauth

    <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
            </form>
</header>

<!-- Main Content -->
<main class="max-w-5xl mx-auto p-4">
    <h2 class="text-xl font-semibold mb-4">Best Selling Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @forelse($bestSellingProducts as $product)
            <div class="border rounded p-3 shadow hover:shadow-lg transition">
                <h3 class="font-bold">{{ $product->name }}</h3>
                <p>Brand: {{ $product->brand }}</p>
                <p>Price: Rs {{ number_format($product->price, 2) }}</p>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-200 p-4 text-center mt-8">
    <p>&copy; 2025 Shop Ziara. All rights reserved.</p>
</footer>

</body>
</html>
