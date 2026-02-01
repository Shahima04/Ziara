<nav class="hidden md:block">

    {{-- Top Banner --}}
    <div class="text-center py-2 text-sm text-black" style="background-color: #c6ba9e;">
        FREE SHIPPING ON ORDERS ABOVE RS.15000
    </div>

    {{-- Desktop Header --}}
    <div class="flex items-center justify-between py-4 max-w-7xl mx-auto px-6">

        {{-- Left: Search Bar --}}
        <div class="flex items-center space-x-2 w-1/3">
            <input type="text" placeholder="Search for items & brands" 
                   class="w-full px-3 py-2 border border-gray-400 rounded-3xl text-sm focus:ring-1 focus:ring-gray-300 outline-none" />
            <button class="text-black hover:text-gray-700 text-xl">
                <i class="fi fi-rr-search"></i>
            </button>
        </div>

        {{-- Center: Logo --}}
        <div class="flex justify-center flex-1">
            <a href="{{ route('customer.dashboard') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="Ziara logo" class="mx-auto w-56 h-auto">
            </a>
        </div>

        {{-- Right: User Actions --}}
        <div class="flex items-center space-x-4">
            @auth
                {{-- Logged in user --}}
                <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded hover:bg-gray-700">
                        Logout
                    </button>
                </form>
            @else
                {{-- Guest user --}}
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-700 rounded hover:bg-gray-100">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded hover:bg-gray-700">
                    Register
                </a>
            @endauth
        </div>
    </div>
    </nav>

    {{-- Center Menu --}}
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3 bg-[#c7c7c7]">
        <ul class="flex space-x-6 text-sm font-medium uppercase text-gray-700">
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

        {{-- Right: Gender Switch --}}
        <div class="flex space-x-4">
            @php $gender = request('gender'); @endphp
            <a href="{{ route('collection.women', ['gender' => 'women']) }}" class="font-medium uppercase px-3 py-1 rounded-2xl {{ $gender === 'women' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                WOMEN
            </a>
            <a href="{{ route('collection.men', ['gender' => 'men']) }}" class="font-medium uppercase px-3 py-1 rounded-2xl {{ $gender === 'men' ? 'bg-white text-gray-700' : 'hover:text-black' }}">
                MEN
            </a>
        </div>
    </div>

