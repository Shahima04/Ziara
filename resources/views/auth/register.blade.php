<x-guest-layout>
    <div class="h-screen p-6 bg-[#ede1d3]">
        <div class="flex flex-col md:flex-row h-full rounded-lg overflow-hidden shadow-lg bg-white w-[90%] mx-auto">

            <!-- Left: Text + Form -->
            <div class="flex-1 flex flex-col justify-center p-10">

                <!-- Top Text Section -->
                <div>
                    <h2 id="formTitle" class="text-3xl font-bold text-gray-800 text-center p-4">
                        CREATE YOUR ACCOUNT
                    </h2>
                    <p id="formSubtitle" class="text-sm text-gray-800 mt-2 text-center">
                        SIGN UP TO SAVE YOUR FAVORITES, TRACK ORDERS, AND ENJOY THE LATEST FASHION FIRST
                    </p>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4 text-red-600 text-sm" />

                <!-- Registration Form -->
                <div id="signupForm" class="mt-10">
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Full Name') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="name" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name" />
                        </div>

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="email" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="password" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                        </div>

                        <div>
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-sm font-medium text-gray-800" />
                            <x-input id="password_confirmation" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-300 outline-none" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ms-2 text-sm text-gray-600">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <button type="submit" class="w-full bg-[#b9a780] text-white py-2 rounded-md hover:bg-[#8f8266] transition">
                            {{ __('Register') }}
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-amber-900 hover:underline cursor-pointer">Sign In</a>
                    </p>
                </div>

            </div>

            <!-- Right: Image Section (Hidden on Mobile) -->
            <div class="hidden md:flex md:flex-1 items-center justify-center p-4">
                <div class="w-full h-full rounded-lg overflow-hidden">
                    <img src="{{ asset('images/login.png') }}" alt="Register Illustration" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
