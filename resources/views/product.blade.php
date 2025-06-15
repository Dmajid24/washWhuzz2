<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WashWuzz</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <link rel="stylesheet" href="{{ asset('css/nav-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">

    
  </head>
  <body>
    <script src="{{ asset('js/transaction.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
        <nav>
            <div class="logo-container">
              <img src="{{ asset('storage/images/homePage/logo.png') }}" alt="Logo" class="logoatas">
              <h1>WashWiz</h1>
            </div>
            <ul>
              <li><a href="./homePage">HOME</a></li>
              <li><a style="color: #cd0303" href="./product">PRODUCTS</a></li>
              <li><a href="./news.html">NEWS</a></li>
              <li><a href="./order">order</a></li>
              <li><a class="button-download" href="/login">JOIN US</a></li>
            </ul>
        </nav>
          
      
        <div class="home" id="home">
            <div class="home-content">
              <!-- Logo -->
              <!-- Judul besar dengan tulisan berwarna merah -->
              <h1>GALERY OF THE <span class="win">PRODUCT</span></h1>
          
                <div class="product">
                    <a href="#" class="product-button" onclick="showProducts('cleaning') ,style='color: #cd0303'">Cleaning</a>
                    <a href="#" class="product-button" onclick="showProducts('detailing')">Detailing</a>
                    <a href="#" class="product-button" onclick="showProducts('vacuum')">Vacuum</a>
                    <a href="#" class="product-button" onclick="showProducts('wax')">Wax</a>
                    <a href="#" class="product-button" onclick="showProducts('coating')">Coating</a>
                </div>
                <div id="product-list" class="product-list">
                    <!-- Produk akan dimuat di sini -->
                </div>

                

                
              
            </div>

           
            <!-- Gambar-gambar lainnya -->  
            
            <img class="thumbnail" src="{{ asset('storage/images/product/productBg.png') }}" alt="" />
        </div>
          
      
        <div class="segment-2">
            
        </div>
            <footer>
            <div class="footer-text">
              <div class="upper">
                <div class="footer-header">
                  <h1>
                    ARE YOU READY TO <strong style="color: #cd0303">Shine?</strong>
                  </h1>
                  <a class="footer-button" href="/register">SIGN ME UP</a>
                </div>
                <div class="social">
                  <a href="https://discord.com/invite/asphalt9" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/discord logo.png') }}" alt="" style="width:50px;height:auto;">
                  </a>
                  <a href="https://www.facebook.com/AsphaltGame/" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/fb logo.png') }}" alt="" style="width:50px;height:auto;">
                  </a>
                  <a href="https://www.instagram.com/asphaltgames/?hl=en" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/ig logo.png') }}" alt="" style="width:50px;height:auto;">
                  </a>
                  <a href="https://www.tiktok.com/@asphalt_9official?lang=en" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/tiktok logo.png') }}" alt="" style="width:50px;height:auto;">
                  </a>
                  <a href="https://x.com/asphalt?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/x logo.png') }}" alt="" style="width:50px;height:auto;">
                  </a>
                  <a href="https://www.youtube.com/channel/UC8CcLVQ17w9ucM_yz70L8Kg" target="_blank">
                    <img src="{{ asset('storage/images/homePage/sosmed/youtube logo.png') }}" alt="TikTok Logo" style="width:50px;height:auto;">
                  </a>
                </div>
              </div>
              <div class="middle">
                  <img src="{{ asset('storage/images/homePage/gojek.png') }}" alt = "brand1">
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
            <img src="{{ asset('storage/images/homePage/footer-thumbnail.png') }}" alt="" />
          </footer>

   

   
  </body>
</html>
