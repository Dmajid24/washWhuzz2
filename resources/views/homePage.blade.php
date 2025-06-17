@extends('layouts.app')

@section('title', 'WashWuzz - Home')

@section('body-class', 'dark-bg') <!-- Default dark background -->


@section('styles')
    @vite(['resources/css/nav-footer.css', 'resources/css/homePage.css'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">
    
    <!-- Tailwind via CDN -->
    @stack('tailwind')
@endsection

@section('content')
<div class="home" id="home">
    <div class="landing-page" style="background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.0) 60%), url('{{ asset('Images/car-cover.png') }}') center/cover no-repeat;">
        <!-- Left content -->
        <div class="left-container">
            <h1>Spotless, Speed, <span class="win">Win</span></h1>
            <p>
                Discover dynamic and efficient car washing services on our website, from detailed cleaning to comprehensive care, all designed to meet your need for speed and precision.
                Enjoy the convenience of premium mobile car washing that comes directly to you, blending practicality with stellar results.
            </p>
            <div class="button">
                <a href="{{ route('product') }}">EXPLORE OUR PACKAGES</a> 
            </div>
        </div> 
    </div>

    <div class="about-us" id="about-us">
        <div class="left-container">
            <img src="{{ asset('Images/profile/logo.png') }}" alt="Logo" class="logobwh">
        </div>
        <div class="right-container">
            <div class="content-title">
                <h1>About Us</h1>
            </div>
            <div class="content-description">
                <h2>Driven by Quality, Powered by Care</h2>
                <p>
                    At WashWhuzz, we believe your car deserves the best. We're a passionate 
                    team committed to giving every vehicle a spotless shine and exceptional care—every time. 
                    Whether you're looking for a quick exterior clean or a full-service detail, we combine high-quality products, 
                    and trusted techniques to keep your car looking its best
                </p>
                <div class="button">
                    <a href="{{ '#' }}">CONTACT US</a> 
                </div>
            </div>
            <div class="back-shadow"></div>
        </div>
    </div>
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
</div>
@endsection

@section('scripts')

@endsection