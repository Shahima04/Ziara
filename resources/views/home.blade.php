<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 font-sans">
       @livewire('navigation-menu')


<!-- Hero Section -->
<section class="relative max-w-7xl mx-auto px-4 py-6">

    <!-- Mobile Layout (visible only on small screens) -->
    <div class="block md:hidden scale-75 sm:scale-85 origin-top">
        <!-- Hero Text Box (Mobile - First) -->
        <div class="flex flex-col items-center justify-center text-center bg-gray-100 rounded-2xl p-4 mb-3 h-[25vh]">
            <h1 class="text-lg sm:text-xl font-bold leading-tight mb-3">
                Elevate Your Style With <br> Bold Fashion
            </h1>
            <button class="bg-black text-white px-4 py-2 rounded-full shadow-lg hover:bg-gray-800 transition cursor-pointer text-xs">
                Explore Collections
            </button>
        </div>

        <!-- Mobile Image Grid (2x2 - Smaller) -->
        <div class="grid grid-cols-2 gap-2">
            <img src="{{ asset('images/hijab.jpg') }}" class="rounded-xl object-cover w-full h-[20vh]" alt="Model 3">
            <img src="{{ asset('images/mens.jpg') }}" class="rounded-xl object-cover w-full h-[20vh]" alt="Model 4">
        </div>
    </div>

    <!-- Desktop Layout (hidden on mobile) -->
    <div class="hidden md:block">
        <!-- Image Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-stretch justify-center transform scale-90 sm:scale-95 md:scale-100 origin-top">

            <!-- Left Column -->
            <div class="flex flex-col gap-3">
                <img src="{{ asset('images/hijab.jpg') }}" class="rounded-2xl object-cover w-full h-[50vh]" alt="Model 1">
                <!--<img src="{{ asset('images/handbag.jpg') }}" class="rounded-2xl object-cover w-full h-[50vh]" alt="Model 2">-->
            </div>

            <!-- Middle Column -->
            <div class="col-span-2 flex flex-col gap-4">
                <!-- Hero Text Box -->
                <div class="flex flex-col items-center justify-center text-center bg-gray-100 rounded-2xl p-8 h-[50vh]">
                    <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-6">
                        Elevate Your Style With <br> Bold Fashion
                    </h1>
                    <button class="bg-black text-white px-6 py-3 rounded-full shadow-lg hover:bg-gray-800 transition cursor-pointer">
                        Explore Collections
                    </button>
                </div>

                <!-- Two Small Images 
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('images/ladies shoes.jpg') }}" class="rounded-2xl object-cover h-[50vh] w-full" alt="Model 3">
                    <img src="{{ asset('images/tshirts 2.jpg') }}" class="rounded-2xl object-cover h-[50vh] w-full" alt="Model 4">
                </div>-->
            </div>

            <!-- Right Column -->
            <div class="flex flex-col gap-3">
                <img src="{{ asset('images/mens.jpg') }}" class="rounded-2xl object-cover h-[50vh] w-full" alt="Model 5">
                <!--<img src="{{ asset('images/adidas.jpg') }}" class="rounded-2xl object-cover h-[50vh] w-full" alt="Model 6">-->
            </div>

        </div>
    </div>

</section>

<!-- Best Selling Products -->
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


 <!-- Footer -->
    @include('partials.footer')

</body>
</html>
