<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - Ziara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    @include('partials.customer-navbar')

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">My Cart</h1>

        <p class="text-gray-700 mb-4">You have no items in your cart.</p>

        {{-- Cart Table Example --}}
        <table class="w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">Quantity</th>
                    <th class="p-3 text-left">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-3">Product 1</td>
                    <td class="p-3">$29.99</td>
                    <td class="p-3">2</td>
                    <td class="p-3">$59.98</td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>
