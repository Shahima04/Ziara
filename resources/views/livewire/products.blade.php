<div class="max-w-full mx-auto bg-white p-6 rounded shadow">

    {{-- PRODUCTS LIST --}}
    @if($view === 'list')
        <h2 class="text-xl font-bold mb-4">Products List</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <button wire:click="showCreateForm"
            class="flex items-center px-3 py-3 mb-6 text-white rounded-2xl bg-emerald-700 hover:bg-emerald-600">
            <i class="fas fa-plus mr-2"></i> Add Product
        </button>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-[#8f8266] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Image</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Category</th>
                        <th class="px-4 py-3 text-left">Brand</th>
                        <th class="px-4 py-3 text-left">Tag</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Discount</th>
                        <th class="px-4 py-3 text-left">Stock</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $product->id }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-12 h-12 object-cover rounded-lg border">
                            </td>
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->category }}</td>
                            <td class="px-4 py-3">{{ $product->brand }}</td>
                            <td class="px-4 py-3">{{ $product->tag }}</td>
                            <td class="px-4 py-3">Rs {{ $product->price }}</td>
                            <td class="px-4 py-3 text-red-600">
                                {{ $product->discount_price ?? '—' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of Stock' }}
                            </td>
                            <td class="px-4 py-3 flex space-x-2">
                                <button wire:click="edit({{ $product->id }})"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">
                                    Edit
                                </button>

                                <button wire:click="delete({{ $product->id }})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- CREATE PRODUCT --}}
    @if($view === 'create')
        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Add New Product</h2>
                <button wire:click="showList" class="text-sm text-gray-500 hover:underline">
                    ← Back
                </button>
            </div>

            <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
                <input type="text" wire:model="name" placeholder="Product Name" class="w-full border p-2 rounded">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <input type="number" wire:model="price" placeholder="Price (Rs)" class="w-full border p-2 rounded">

                <select wire:model="gender" class="w-full border p-2 rounded">
                    <option value="">Select Gender</option>
                    <option value="Women">Women</option>
                    <option value="Men">Men</option>
                </select>

                <textarea wire:model="description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

                <select wire:model="category" class="w-full border p-2 rounded">
                    <option value="">Select Category</option>
                    <option>Dresses</option>
                    <option>Women Bags</option>
                    <option>Women Accessories</option>
                    <option>Women Shoes</option>
                    <option>Shirts</option>
                    <option>Trousers</option>
                    <option>Men Shoes</option>
                    <option>Men Accessories</option>
                </select>

                <input type="text" wire:model="brand" placeholder="Brand" class="w-full border p-2 rounded">

                <select wire:model="tag" class="w-full border p-2 rounded">
                    <option>None</option>
                    <option>Popular</option>
                    <option>Best Selling</option>
                    <option>Featured</option>
                    <option>New Arrival</option>
                </select>

                <input type="number" wire:model="discount_price" placeholder="Discount Price" class="w-full border p-2 rounded">
                <input type="number" wire:model="discount_percent" placeholder="Discount Percent" class="w-full border p-2 rounded">
                <input type="number" wire:model="stock" placeholder="Stock Quantity" class="w-full border p-2 rounded">

                <input type="file" wire:model="image">

                <button type="submit" class="bg-emerald-700 hover:bg-emerald-600 text-white px-4 py-2 rounded">
                    Save Product
                </button>
            </form>
        </div>
    @endif

    {{-- EDIT PRODUCT --}}
    @if($view === 'edit')
        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Edit Product</h2>

            <form wire:submit.prevent="update" class="space-y-4">
                <input type="text" wire:model="name" placeholder="Product Name" class="w-full border p-2 rounded">
                <input type="number" wire:model="price" placeholder="Price" class="w-full border p-2 rounded">
                <input type="text" wire:model="category" placeholder="Category" class="w-full border p-2 rounded">
                <input type="number" wire:model="stock" placeholder="Stock" class="w-full border p-2 rounded">

                <button type="submit" class="bg-emerald-700 hover:bg-emerald-600 text-white px-4 py-2 rounded">
                    Update Product
                </button>

                <button type="button" wire:click="showList" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cancel
                </button>
            </form>
        </div>
    @endif
</div>
