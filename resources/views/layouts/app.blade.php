<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - WashWhuzz</title>
    @yield('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('partials.navbar')
    
    <div class="main-content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>