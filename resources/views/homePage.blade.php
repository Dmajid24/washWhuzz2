<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WashWiz</title>

    <link rel="stylesheet" href="../style/nav-footer.css" />
    <link rel="stylesheet" href="{{ asset('css/homePage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">

    
  </head>
  <body>
    <nav>
      <div class="logo-container">
        <img src="{{ asset('images/homePage/logo.png') }}" alt="Logo" class="logoatas">
        <h1>WashWiz</h1>
      </div>
      <ul>
        <li><a style="color: #cd0303" href="./index.html">HOME</a></li>
        <li><a href="./product.html">PRODUCTS</a></li>
        <li><a href="./news.html">NEWS</a></li>
        <li><a href="./esport.html">ESPORTS</a></li>
        <li><a class="button-download" href="https://www.xbox.com/id-ID/games/store/asphalt-9-legends/9nzqpt0mwtd0?activetab=pivot:overviewtab&rtc=1">JOIN US</a></li>
      </ul>
    </nav>
    

    <div class="home" id="home">
      <div class="home-content">
        <!-- Logo -->
        <img src="{{ asset('images/homePage/logo.png') }}" alt="Logo" class="logoatas">
    
        <!-- Judul besar dengan tulisan berwarna merah -->
        <h1>Spotless, Speed, <span class="win">Win</span></h1>
    
        <!-- Deskripsi kecil di bawah judul -->
        <p>
          Discover dynamic and efficient car washing services on our website, from detailed cleaning to comprehensive care, all designed to meet your need for speed and precision.
          Enjoy the convenience of premium mobile car washing that comes directly to you, blending practicality with stellar results.
        </p>
    
        <!-- Tombol untuk mengeksplorasi paket -->
        <div class="trailer-button">
          <a href="https://youtu.be/cwwdPuIqGfc">EXPLORE OUR PACKAGES</a> 
        </div>
      </div>
    
      <!-- Gambar-gambar lainnya -->
      <img class="rectangle" src="../assets/elements/Rectangle5.png" alt="" />
      <img class="rectangle" src="../assets/elements/Rectangle6.png" alt="" />
      <img class="rectangle" src="../assets/elements/Rectangle7.png" alt="" />
      <img class="thumbnail" src="{{ asset('images/homePage/mobilmngkilap.jpg') }}" alt="" />
    </div>
    

    <div class="segment-2">
      <div class="content-text">
        <h1>NEW SEASON <strong style="color: #cd0303">COMING UP!</strong></h1>
        <a class="segment-button" href="">Summer Race</a>
        <p>
          Gear up for adrenaline-pumping action, scorching competition, and
          thrilling challenges as you race your way to victory under the blazing
          sun! <br /><br />
          It's bringing some sleek
          <strong style="color: #cd0303">new rides</strong> along for the ride!
        </p>
        <a class="learn-more-button" href="">LEARN MORE</a>
      </div>
      <img class="thumbnail" src="{{ asset('images/homePage/mobil.png') }}" alt="" />
      <div class="back-shadow"></div>
    </div>

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
              <img src="../assets/sosmed/discord logo.png" alt="" style="width:50px;height:auto;">
            </a>
            <a href="https://www.facebook.com/AsphaltGame/" target="_blank">
              <img src="../assets/sosmed/fb logo.png" alt="" style="width:50px;height:auto;">
            </a>
            <a href="https://www.instagram.com/asphaltgames/?hl=en" target="_blank">
              <img src="../assets/sosmed/ig logo.png" alt="" style="width:50px;height:auto;">
            </a>
            <a href="https://www.tiktok.com/@asphalt_9official?lang=en" target="_blank">
              <img src="../assets/sosmed/tiktok logo.png" alt="" style="width:50px;height:auto;">
            </a>
            <a href="https://x.com/asphalt?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
              <img src="../assets/sosmed/x logo.png" alt="" style="width:50px;height:auto;">
            </a>
            <a href="https://www.youtube.com/channel/UC8CcLVQ17w9ucM_yz70L8Kg" target="_blank">
              <img src="../assets/sosmed/youtube logo.png" alt="TikTok Logo" style="width:50px;height:auto;">
            </a>
          </div>
        </div>
        <div class="middle">
            <img src="{{ asset('images/homePage/gojek.png') }}">
            <img src="https://i1.wp.com/mobiklin.id/wp-content/uploads/2020/09/MOBI-LOGOTYPE-SCREEN-3.png?fit=1200%2C372&ssl=1" alt="">
          <p>
            All Rights Reserved. WashWiz logo and design are trademarks of WashWiz in Indonesia and/or other countries.
             All services, techniques, and associated imagery featured in the WashWiz
              service are trademarks and/or copyrighted materials of their respective owners.
          </p>
        </div>
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
      <img src="../assets/footer-thumbnail.png" alt="" />
    </footer>
  </body>
</html>
