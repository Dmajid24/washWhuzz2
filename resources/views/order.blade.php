<!-- index.html -->
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
</html>
