<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order History</title>
  <link rel="stylesheet" href="{{ asset('css/history.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nav-footer.css') }}">


</head>
<body>
    <nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md z-30 transition-transform duration-300">
        <div class="logo-container">
            <img src="{{ asset('storage/images/homePage/logo.png') }}" alt="Logo" class="logoatas">
            <h1>WashWhuzz</h1>
        </div>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('washWhuzz') }}">About Us</a></li>
            <li><a href="{{ route('product') }}">Product</a></li>
            <li><a href="{{ route('order') }}">Order</a></li>
            <li><a href="{{ route('profile') }}">Profile</a></li>
        </ul>
    </nav>

  <div class="container">
    <h1>Order History</h1>
    <div id="history-loading">Loading your orders...</div>
    <div id="history-empty" class="hidden">You have no past orders.</div>
    <div id="order-history-list"></div>
  </div>


  <script src="{{ asset(path: 'js/history.js') }}"></script>
</body>
</html>
