<nav x-data="{ open: false }" >
    {{-- Top Banner --}}
    <div class="bg-[#c6ba9e] text-center py-2 text-sm text-black">
        FREE SHIPPING ON ORDERS ABOVE RS.15000
    </div>

    {{-- Header --}}
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 bg-white">
        {{-- Left: Search --}}
        <div class="w-1/3 flex items-center space-x-2">
            <input type="text" placeholder="Search for items & brands"
                   class="w-full px-3 py-2 border border-gray-400 rounded-3xl text-sm focus:ring-1 focus:ring-gray-300 outline-none" />
            <button class="text-black hover:text-gray-700 text-xl">
                <i class="fi fi-rr-search"></i>
            </button>
        </div>

        {{-- Center: Logo --}}
        <div class="w-1/3 flex-1 flex justify-center">
            <a href="{{ route('customer.dashboard') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="Ziara logo" class="mx-auto w-56 h-auto">
            </a>
        </div>

        {{-- Right: Auth --}}
        <div class="w-1/3 flex justify-end items-center space-x-4">
            @auth
                {{-- Jetstream Profile Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-black focus:outline-none">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>

                        <!-- Add Dashboard here -->
                        <a href="{{ route('account') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            My Account
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-gray-700 rounded hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-gray-700 rounded hover:bg-gray-100">Register</a>
            @endauth
        </div>
    </div>
    
    {{-- Menu Links --}}
    <div class="w-full px-6 py-4 bg-[#c7c7c7]">

    <!--
     {{-- Left: Gender Buttons --}}
        <div class="flex space-x-2">
            @php $gender = request('gender'); @endphp
            <a href="{{ route('collection.women', ['gender' => 'women']) }}"
               class="font-medium uppercase px-3 py-1 rounded-2xl
               {{ $gender === 'women' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                WOMEN
            </a>
            <a href="{{ route('collection.men', ['gender' => 'men']) }}"
               class="font-medium uppercase px-3 py-1 rounded-2xl
               {{ $gender === 'men' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                MEN
            </a>
        </div>-->
        <ul class="flex space-x-6 text-sm font-medium uppercase text-gray-700 justify-center">
            <li>
                <a href="{{ route('customer.dashboard') }}" class="relative group px-3 py-1 hover:text-black">
                    Home
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index', ['tag' => 'New Arrival']) }}" class="relative group px-3 py-1 hover:text-black">
                    New Arrivals
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('cart.index') }}" class="relative group px-3 py-1 hover:text-black">
                    My Cart
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="relative group px-3 py-1 hover:text-black">
                    Shop
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="relative group px-3 py-1 hover:text-black">
                    About Us
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="relative group px-3 py-1 hover:text-black">
                    Contact
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
