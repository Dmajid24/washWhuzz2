{{-- resources/views/partials/navbar.blade.php --}}
<nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md z-30 transition-transform duration-300">
    <div class="logo-container">
        <img src="{{ asset('images/homePage/logo.png') }}" alt="Logo" class="logoatas">
        <h1>WashWhuzz</h1>
    </div>
    <ul class="flex items-center gap-9">
        <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 transition-colors">Home</a></li>
        <li><a href="{{ '#' }}" class="text-gray-700 hover:text-red-600 transition-colors">About Us</a></li>
        <li><a href= "{{ '#' }}" class="text-gray-700 hover:text-red-600 transition-colors">Product</a></li>
        <li><a href="{{ route('order') }}" class="text-red-600 font-medium hover:text-red-700 transition-colors">Order</a></li>
        <li><a href="{{ '#' }}" class="text-gray-700 hover:text-red-600 transition-colors">Profile</a></li>
    </ul>
</nav>