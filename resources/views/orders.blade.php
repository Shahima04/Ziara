@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-xl font-bold mb-6">Customer Orders</h1>

    <!-- Table -->
    <table class="w-full table-auto bg-white shadow rounded" id="orders-table">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Order ID</th>
                <th class="p-3 text-left">Customer</th>
                <th class="p-3 text-left">Products</th>
                <th class="p-3 text-left">Total Quantity</th>
                <th class="p-3 text-left">Created At</th>
            </tr>
        </thead>
        <tbody>
            <!-- JS will populate this -->
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    function fetchOrders() {
        axios.get('/api/orders', { withCredentials: true })
            .then(res => {
                const tbody = document.querySelector('#orders-table tbody');
                tbody.innerHTML = '';

                res.data.orders.forEach(order => {
                    const products = order.order_items.map(item => 
                        `${item.product.name} x ${item.quantity}`
                    ).join(', ');

                    const totalQuantity = order.order_items.reduce((sum, item) => sum + item.quantity, 0);

                    tbody.innerHTML += `
                        <tr class="border-b">
                            <td class="p-3">${order.id}</td>
                            <td class="p-3">${order.user.name} (${order.user.email})</td>
                            <td class="p-3">${products}</td>
                            <td class="p-3">${totalQuantity}</td>
                            <td class="p-3">${new Date(order.created_at).toLocaleString()}</td>
                        </tr>
                    `;
                });
            })
            .catch(err => {
                if (err.response && err.response.status === 401) {
                    alert('Please login as admin first.');
                    window.location.href = '/login';
                } else if (err.response && err.response.status === 403) {
                    alert('Unauthorized. Admin access only.');
                } else {
                    console.error(err);
                    alert('Failed to fetch orders');
                }
            });
    }

    // Fetch orders on page load
    fetchOrders();
});
</script>

@endsection
