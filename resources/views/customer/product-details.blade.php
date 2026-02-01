@extends('layouts.customer')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white rounded-xl shadow-lg p-6">

        <!-- Product Image -->
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-[500px] object-cover rounded-lg shadow-md mb-4">
        </div>

        <!-- Product Info -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            
            <!-- Category & Brand -->
            <p class="text-sm text-gray-500 mb-4">
                Category: <span class="font-medium text-gray-700">{{ $product->category }}</span> |
                Brand: <span class="font-medium text-gray-700">{{ $product->brand }}</span>
            </p>

            <!-- Ratings -->
            <div class="flex items-center mb-4">
                @php
                    $rating = $product->rating ?? 4;
                @endphp
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating)
                        <span class="text-yellow-400 text-xl">&#9733;</span>
                    @else
                        <span class="text-gray-300 text-xl">&#9733;</span>
                    @endif
                @endfor
                <span class="ml-2 text-sm text-gray-500">({{ $product->reviews_count ?? 12 }} reviews)</span>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <span class="text-2xl font-semibold text-emerald-700">
                    Rs. {{ number_format($product->price, 2) }}
                </span>
                @if($product->discount_price && $product->discount_percent > 0)
                    <span class="line-through text-gray-400 ml-3">
                        Rs. {{ number_format($product->discount_price, 2) }}
                    </span>
                    <span class="ml-2 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded">
                        {{ $product->discount_percent }}% OFF
                    </span>
                @endif
            </div>

            <!-- Stock -->
            <p class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} mb-2">
                {{ $product->stock > 0 ? "In Stock ($product->stock available)" : "Out of Stock" }}
            </p>

            <!-- SKU -->
            @if($product->sku)
                <p class="text-sm text-gray-500 mb-2">SKU: {{ $product->sku }}</p>
            @endif

            <!-- Tag -->
            @if($product->tag && $product->tag != 'None')
                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full mb-4 inline-block">
                    {{ $product->tag }}
                </span>
            @endif

            <!-- Quantity Selector -->
            <div class="mb-4">
                <h2 class="text-sm font-medium mb-1">Quantity</h2>
                <input id="quantity" type="number" value="1" min="1" max="{{ $product->stock }}" 
                       class="border rounded px-3 py-2 w-24">
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Description</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
            </div>

            <!-- Additional Info -->
            @if($product->additional_info)
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Additional Information</h2>
                <p class="text-gray-600">{{ $product->additional_info }}</p>
            </div>
            @endif

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
                <button type="button" onclick="addToWishlist('{{ $product->id }}', this)" 
                        class="w-12 h-12 flex items-center justify-center border rounded-lg hover:bg-red-100 hover:text-red-600 transition cursor-pointer">
                    <i class="fi fi-ss-heart text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
