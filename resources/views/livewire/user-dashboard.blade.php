<div class="min-h-screen bg-gray-100">

    {{-- Include the customer navbar --}}
    @include('partials.customer-navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-gray-600">This is your user dashboard.</p>
        </div>

        {{-- Shop by Category Section --}}
        <section class="px-2 py-10">
            <h2 class="max-w-full text-center text-2xl font-semibold text-gray-800 mb-8 py-4">
                Shop By Category
            </h2>

            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-5 gap-6">
                <!-- Womens Collection -->
                <a href="/products?category=dresses"
                   class="group relative block overflow-hidden rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/dress.jpg') }}" alt="dresses"
                         class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute bottom-0 left-0 bg-white/80 px-4 py-2 text-gray-800 text-sm font-medium">
                        Dresses
                    </div>
                </a>

                <!-- Mens New Arrivals -->
                <a href="/products?tag=New%20Arrival&gender=Men"
                   class="group relative block overflow-hidden rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/images17.jpg') }}" alt="mens new arrivals"
                         class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute bottom-0 left-0 bg-white/80 px-4 py-2 text-gray-800 text-sm font-medium">
                        Mens New Arrivals
                    </div>
                </a>

                <!-- Accessories -->
                <a href="/products?category=Women%20Accessories"
                   class="group relative block overflow-hidden rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/accessories.jpg') }}" alt="accessories"
                         class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute bottom-0 left-0 bg-white/80 px-4 py-2 text-gray-800 text-sm font-medium">
                        Women Accessories
                    </div>
                </a>

                <!-- Mens Shoes -->
                <a href="/products?category=Men%20Shoes"
                   class="group relative block overflow-hidden rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/men shoes.jpg') }}" alt="mens shoes"
                         class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute bottom-0 left-0 bg-white/80 px-4 py-2 text-gray-800 text-sm font-medium">
                        Mens Shoes
                    </div>
                </a>

                <!-- Womens Bags -->
                <a href="/products?category=Women%20Bags"
                   class="group relative block overflow-hidden rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/women bags.jpg') }}" alt="womens bags"
                         class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute bottom-0 left-0 bg-white/80 px-4 py-2 text-gray-800 text-sm font-medium">
                        Womens Bags
                    </div>
                </a>

            </div>
        </section>
    </div>
</div>
