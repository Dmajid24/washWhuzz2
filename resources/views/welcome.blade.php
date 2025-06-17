<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WashWhuzz</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

  <style>
    /* Tambahan buat pastiin <a> pakai style tombol */
   
  </style>
</head>
<body>
  @if(Auth::check())
    <p>Welcome, {{ Auth::user()->name }}</p>
@endif
  <h1>WELCOME TO THE <span class="red-italic">WashWhuz!</span></h1>
  <div class="subtitle">Choose what you wanna see first!</div>
  <div class="button-group">
    <a href="/profile" class="btn">Profile</a>
    <a href="/product" class="btn">Products</a>
    <a href="message.html" class="btn">Message</a>
    <a href="{{ route('order', ['step' => 1]) }}" class="btn">Order</a>
  </div>
</body>
</html>
