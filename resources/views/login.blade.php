<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Money Notes - Login</title>
</head>

<body class="w-full min-h-screen flex bg-gray-50">
    <section class="hidden lg:block h-screen flex-3/5 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/30 to-transparent"></div>
        <img src="https://cdn-res.keymedia.com/cms/images/ca/158/0422_638320311022221535.jpg"
            class="w-full h-full object-cover" alt="Financial illustration">
    </section>

    <section class="w-full flex-2/5 p-8 lg:p-12 flex items-center justify-center">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center space-y-2">
                <h1 class="text-4xl font-bold text-gray-900">Welcome Back</h1>
                <p class="text-gray-600">Please sign in to continue</p>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-5">
                    <div class="space-y-2">
                        <label for="username" class="text-sm font-medium text-gray-700">Username</label>
                        <input id="username" type="text" name="username"
                            class="w-full px-4 py-3 rounded-lg ring ring-amber-500 focus:ring-2 transition-all duration-100 outline-none">
                        @error('username')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password"
                            class="w-full px-4 py-3 rounded-lg ring ring-amber-500 focus:ring-2 transition-all duration-100 outline-none">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="#" class="text-sm text-amber-600 hover:text-amber-700">Forgot password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r cursor-pointer from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white py-3 px-4 rounded-lg font-semibold shadow-lg">
                    Sign In
                </button>

                <p class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="#" class="font-medium text-amber-600 hover:text-amber-700">Sign up</a>
                </p>
            </form>
        </div>
    </section>
</body>

</html>
