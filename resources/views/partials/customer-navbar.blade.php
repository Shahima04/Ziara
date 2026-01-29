<!-- Desktop Navigation Menu -->
<nav class="hidden md:block bg-[#c7c7c7]">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">

        {{-- Center Menu --}}
        <ul class="absolute left-1/2 transform -translate-x-1/2 flex space-x-6 text-sm font-medium uppercase text-gray-700">

            <li>
                <a href="{{ route('customer.dashboard') }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    Home
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('products.index', ['tag' => 'New Arrival']) }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    New Arrivals
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('cart.index') }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    My Cart
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('products.index') }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    Shop
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    About Us
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('contact') }}"
                   class="relative group inline-block px-3 py-1 hover:text-black">
                    Contact
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
        </ul>

        {{-- Gender Switch --}}
        <div class="flex space-x-4">
            @php
                $gender = request('gender');
            @endphp

            <a href="{{ route('collection.women', ['gender' => 'women']) }}"
               class="font-medium uppercase px-3 py-1 cursor-pointer rounded-2xl
               {{ $gender === 'women' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                WOMEN
            </a>

            <a href="{{ route('collection.men', ['gender' => 'men']) }}"
               class="font-medium uppercase px-3 py-1 cursor-pointer rounded-2xl
               {{ $gender === 'men' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                MEN
            </a>
        </div>

    </div>
</nav>
