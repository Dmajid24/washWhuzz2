{{-- <!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Page</title>
  <link rel="stylesheet" href="{{ asset('css/order.css') }}">
  <script src="{{ asset('js/order.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>


</head>
<body>
  <div class="container">
    <h2>Your Cart</h2>
    
   <div id="cart-container" class="cart-container">
        <p>No items in cart.</p>
    </div>

    

    <h2>Customer Detail</h2>
    <form id="customer-form">
      <input type="text" id="fullname" placeholder="Full Name" required>
      <input type="tel" id="phone" placeholder="Phone Number" required>
      <textarea id="address" placeholder="Address" required></textarea>
    </form>

    <h3>Promo Code</h3>
    <input type="text" id="promo" placeholder="Enter promo code">
    <button onclick="checkout()">Checkout</button>
  </div>

  <script src="script.js"></script>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WashWiz - Cart</title>
  <link rel="stylesheet" href="{{ asset('css/order.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
  <script src="{{ asset('js/order.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
  <header>
    <div class="logo">🧽 <span>WashWiz</span></div>
    <nav>
      <a href="#">Home</a>
      <a href="#">About Us</a>
      <a href="#">Product</a>
      <a href="#" class="active">Order</a>
      <div class="icons">
        <span>🛒</span>
        <span>👤</span>
      </div>
    </nav>
  </header>

  <main>
    <div class="breadcrumb">Home > <span>Order</span></div>
    <div class="steps">
        <button> </button>
      <div class="step active">1 Product Cart</div>
      <div class="step">2 Customer Details</div>
      <div class="step">3 Payment</div>
      <div class="step">4 Order Status</div>
    </div>

    <section class="cart-section">
      <div id="cart-container" class="cart-container">
        <h2>Your Cart</h2>
        <p>Check your item before you checkout.</p>

        {{-- <div class="cart-card">
          <img src="img/placeholder.jpg" alt="Exterior Carwash" />
          <div class="item-info">
            <small>Cleaning</small>
            <h3>Exterior Carwash</h3>
            <div class="qty-price">
              <button>-</button>
              <span>1</span>
              <button>+</button>
              <p>Rp200.000</p>
            </div>
          </div>
        </div>

        <div class="cart-card">
          <img src="img/placeholder.jpg" alt="Interior Carpet Vacuum" />
          <div class="item-info">
            <small>Vacuum</small>
            <h3>Interior Carpet Vacuum</h3>
            <div class="qty-price">
              <button>-</button>
              <span>1</span>
              <button>+</button>
              <p>Rp80.000</p>
            </div>
          </div>
        </div>

        <div class="cart-card">
          <img src="img/placeholder.jpg" alt="Car Polishing" />
          <div class="item-info">
            <small>Detailing</small>
            <h3>Car Polishing</h3>
            <div class="qty-price">
              <button>-</button>
              <span>1</span>
              <button>+</button>
              <p>Rp150.000</p>
            </div>
          </div>
        </div> --}}

        {{-- <div class="promo-code">
          <p>Have a Promo Code?</p>
          <input type="text" placeholder="Type Here" />
        </div> --}}
      </div>

      <aside>
        <div class="address-box">
          <h4>Address Information</h4>
          <p><strong>{{Auth::user()->name}}</strong><br>
            {{Auth::user()->phone}}<br>
            {{Auth::user()->address}}<br>
            {{Auth::user()->city}}<br>
            Note: Samping Universitas BINUS
          </p>
          <button class="change-btn">Change Address</button>
        </div>

        <div class="summary-box">
            <h4>Payment Summary</h4>
            <div class="summary-line"><span>Subtotal</span><span></span></div>
            <div class="summary-line tax"><span>Others Fee</span><span></span></div>
            <div class="summary-line total"><span>Total</span><span></span></div>
            <button class="checkout-btn" onclick="handleCheckout()">🛒 Checkout</button>
        </div>
      </aside>
    </section>
  </main>
</body>
</html>
