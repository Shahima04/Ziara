<x-guest-layout>
    <div class="h-screen p-6 bg-[#ede1d3]">
        <div class="flex flex-col md:flex-row h-full rounded-lg overflow-hidden shadow-lg bg-white w-[90%] mx-auto">

            <!-- Left: Text + Form -->
            <div class="flex-1 flex flex-col justify-center p-10">

                <!-- Top Text Section -->
                <div>
                    <h2 id="formTitle" class="text-3xl font-bold text-gray-800 text-center p-4">
                        WELCOME BACK TO ZIARA
                    </h2>
                    <p id="formSubtitle" class="text-sm text-gray-800 mt-2 text-center">
                        SIGN IN TO ACCESS YOUR SAVED FAVORITES, TRACK YOUR ORDERS, AND UNLOCK THE LATEST FASHION BEFORE ANYONE ELSE
                    </p>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4 text-red-600 text-sm" />

                <!-- Status Message -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <div id="loginForm" class="mt-10">
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="email" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email"/>
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="password" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password"/>
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <button type="submit" class="w-full bg-[#b9a780] text-white py-2 rounded-md hover:bg-[#8f8266] transition">
                            {{ __('Log in') }}
                        </button>
                    </form>

                    <div class="mt-6 space-y-3">
                        <button class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5 mr-2" />
                            Sign In with Google
                        </button>
                        <button class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                            <img src="https://www.svgrepo.com/show/452196/facebook.svg" alt="Facebook" class="w-5 h-5 mr-2" />
                            Sign In with Facebook
                        </button>
                    </div>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-amber-900 hover:underline cursor-pointer">Sign Up</a>
                    </p>

                    @if (Route::has('password.request'))
                        <p class="mt-4 text-center text-sm text-gray-600">
                            <a class="underline hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </p>
                    @endif
                </div>

            </div>

            <!-- Right: Image Section (Hidden on Mobile) -->
            <div class="hidden md:flex md:flex-1 items-center justify-center p-4">
                <div class="w-full h-full rounded-lg overflow-hidden">
                    <img src="{{ asset('images/login.png') }}" alt="Login Illustration" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
