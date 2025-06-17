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
    <a href="profile" class="back-button">← Back</a>
    <h1>Edit Profile</h1>
  </header>

  <div class="container">
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf

      <!-- FOTO PROFIL -->
      <div class="profile-pic-wrapper">
        <img 
          src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://via.placeholder.com/120' }}" 
          alt="Profile Picture" 
          id="profilePreview"
        >
        <label for="profilePic" class="upload-btn">Change Profile Photo</label>
        <input type="file" id="profilePic" name="profile_photo" accept="image/*" onchange="previewImage(event)">
      </div>

      <!-- FORM -->
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>

      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="{{ old('username', Auth::user()->username) }}" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" required>

      <label for="birthday">Birthday</label>
      <input type="date" id="birthday" name="birthday" value="{{ old('birthday', Auth::user()->birthday) }}" required>

      <label for="bio">Bio</label>
      <textarea id="bio" name="bio" rows="4">{{ old('bio', Auth::user()->bio) }}</textarea>

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
  </script>

</body>
</html>
