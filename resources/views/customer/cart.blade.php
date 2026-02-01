<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - Ziara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    @livewire('navigation-menu')

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
            <tbody id="cart-table-body">
            </tbody>
            <script>
            function fetchCart() {
                axios.get('/api/cart', { withCredentials: true })
                    .then(res => {
                        const tbody = document.getElementById('cart-table-body');
                        tbody.innerHTML = '';

                        if (res.data.length === 0) {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="4" class="p-3 text-center">Your cart is empty.</td>
                                </tr>`;
                            return;
                        }

                        res.data.forEach(item => {
                            const total = (item.product.price * item.quantity).toFixed(2);
                            tbody.innerHTML += `
                                <tr>
                                    <td class="p-3">${item.product.name}</td>
                                    <td class="p-3">$${item.product.price}</td>
                                    <td class="p-3">${item.quantity}</td>
                                    <td class="p-3">$${total}</td>
                                </tr>`;
                        });
                    })
                    .catch(err => console.error('Error fetching cart:', err));
            }

            // Fetch cart on page load
            fetchCart();
    </script>
        </table>
    </main>

</body>
</html>
