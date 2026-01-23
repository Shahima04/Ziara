<div class="bg-[#ede1d3] min-h-screen p-6">
    <div class="flex flex-col md:flex-row h-full rounded-lg overflow-hidden shadow-lg bg-white w-[90%] mx-auto">

        <!-- LEFT SECTION -->
        <div class="flex-1 flex flex-col justify-center p-10">

            <!-- Heading -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 text-center p-4">
                    WELCOME BACK TO ZIARA
                </h2>
                <p class="text-sm text-gray-800 mt-2 text-center">
                    SIGN IN TO ACCESS YOUR SAVED FAVORITES, TRACK YOUR ORDERS, AND UNLOCK THE LATEST FASHION BEFORE ANYONE ELSE
                </p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mt-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 text-sm">⚠️ {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- LOGIN FORM -->
            <div class="mt-10">
                <form wire:submit.prevent="login" class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Email</label>
                        <input
                            type="email"
                            wire:model.defer="email"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none"
                            required
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Password</label>
                        <input
                            type="password"
                            wire:model.defer="password"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none"
                            required
                        />
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#b9a780] text-white py-2 rounded-md hover:bg-[#8f8266] transition"
                    >
                        Sign In
                    </button>
                </form>

                <!-- Social Buttons (UI only for now) -->
                <div class="mt-6 space-y-3">
                    <button class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5 mr-2" />
                        Sign In with Google
                    </button>

                    <button class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                        <img src="https://www.svgrepo.com/show/452196/facebook.svg" class="w-5 h-5 mr-2" />
                        Sign In with Facebook
                    </button>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Don’t have an account?
                    <span class="text-amber-900 hover:underline cursor-pointer">
                        Sign Up
                    </span>
                </p>
            </div>
        </div>

        <!-- RIGHT IMAGE -->
        <div class="hidden md:flex md:flex-1 items-center justify-center p-4">
            <div class="w-full h-full rounded-lg overflow-hidden">
                <img src="{{ asset('images/login.png') }}" class="w-full h-full object-cover">
            </div>
        </div>

    </div>
</div>
