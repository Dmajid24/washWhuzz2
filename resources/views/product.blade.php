@extends('layouts.app')

@section('title', 'WashWuzz - Products')

@section('body-class', 'dark-bg') <!-- Default dark background -->

@section('styles')
    @vite(['resources/css/nav-footer.css', 'resources/css/product.css', 'resources/css/order.css'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="home" id="home">
        <div class="home-content">
            <h2>GALERY OF THE <span class="win">PRODUCT</span></h2>
          
            <div class="product">
                <a href="#" class="product-button" onclick="showProducts('cleaning')" style="color: #cd0303">Cleaning</a>
                <a href="#" class="product-button" onclick="showProducts('detailing')">Detailing</a>
                <a href="#" class="product-button" onclick="showProducts('vacuum')">Vacuum</a>
                <a href="#" class="product-button" onclick="showProducts('wax')">Wax</a>
                <a href="#" class="product-button" onclick="showProducts('coating')">Coating</a>
            </div>
            
            <div id="product-list" class="product-list">
                <!-- Products will be loaded here -->
            </div>
        </div>
        
        <img class="thumbnail" src="{{ asset('images/car-cover.png') }}" alt="Product Background">
    </div>
    
    <div class="segment-2"></div>
    <footer class="footer-page">
      <div class="footer-container">
        <!-- Upper Section -->
        <div class="footer-upper">
          <h1>ARE YOU READY TO <strong>Shine?</strong></h1>
          <a class="footer-btn" href="./subscription.html">SIGN ME UP</a>
        </div>
        <!-- Social Section -->
        <div class="footer-social">
          <a href="https://discord.com/invite/asphalt9" target="_blank" aria-label="Discord">
            <img src="..." alt="Discord">
          </a>
          <!-- ...repeat for other social icons... -->
        </div>
        <!-- Middle Section -->
        <div class="footer-middle">
          <img src="..." alt="Brand1">
          <img src="..." alt="Brand2">
        </div>
        <!-- Info Section -->
        <div class="footer-info">
          <p>
            All Rights Reserved. WashWiz logo and design are trademarks of WashWiz in Indonesia and/or other countries.
          </p>
          <ul class="footer-policies">
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Legal Notices</a></li>
            <li><a href="#">Eula</a></li>
            <li><a href="#">Cookie Policy</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
          <div class="footer-copyright">
            &copy; 2025 WashWiz. All rights reserved.
          </div>
        </div>
      </div>
    </footer>
@endsection

@section('scripts')
    @vite(['resources/js/product.js', 'resources/js/transaction.js'])
@endsection