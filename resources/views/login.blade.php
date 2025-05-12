<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/loginBG.png') }}');">
        <div class="bg-black bg-opacity-50 p-10 rounded-lg w-full max-w-lg">
            
            <!-- Judul -->
            <h1 class="text-3xl font-bold text-center">
                JOIN OUR MOBILE WASH 
                <span class="text-red-500 italic">MOBILE</span>
            </h1>
            <h1 class="text-3xl font-bold text-center">
                <span class="text-red-500 italic">WASH</span> COMMUNITY
            </h1>

            <!-- Logo -->
            <div class="flex justify-center my-4">
            </div>

            <!-- Form -->
            <form action="/checklogin" method="POST" class="space-y-4">
                @csrf
                @if(session('error'))
                    <div class="bg-red-500 text-white p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Username"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        value="{{ old('username') }}"
                        required
                    >
                </div>

                <div>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required
                    >
                </div>

                <div class="flex flex-col items-center mt-4">
                    <button  
                         type="submit" 
                         class="bg-yellow-500 text-red-600 font-bold px-6 py-2 rounded inline-block hover:bg-yellow-400 transition"
                     >
                         SIGN IN
                     </button>
                     
                 </div>
                 <p class="mt-2 text-white text-sm">
                         Didn't have an account? <a href="/register" class="text-blue-400">Register</a> now
                 </p>
            
        </div>
    </div>
</body>
</html>
