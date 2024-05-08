<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-5">
        <div class="bg-white p-5 shadow-md rounded-md">
            <div class="text-center">
                <img src="{{ asset('images/profile_picture.jpg') }}" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->id }}</p>
            </div>
            <div class="mt-6">
                <p class="text-gray-700">Email: {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</body>
</html>
