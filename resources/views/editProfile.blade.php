@extends('layouts.app')

@section('title', 'Edit Profile')

@section('styles')
    @vite(['resources/css/editProfile.css'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">
    
@endsection

@section('content')
<header>
    <a href="{{ route('profile') }}" class="back-button">← Back</a>
    <h1>Edit Profile</h1>
</header>

<div class="container">
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- PROFILE PHOTO -->
        <div class="profile-pic-wrapper">
            <img 
                src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://via.placeholder.com/120' }}" 
                alt="Profile Picture" 
                id="profilePreview"
            >
            <label for="profilePic" class="upload-btn">Change Profile Photo</label>
            <input type="file" id="profilePic" name="profile_photo" accept="image/*" onchange="previewImage(event)">
        </div>

        <!-- FORM FIELDS -->
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
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profilePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection