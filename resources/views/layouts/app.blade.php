<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WashWhuzz')</title>
    
    <!-- Main CSS -->
    @vite(['resources/css/app.css', 'resources/css/nav-footer.css'])
    
    <!-- Page-specific CSS -->
    @yield('styles')
</head>
<body>
    @include('partials.navbar')
    
    <main class="pt-20"> <!-- Add padding-top to account for fixed navbar -->
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>