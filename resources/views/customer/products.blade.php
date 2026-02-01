@extends('layouts.customer')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-6">

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4 shadow">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-7xl mx-auto p-4 bg-white rounded-xl shadow mb-6">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-2">
            <input type="hidden" name="gender" value="{{ request('gender') }}">

            <select name="category" class="border border-gray-300 rounded px-2 py-1">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category }}" {{ request('category') == $cat->category ? 'selected' : '' }}>
                        {{ $cat->category }}
                    </option>
                @endforeach
            </select>

            <select name="price_sort" class="border border-gray-300 rounded px-2 py-1">
                <option value="low" {{ request('price_sort') == 'low' ? 'selected' : '' }}>Low to High</option>
                <option value="high" {{ request('price_sort') == 'high' ? 'selected' : '' }}>High to Low</option>
            </select>

            <select name="tag" class="border border-gray-300 rounded px-2 py-1">
                <option value="">All Tags</option>
                @foreach($tags as $tg)
                    <option value="{{ $tg->tag }}" {{ request('tag') == $tg->tag ? 'selected' : '' }}>
                        {{ $tg->tag }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-gray-400 text-white px-2 py-1 rounded hover:bg-gray-500 transition">
                Apply Filters
            </button>
        </form>
    </div>

    <h1 class="text-3xl font-bold mb-6">Our Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="relative bg-white p-4 rounded-xl shadow hover:shadow-2xl transition">
                
                <a href="{{ route('products.show', $product->id) }}">
                    @if ($product->discount_percent > 0)
                        <div class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded z-10">
                            {{ $product->discount_percent }}% OFF
                        </div>
                    @endif

                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="w-full h-64 object-cover rounded mb-4"
                         alt="{{ $product->name }}">

                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>

                    <p class="text-gray-700 font-medium">
                        Rs. {{ number_format($product->price, 2) }}
                        @if($product->discount_price)
                            <span class="line-through text-gray-400 ml-2">
                                Rs. {{ number_format($product->discount_price, 2) }}
                            </span>
                        @endif
                    </p>

                    <p class="text-sm text-gray-500 line-clamp-2">{{ $product->description }}</p>
                </a>

                <p class="text-sm font-semibold mt-2">
                    Stock:
                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
                    </span>
                </p>

                @auth
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" 
                            {{ $product->stock <= 0 ? 'disabled' : '' }}
                            class="mt-3 w-full {{ $product->stock > 0 ? 'bg-emerald-700 hover:bg-emerald-600' : 'bg-gray-300 cursor-not-allowed' }} text-white py-2 rounded transition">
                            {{ $product->stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="mt-3 block w-full text-center bg-gray-400 text-white py-2 rounded hover:bg-gray-500 transition">
                        Login to Add to Cart
                    </a>
                @endauth

            </div> @endforeach
    </div> </div> @endsection