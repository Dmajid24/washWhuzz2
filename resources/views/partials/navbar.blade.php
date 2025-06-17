<nav class="fixed top-0 w-full z-30 transition-all duration-300 {{ request()->routeIs('order') ? 'light-bg' : 'dark-bg' }}">
    <div class="logo-container">
        <img src="{{ asset('images/profile/logo.png') }}" alt="Logo" class="logoatas">
        <h1>WashWhuzz</h1>
    </div>
    <ul class="flex items-center gap-9">
        <li>
            <a href="{{ route('home') }}" 
               class="transition-colors @if(request()->routeIs('home')) text-red-600 font-medium @endif">
               Home
            </a>
        </li>
        <li>
            <a href="{{ request()->routeIs('home') ? '#about-us' : route('home') . '#about-us' }}" 
            class="transition-colors @if(request()->is('about-us')) text-red-600 font-medium @endif">
            About Us
            </a>   
        </li>
        <li>
            <a href="{{ route('product') }}" 
               class="transition-colors @if(request()->routeIs('product')) text-red-600 font-medium @endif">
               Product
            </a>
        </li>
        <li>
            <a href="{{ route('order') }}" 
               class="transition-colors @if(request()->routeIs('order')) text-red-600 font-medium @endif">
               Order
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}" 
               class="transition-colors @if(request()->routeIs('profile')) text-red-600 font-medium @endif">
               Profile
            </a>
        </li>
    </ul>
</nav>