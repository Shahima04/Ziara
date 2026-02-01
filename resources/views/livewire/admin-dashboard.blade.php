<div class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <form method="POST" action="{{ route('admin.logout') }}">

                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
            </form>
        </div>
    </nav>

    <div class="min-h-screen flex bg-gray-100">

    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md hidden md:block">
        <!-- Logo -->
        <div class="flex justify-center mt-4">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="ziara logo" class="mx-auto w-56 h-auto">
            </a>
        </div>

        <nav class="mt-5 flex flex-col h-full bg-white shadow-md rounded-xl p-3">
            <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-4 py-3 mb-2 rounded-lg
                  {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 text-primary' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
            <i class="fas fa-home mr-3"></i> Dashboard
        </a>

        <!-- Products -->
        <button wire:click="showProducts"
            class="flex items-center px-4 py-3 mb-2 rounded-lg
            {{ $page === 'products' ? 'bg-gray-200 text-primary' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fas fa-tshirt mr-3"></i> Products
        </button>


           <!-- Orders -->
            <button wire:click="showOrders"
                class="flex items-center px-4 py-3 mb-2 rounded-lg
                {{ $page === 'orders' ? 'bg-gray-200 text-primary' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-shopping-cart mr-3"></i> Orders
            </button>

            <button onclick="setActive(this, 'customers')" class="nav-btn w-full flex items-center px-4 py-3 text-primary font-medium rounded-lg">
                <i class="fas fa-users mr-3"></i> Customers
            </button>
            <button onclick="setActive(this, 'analytics')" class="nav-btn w-full flex items-center px-4 py-3 text-primary font-medium rounded-lg">
                <i class="fas fa-chart-line mr-3"></i> Analytics
            </button>
            <button onclick="setActive(this, 'settings')" class="nav-btn w-full flex items-center px-4 py-3 text-primary font-medium rounded-lg">
                <i class="fas fa-cog mr-3"></i> Settings
            </button>
        </nav>
    </div>

    <!-- Main content -->
<div class="flex-1 min-h-screen">

    @if($page === 'dashboard')
        <!-- Dashboard content -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">
                    Welcome, {{ auth()->user()->name }}!
                </h2>
                <p class="text-gray-600">
                    This is your admin dashboard.
                </p>
            </div>
        </div>
    @endif

    @if($page === 'products')
        <div class="flex-1 min-h-screen p-6">
            <livewire:products />
        </div>
    @endif

    @if($page === 'orders')
    <div class="flex-1 min-h-screen p-6">
        @include('orders')
    </div>
@endif

</div>

</div>

</div>
