<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - Ziara Admin</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            You’ve been logged out
        </h1>

        <p class="text-gray-600 mb-6">
            Your admin session has ended successfully.
        </p>

        <a href="{{ route('admin.login') }}"
           class="inline-block px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition">
            Go to Admin Login
        </a>
    </div>

</body>
</html>
