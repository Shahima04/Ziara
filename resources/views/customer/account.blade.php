
<div id="account-page" class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">My Account</h2>

    {{-- Orders / Items Table --}}
    <div class="overflow-x-auto bg-white rounded shadow p-4">
        <table id="account-table" class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left border-b">ID</th>
                    <th class="px-4 py-2 text-left border-b">Product</th>
                    <th class="px-4 py-2 text-left border-b">Quantity</th>
                    <th class="px-4 py-2 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Rows populated by JS --}}
            </tbody>
        </table>
    </div>
</div>

<script>
    const token = localStorage.getItem('sanctum_token');

    if (!token) {
        alert('Please login first to access your account.');
        window.location.href = '/login';
    }

    const tableBody = document.querySelector('#account-table tbody');

    // Fetch account items
    axios.get('/api/orders', { headers: { Authorization: `Bearer ${token}` } })
        .then(res => {
            tableBody.innerHTML = ''; // Clear table first
            res.data.forEach(item => {
                tableBody.innerHTML += `
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 border-b">${item.id}</td>
                        <td class="px-4 py-2 border-b">${item.product_name}</td>
                        <td class="px-4 py-2 border-b">${item.quantity}</td>
                        <td class="px-4 py-2 border-b">
                            <button onclick="deleteItem(${item.id})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(err => {
            console.error(err);
            alert('Failed to load account items.');
        });

    function deleteItem(id) {
        if (!confirm('Are you sure you want to delete this item?')) return;

        axios.delete(`/api/orders/${id}`, { headers: { Authorization: `Bearer ${token}` } })
            .then(res => {
                alert('Item deleted successfully.');
                // Remove row from table
                const row = tableBody.querySelector(`tr td:first-child:contains("${id}")`)?.parentNode;
                if (row) row.remove();
            })
            .catch(err => {
                console.error(err);
                alert('Failed to delete item.');
            });
    }
</script>
