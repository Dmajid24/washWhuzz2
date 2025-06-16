{{-- resources/views/partials/navbar.blade.php --}}
<nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md z-30 transition-transform duration-300">
    <div class="logo-container">
        <img src="{{ asset('storage/images/homePage/logo.png') }}" alt="Logo" class="logoatas">
        <h1>WashWuz</h1>
    </div>
    <ul>
        <li><a href="{{ route('home') }}" @if(Request::is('home*')) class="active" @endif>Home</a></li>
        <li><a href="{{ route('product') }}" @if(Request::is('product*')) class="active" @endif>Products</a></li>
        @auth
            <li><a href="{{ route('order') }}" @if(Request::is('order*')) class="active" @endif>Order</a></li>
        @endauth
        <li>
            @auth
                <a href="{{ route('profile') }}" class="button-login @if(Request::is('profile*') || Request::is('editProfile*')) active @endif">
                    My Profile
                </a>
            @else
                <a href="{{ route('login') }}" class="button-login">Join Us</a>
            @endauth
        </li>
    </ul>
</nav>