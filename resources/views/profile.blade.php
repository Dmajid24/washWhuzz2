@extends('layouts.app')

@section('title', 'Profile - WashWhuuz')

@section('styles')
    @vite(['resources/css/nav-footer.css', 'resources/css/profile.css'])

  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Magneto&display=swap" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="profile-section">
        <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'welcomee.jpg' }}" alt="Profile" class="avatar" />
        <div class="info">
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->phone }}</p>
            <p>{{ Auth::user()->address }}</p>
            <button class="edit-btn" onclick="window.location.href = '{{ route('profile.edit') }}'">Edit Profile</button>
        </div>
    </div>

    <section class="account-section">
        <h3>Account</h3>
        <ul class="account-list">
            <a href="#"><li><span class="icon">📄</span>My Activity</li></a>
            <a href="#"><li><span class="icon">💳</span>Payment Methods</li></a>
            <a href="#"><li><span class="icon">❓</span>Help Center</li></a>
            <a href="#"><li><span class="icon">🌐</span>Change Language</li></a>
            <a href="#"><li><span class="icon">🏠</span>Saved Addresses</li></a>
            <a href="#"><li><span class="icon">🔒</span>Account Safety</li></a>
            <a href="#"><li><span class="icon">⚙️</span>Manage Account</li></a>
        </ul>
    </section>
</div>
@endsection

@section('scripts')
    @vite(['resources/js/profile.js'])
@endsection