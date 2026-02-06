<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - Ziara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    <!-- Navigation -->
    @include('navigation-menu')  <!-- your normal Blade navigation -->

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">My Cart</h1>

        <!-- Cart Table -->
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
                <tr>
                    <td colspan="4" class="p-3 text-center">Loading cart...</td>
                </tr>
            </tbody>
        </table>
    </main>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchCart();
        });

        function fetchCart() {
            axios.get('/api/cart', { withCredentials: true })
                .then(res => {
                    const tbody = document.getElementById('cart-table-body');
                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
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
                                <td class="p-3">$${item.product.price.toFixed(2)}</td>
                                <td class="p-3">${item.quantity}</td>
                                <td class="p-3">$${total}</td>
                            </tr>`;
                    });
                })
                .catch(err => {
                    console.error('Error fetching cart:', err);
                    const tbody = document.getElementById('cart-table-body');
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="4" class="p-3 text-center text-red-500">Failed to load cart.</td>
                        </tr>`;
                });
        }
    </script>

</body>
</html>
