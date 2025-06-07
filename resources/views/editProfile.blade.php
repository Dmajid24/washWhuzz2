<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/editProfile.css') }}">
  
</head>
<body>

  <header>
    <a href="javascript:history.back()" class="back-button">← Back</a>
    <h1>Edit Profile</h1>
  </header>

  <div class="container">
    <form onsubmit="saveChanges(event)">
      <!-- FOTO PROFIL -->
      <div class="profile-pic-wrapper">
        <img src="https://via.placeholder.com/120" alt="Profile Picture" id="profilePreview">
        <label for="profilePic" class="upload-btn">Change Profile Photo</label>
        <input type="file" id="profilePic" accept="image/*" onchange="previewImage(event)">
      </div>

      <!-- FORM -->
      <label for="name">Full Name</label>
      <input type="text" id="name" placeholder="Enter your full name" required>

      <label for="username">Username</label>
      <input type="text" id="username" placeholder="Enter your username" required>

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Enter your email" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" placeholder="Enter your phone number" required>

      <label for="birthday">Birthday</label>
      <input type="date" id="birthday" required>

      <label for="bio">Bio</label>
      <textarea id="bio" rows="4" placeholder="Tell us a bit about yourself..."></textarea>

      <button type="submit">Save Changes</button>
    </form>
  </div>

  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function () {
        const output = document.getElementById('profilePreview');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }

    function saveChanges(e) {
      e.preventDefault();
      localStorage.setItem('name', document.getElementById('name').value);
      localStorage.setItem('username', document.getElementById('username').value);
      localStorage.setItem('email', document.getElementById('email').value);
      localStorage.setItem('phone', document.getElementById('phone').value);
      localStorage.setItem('birthday', document.getElementById('birthday').value);
      localStorage.setItem('bio', document.getElementById('bio').value);

      const profileImg = document.getElementById('profilePreview').src;
      localStorage.setItem('profileImg', profileImg);

      window.location.href = 'profile.html';  // After saving, redirect to profile page
    }

    window.onload = () => {
      document.getElementById('name').value = localStorage.getItem('name') || '';
      document.getElementById('username').value = localStorage.getItem('username') || '';
      document.getElementById('email').value = localStorage.getItem('email') || '';
      document.getElementById('phone').value = localStorage.getItem('phone') || '';
      document.getElementById('birthday').value = localStorage.getItem('birthday') || '';
      document.getElementById('bio').value = localStorage.getItem('bio') || '';

      const profileImg = localStorage.getItem('profileImg');
      if (profileImg) document.getElementById('profilePreview').src = profileImg;
    }
  </script>

</body>
</html>
