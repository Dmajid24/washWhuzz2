{{-- resources/views/partials/navbar.blade.php --}}
<nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md z-30 transition-transform duration-300">
    <div class="logo-container">
        <img src="{{ asset('storage/images/homePage/logo.png') }}" alt="Logo" class="logoatas">
        <h1>WashWhuzz</h1>
    </div>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('washWhuzz') }}">About Us</a></li>
        <li><a href="{{ route('product') }}">Product</a></li>
        <li><a style="color: #cd0303" href="{{ route('order') }}">Order</a></li>
        <li><a href="{{ route('profile') }}">Profile</a></li>
    </ul>
</nav>