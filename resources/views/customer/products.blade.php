<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Ziara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    @include('partials.customer-navbar')

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">Our Products</h1>

        @if(request('tag'))
            <p class="text-gray-700 mb-4">Showing products for: <strong>{{ request('tag') }}</strong></p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Example Product Cards --}}
            <div class="bg-white p-4 rounded shadow">
                <img src="/images/product1.jpg" alt="Product 1" class="w-full h-48 object-cover mb-2 rounded">
                <h2 class="font-bold text-lg">Product 1</h2>
                <p class="text-gray-700">Description here.</p>
                <p class="font-semibold mt-2">$29.99</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <img src="/images/product2.jpg" alt="Product 2" class="w-full h-48 object-cover mb-2 rounded">
                <h2 class="font-bold text-lg">Product 2</h2>
                <p class="text-gray-700">Description here.</p>
                <p class="font-semibold mt-2">$39.99</p>
            </div>
            {{-- Add more product cards as needed --}}
        </div>
    </main>

</body>
</html>
