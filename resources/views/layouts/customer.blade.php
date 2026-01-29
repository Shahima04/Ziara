<body class="bg-white">

    @include('partials.customer-navbar')

    <main>
      {{ $slot }}
    </main>

    @livewireScripts
</body>
