@extends('admin.layout')

@section('page-title','Products')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Products List</h2>

    <!-- Add Product Button -->
    <a href="{{ route('admin.products.create') }}" 
       class="flex items-center px-3 py-3 mb-6 text-white rounded-2xl transition cursor-pointer bg-emerald-700 hover:bg-emerald-600">
        <i class="fas fa-plus mr-2"></i> Add Product
    </a>

    <div class="overflow-x-auto" id="productsTable">
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
                    <td class="px-4 py-3 font-medium text-gray-700">{{ $product->name }}</td>

                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            @if($product->category == 'Dresses') bg-pink-100 text-pink-700
                            @elseif($product->category == 'Mens Collection') bg-blue-100 text-blue-700
                            @elseif($product->category == 'Accessories') bg-purple-100 text-purple-700
                            @elseif($product->category == 'Shoes Collection') bg-green-100 text-green-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ $product->category }}
                        </span>
                    </td>

                    <td class="px-4 py-3">{{ $product->brand }}</td>

                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            @if($product->tag == 'Popular') bg-green-100 text-green-700
                            @elseif($product->tag == 'Best Selling') bg-blue-100 text-blue-700
                            @elseif($product->tag == 'Featured') bg-purple-100 text-purple-700
                            @elseif($product->tag == 'New Arrival') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ $product->tag }}
                        </span>
                    </td>

                    <td class="px-4 py-3 font-semibold text-gray-900">Rs {{ $product->price }}</td>

                    <td class="px-4 py-3 text-red-600 font-medium">
                        @if($product->discount_price)
                            Rs {{ $product->discount_price }}
                            <span class="text-xs text-gray-500">({{ $product->discount_percent }}% OFF)</span>
                        @else
                            —
                        @endif
                    </td>

                    <td class="px-4 py-3">
                        @if($product->stock > 0)
                            <span class="text-green-600 font-semibold">{{ $product->stock }} in stock</span>
                        @else
                            <span class="text-red-600 font-semibold">Out of Stock</span>
                        @endif
                    </td>

                    <td class="px-4 py-3 flex space-x-2">
                        <!-- Edit -->
                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                           class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md transition">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md transition">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
