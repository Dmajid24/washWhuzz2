<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile - WashWhuuz</title>
  <link href="https://fonts.goo gleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

  <style>
   
  </style>
</head>
<body>

  <nav>
    <div class="logo-container">
      <img src="{{ asset('images/profile/logo.png') }}" alt="Logo" />
      <a href="#" class="logo-text">WashWhuuz</a>
    </div>
    <ul>
      <li><a href="/homePage">Home</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Message</a></li>
      <li><a href="#">Order</a></li>
    </ul>
    <div class="profile-container">
      <img src="your-profile-image-path.jpg" alt="Profile Image" />
      <span class="profile-info">Username</span>
    </div>
  </nav>

  <div class="container">
    <div class="profile-section">
      <img src="welcomee.jpg" alt="Profile" class="avatar" />
      <div class="info">
        <h2>{{Auth::user()->name}}</h2>
        <p>{{Auth::user()->email}}</p>
        <p>{{Auth::user()->phone}}</p>
        <p>{{Auth::user()->address}}</p>
        <button class="edit-btn" onclick="window.location.href = '/editProfile'">Edit Profile</button>
      </div>
    </div>

    <section class="account-section">
      <h3>Account</h3>
      <ul class="account-list">
        <a href="#"><li><span class="icon">📄</span>My Activity</li></a>
        <a href="#"><li><span class="icon">💳</span>Payment Methods</li></a>
        <a href="HelpCenter.html"><li><span class="icon">❓</span>Help Center</li></a>
        <a href="ChangeLanguage.html"><li><span class="icon">🌐</span>Change Language</li></a>
        <a href="#"><li><span class="icon">🏠</span>Saved Addresses</li></a>
        <a href="AccountSafety.html"><li><span class="icon">🔒</span>Account Safety</li></a>
        <a href="ManageAccount.html"><li><span class="icon">⚙️</span>Manage Account</li></a>
      </ul>
    </section>
  </div>

</body>
</html>
