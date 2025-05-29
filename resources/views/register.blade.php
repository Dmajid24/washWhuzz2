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

            <!-- Form -->
            <form action="/insertUser" method="POST" class="space-y-4">
                @csrf
                <div class="form-group">
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Name"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <small class="text-red-500">Account already in use</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Username"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('username') }}"
                        required
                    >
                    @error('username')
                        <small class="text-red-500">Username already in use</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        required
                    >
                </div>

                <div class="form-group">
                    <input 
                        type="text" 
                        name="phone" 
                        placeholder="Phone"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('phone') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <input 
                        type="text" 
                        name="city" 
                        placeholder="City"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('city') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <input 
                        type="text" 
                        name="province" 
                        placeholder="Province"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        value="{{ old('province') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <textarea 
                        name="address" 
                        placeholder="Address"
                        class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white"
                        required
                    >{{ old('address') }}</textarea>
                </div>

                <div class="text-sm">
                    <label>
                        <input type="checkbox" class="mr-2"> 
                        I am 18 years old or older.
                    </label><br>
                    <label>
                        <input type="checkbox" class="mr-2"> 
                        I agree to the 
                        <a href="#" class="text-blue-400">Terms of Service</a>.
                    </label><br>
                    <label>
                        <input type="checkbox" class="mr-2"> 
                        I agree to receive updates and promotions.
                    </label>
                </div>
                <div class="flex flex-col items-center mt-4">
                   <button  
                        type="submit" 
                        class="bg-yellow-500 text-red-600 font-bold px-6 py-2 rounded inline-block hover:bg-yellow-400 transition"
                    >
                        SIGN UP
                    </button>
                    
                </div>
                <p class="mt-2 text-white text-sm">
                        Already have an account? <a href="/login" class="text-blue-400">Login</a> now
                </p>
            </form>
        </div>
    </div>
</body>
</html>
