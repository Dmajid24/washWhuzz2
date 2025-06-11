<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WashWuzz</title>

    <link rel="stylesheet" href="{{ asset('css/nav-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homePage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    
  </head>
  <body>
    <nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md z-30 transition-transform duration-300">
      <div class="logo-container">
          <img src="{{ asset('images/homePage/logo.png') }}" alt="Logo" class="logoatas">
          <h1>WashWiz</h1>
      </div>
      <ul>
        <li><a style="color: #cd0303" href="./index.html">Home</a></li>
        <li><a href="./about-us.html">About Us</a></li>
        <li><a href="./product.html">Product</a></li>
        <li><a href="./order.html">Order</a></li>
        <li><a class="button-login" href="./login.html">Join Us</a></li>
      </ul>
    </nav>

      <div class="home" id="home">
        <div class="landing-page">
          <!-- left -->
          <div class="left-container">
            <h1>Spotless, Speed, <span class="win">Win</span></h1>
            <!-- Deskripsi kecil di bawah judul -->
            <p>
              Discover dynamic and efficient car washing services on our website, from detailed cleaning to comprehensive care, all designed to meet your need for speed and precision.
              Enjoy the convenience of premium mobile car washing that comes directly to you, blending practicality with stellar results.
            </p>
            <!-- Tombol untuk mengeksplorasi paket -->
            <div class="button">
              <a href="./product.html">EXPLORE OUR PACKAGES</a> 
            </div>
          </div> 
        </div>

        <div class="about-us">
          <div class="left-container">
            <img src="{{ asset('images/homePage/logo.png') }}" alt="Logo" class="logobwh">
          </div>
          <div class="right-container">
            <div class="content-title">
              <h1>About Us</h1>
            </div>
            <div class="content-description">
              <h2>Driven by Quality, Powered by Care</h2>
              <p>
                At WashWhuzz, we believe your car deserves the best. We’re a passionate 
                team committed to giving every vehicle a spotless shine and exceptional care—every time. 
                Whether you're looking for a quick exterior clean or a full-service detail, we combine high-quality products, 
                and trusted techniques to keep your car looking its best
              </p>
              <div class="button">
                <a href="./product.html">CONTACT US</a> 
              </div>
            </div>
            <div class="back-shadow"></div>
          </div>
        </div>
        
      <div class="footer-page">
        <footer>
          <div class="footer-text">
            <div class="upper">
              <div class="footer-header">
                <h1>
                  ARE YOU READY TO <strong style="color: #cd0303">Shine?</strong>
                </h1>
                <a class="footer-button" href="./subscription.html">SIGN ME UP</a>
              </div>
              <div class="social">
                <a href="https://discord.com/invite/asphalt9" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/discord logo.png') }}" alt="" style="width:50px;height:auto;">
                </a>
                <a href="https://www.facebook.com/AsphaltGame/" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/fb logo.png') }}" alt="" style="width:50px;height:auto;">
                </a>
                <a href="https://www.instagram.com/asphaltgames/?hl=en" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/ig logo.png') }}" alt="" style="width:50px;height:auto;">
                </a>
                <a href="https://www.tiktok.com/@asphalt_9official?lang=en" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/tiktok logo.png') }}" alt="" style="width:50px;height:auto;">
                </a>
                <a href="https://x.com/asphalt?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/x logo.png') }}" alt="" style="width:50px;height:auto;">
                </a>
                <a href="https://www.youtube.com/channel/UC8CcLVQ17w9ucM_yz70L8Kg" target="_blank">
                  <img src="{{ asset('images/homePage/sosmed/youtube logo.png') }}" alt="TikTok Logo" style="width:50px;height:auto;">
                </a>
              </div>
            </div>
            <div class="middle">
              <img src="{{ asset('images/homePage/gojek.png') }}" alt="brand1">
              <img src="https://i1.wp.com/mobiklin.id/wp-content/uploads/2020/09/MOBI-LOGOTYPE-SCREEN-3.png?fit=1200%2C372&ssl=1" alt="brand2">
            </div>
            <p>
              All Rights Reserved. WashWiz logo and design are trademarks of WashWiz in Indonesia and/or other countries.
              All services, techniques, and associated imagery featured in the WashWiz
              service are trademarks and/or copyrighted materials of their respective owners.
            </p>
            <h2 class="copyright">
              WashWiz trademarks and copyrights are properties of WashWiz.
            </h2>
            <ul class="policies">
              <a href="https://www.gameloft.com/en/conditions-of-use/">Terms & Conditions</a>
              <a href="https://www.gameloft.com/en/information/legal-notices">Legal Notices</a>
              <a href="https://www.gameloft.com/en/eula">Eula</a>
              <a href="https://www.gameloft.com/en/legal/policy-pre-reg/">Cookie Policy</a>
              <a href="https://www.gameloft.com/en/privacy-notice/">Privacy Policy</a>
            </ul>
          </div>
          <div class="footer-shadow"></div>
        </footer>
      </div>
    </div>
  </body>
</html>
