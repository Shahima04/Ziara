<x-guest-layout>
    <div class="max-w-md w-full p-6 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-4 text-center">Ziara Login</h2>

        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label>Email</label>
                <input type="email" wire:model.defer="email"
                       class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" wire:model.defer="password"
                       class="w-full border px-3 py-2">
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded">
                Login
            </button>
        </form>
    </div>
</x-guest-layout>
