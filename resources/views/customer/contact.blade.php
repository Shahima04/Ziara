<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Ziara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    @livewire('navigation-menu')

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">Contact Us</h1>

        <form class="bg-white p-6 rounded shadow max-w-lg">
            <div class="mb-4">
                <label class="block mb-1 font-medium">Name</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Your Name">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" class="w-full border rounded px-3 py-2" placeholder="you@example.com">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Message</label>
                <textarea class="w-full border rounded px-3 py-2" rows="5" placeholder="Your message"></textarea>
            </div>

            <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
                Send Message
            </button>
        </form>
    </main>

</body>
</html>
