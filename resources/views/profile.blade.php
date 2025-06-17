<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile - WashWhuuz</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExY2d1MGY4dXA4ODJlb3B3NWVlbmtnMDc3dHZyYzVsc3ZscWNwOGZwYyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/kiY19eeBn77hwuYtnu/giphy.gif') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      min-height: 100vh;
      padding-top: 70px; /* untuk memberikan jarak dengan navbar */
    }

    nav {
      background-color: #333;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.7);
    }

    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo-container img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }

    .logo-text {
      color: #ff5733;
      font-size: 24px;
      font-weight: bold;
      text-decoration: none;
    }

    ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    ul li {
      margin-left: 40px;
    }

    ul li:first-child {
      margin-left: 0;
    }

    ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }

    ul li a:hover {
      color: #ff5733;
    }

    .profile-container {
      display: flex;
      align-items: center;
      background-color: #ff5733;
      padding: 5px 12px;
      border-radius: 8px;
      cursor: pointer;
    }

    .profile-container img {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      margin-right: 12px;
      object-fit: cover;
    }

    .profile-info {
      color: #fff;
      font-size: 18px;
      font-weight: 600;
      white-space: nowrap;
    }

    .container {
      max-width: 900px;
      margin: 60px auto 40px auto; /* memberi jarak antara navbar dan konten */
      background-color: rgba(0, 0, 0, 0.85);
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255, 87, 51, 0.5);
    }

    .profile-section {
      display: flex;
      gap: 40px;
      align-items: center;
      margin-bottom: 40px;
    }

    .avatar {
      border-radius: 50%;
      width: 140px;
      height: 140px;
      background-color: #555;
      object-fit: cover;
      flex-shrink: 0;
      border: 3px solid #ff5733;
    }

    .info {
      flex-grow: 1;
      color: #eee;
    }

    .info h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .info p {
      font-size: 16px;
      margin-bottom: 6px;
      color: #ccc;
    }

    .edit-btn {
      margin-top: 20px;
      background: #ffc107;
      color: black;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 700;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .edit-btn:hover {
      background-color: #e6ac00;
    }

    .account-section h3 {
      color: #ff5733;
      font-size: 22px;
      margin-bottom: 25px;
      font-weight: 700;
      letter-spacing: 0.05em;
    }

    .account-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      list-style: none;
      padding: 0;
    }

    .account-list a {
      text-decoration: none;
      color: white;
    }

    .account-list li {
      background-color: rgba(255, 87, 51, 0.1);
      border: 1px solid #ff5733;
      border-radius: 10px;
      padding: 18px 20px;
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 18px;
      font-weight: 600;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .account-list li:hover {
      background-color: rgba(255, 87, 51, 0.3);
    }

    .account-list li .icon {
      font-size: 20px;
      user-select: none;
      width: 28px;
      text-align: center;
    }
  </style>
</head>
<body>

  <nav>
    <div class="logo-container">
      <img src="logo.png" alt="Logo" />
      <a href="#" class="logo-text">WashWhuuz</a>
    </div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Message</a></li>
      <li><a href="#">Order</a></li>
    </ul>
    <div class="profile-container">
      <img src="your-profile-image-path.jpg" alt="Profile Image" id="profileImage" />
      <span class="profile-info" id="username"></span>
    </div>
  </nav>

  <div class="container">
    <div class="profile-section">
      <img src="" alt="Profile" class="avatar" id="avatar"/>
      <div class="info">
        <h2 id="profileName">UserName</h2>
        <p id="profileEmail">UserName@gmail.com</p>
        <p id="profilePhone">+62138953673</p>
        <p id="profileAddress">Alamat</p>
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

  <script>
    window.onload = () => {
      document.getElementById('profileName').textContent = localStorage.getItem('name') || 'UserName';
      document.getElementById('username').textContent = localStorage.getItem('username') || 'UserName';
      document.getElementById('profileEmail').textContent = localStorage.getItem('email') || 'UserName@gmail.com';
      document.getElementById('profilePhone').textContent = localStorage.getItem('phone') || '+62138953673';
      document.getElementById('profileAddress').textContent = localStorage.getItem('address') || 'Alamat';
      
      const profileImg = localStorage.getItem('profileImg');
      if (profileImg) {
        document.getElementById('avatar').src = profileImg;
        document.getElementById('profileImage').src = profileImg;
      }
    };
  </script>

</body>
</html>
