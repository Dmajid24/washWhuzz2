<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • WashWuzz</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

<div class="min-h-screen flex items-center justify-center bg-cover bg-center"
     style="background-image:url('{{ asset('storage/images/loginBG.png') }}')">

    <div class="bg-black/60 p-10 rounded-lg w-full max-w-lg">

        {{-- Judul --}}
        <h1 class="text-3xl font-bold text-center">
            JOIN OUR <span class="text-red-500 italic">MOBILE WASH</span> COMMUNITY
        </h1>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="bg-green-600 my-4 p-3 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-600 my-4 p-3 rounded">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-600 my-4 p-3 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="/checklogin" class="space-y-4 mt-6">
            @csrf
            <input name="username" placeholder="Username" required autofocus
                   value="{{ old('username') }}"
                   class="w-full p-3 rounded bg-gray-800/70 focus:ring-2 focus:ring-yellow-400">
            <input type="password" name="password" placeholder="Password" required
                   class="w-full p-3 rounded bg-gray-800/70 focus:ring-2 focus:ring-yellow-400">

            <div class="flex items-center justify-between">
                {{-- <label class="flex items-center text-sm">
                    <input type="checkbox" name="remember" class="mr-2"> Remember me
                </label> --}}
                <button class="bg-yellow-500 text-red-700 font-bold px-6 py-2 rounded hover:bg-yellow-400">
                    SIGN IN
                </button>
            </div>
        </form>

        <p class="mt-4 text-center text-sm">
            Don’t have an account? <a href="/register" class="text-blue-400 underline">Register</a>
        </p>
    </div>
</div>
</body>
</html>
