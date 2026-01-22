@extends('admin.layout')

@section('page-title','Products')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add New Product</h2>

    <!-- Laravel Form -->
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Product Name" 
               class="w-full border p-2 rounded @error('name') border-red-500 @enderror" 
               value="{{ old('name') }}" required>
        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <input type="number" step="0.01" name="price" placeholder="Price (Rs)" 
               class="w-full border p-2 rounded @error('price') border-red-500 @enderror"
               value="{{ old('price') }}" required>
        @error('price')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <select name="gender" class="w-full border p-2 rounded" required>
            <option value="">Select Gender</option>
            <option value="Women" {{ old('gender') == 'Women' ? 'selected' : '' }}>Women</option>
            <option value="Men" {{ old('gender') == 'Men' ? 'selected' : '' }}>Men</option>
        </select>

        <textarea name="description" placeholder="Description" 
                  class="w-full border p-2 rounded">{{ old('description') }}</textarea>

        <label class="block font-medium">Category</label>
        <select name="category" class="w-full border p-2 rounded" required>
            @php
                $categories = ['Dresses','Women Bags','Women Accessories','Women Shoes','Shirts','Trousers','Men Shoes','Men Accessories'];
            @endphp
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <input type="text" name="brand" placeholder="Brand" class="w-full border p-2 rounded" value="{{ old('brand') }}">

        <label class="block font-medium">Tag</label>
        <select name="tag" class="w-full border p-2 rounded">
            @php
                $tags = ['None','Popular','Best Selling','Featured','New Arrival'];
            @endphp
            @foreach($tags as $tag)
                <option value="{{ $tag }}" {{ old('tag') == $tag ? 'selected' : '' }}>{{ $tag }}</option>
            @endforeach
        </select>

        <input type="number" step="0.01" name="discount_price" placeholder="Discount Price (Optional)" 
               class="w-full border p-2 rounded" value="{{ old('discount_price') }}">
        <input type="number" step="0.01" name="discount_percent" placeholder="Discount Percent (Optional)" 
               class="w-full border p-2 rounded" value="{{ old('discount_percent') }}">

        <input type="number" name="stock" placeholder="Stock Quantity" class="w-full border p-2 rounded" value="{{ old('stock') }}" required>

        <label class="block font-medium">Image</label>
        <input type="file" name="image" required>

        <button type="submit" class="bg-emerald-700 hover:bg-emerald-600 text-white px-4 py-2 rounded cursor-pointer">
            Add Product
        </button>
    </form>
</div>
@endsection
