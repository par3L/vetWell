<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VetWell Clinic</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-neutral-100 min-h-screen flex items-center justify-center p-4">
    <div class="card max-w-md w-full">
        <div class="text-center mb-8">
            <img src="{{ asset('logo.png') }}" alt="VetWell Logo" class="h-16 mx-auto mb-4">
            <h1 class="text-3xl font-heading font-bold text-neutral-800">Welcome Back</h1>
            <p class="text-neutral-600 mt-2">Sign in to your account</p>
        </div>

        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">Email</label>
                <input type="email" id="email" name="email" class="input" placeholder="you@example.com" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-neutral-700 mb-2">Password</label>
                <input type="password" id="password" name="password" class="input" placeholder="••••••••" required>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-primary-600 border-neutral-300 rounded focus:ring-primary-500">
                    <span class="ml-2 text-sm text-neutral-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-primary-600 hover:text-primary-700">Forgot password?</a>
            </div>

            <button type="submit" class="btn-primary w-full">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-neutral-600">
                Don't have an account? 
                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Register here</a>
            </p>
        </div>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="btn-ghost w-full justify-center">
                ← Back to Home
            </a>
        </div>
    </div>
</body>
</html>
