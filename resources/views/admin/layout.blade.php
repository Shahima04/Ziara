<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ziara</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md hidden md:block">
        <div class="flex justify-center py-4">
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
        <a href="{{ route('admin.products') }}"
           class="flex items-center px-4 py-3 mb-2 rounded-lg
                  {{ request()->routeIs('admin.products') ? 'bg-gray-200 text-primary' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
            <i class="fas fa-tshirt mr-3"></i> Products
        </a>

    

    <div class="pt-4 border-t border-gray-200">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center px-4 py-3 text-red-600 font-medium rounded-lg hover:bg-red-100">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </button>
        </form>
    </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <button class="md:hidden text-gray-600 mr-3" onclick="toggleSidebar()">
                        <i class="fi fi-br-menu-burger text-2xl"></i>
                    </button>
                    <h2 id="page-title" class="text-lg font-semibold">@yield('page-title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center">
                    <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main id="content" class="flex-1 overflow-y-auto p-6 bg-gray-100">
            @yield('content')
        </main>
    </div>
  </div>

  <script src="{{ asset('js/admin.js') }}" defer></script>
  @stack('scripts')
</body>
</html>
