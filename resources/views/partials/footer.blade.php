<!-- resources/views/partials/footer.blade.php -->

<footer class="bg-[#d6ccb3] text-black py-5">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- About -->
        <div>
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="w-56 h-auto mb-4">
            <p class="text-black w-56">
                We are dedicated to providing compassionate care that not only heals the body but also soothes the mind and spirit.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-black font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-customGold transition">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-customGold transition">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-customGold transition">Contact</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-black font-semibold mb-4">Contact</h3>
            <ul class="space-y-3 text-black">
                <li>123 Street, City, Country</li>
                <li>Email: info@example.com</li>
                <li>Phone: +123 456 7890</li>
            </ul>
        </div>

        <!-- Social Media -->
        <div>
            <h3 class="text-black font-semibold">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-customGold transition">Facebook</a>
                <a href="#" class="hover:text-customGold transition">Twitter</a>
                <a href="#" class="hover:text-customGold transition">Instagram</a>
            </div>
        </div>

    </div>

    <div class="pt-4 text-center text-black text-sm">
        &copy; 2025 Your Company. All rights reserved.
    </div>
</footer>
