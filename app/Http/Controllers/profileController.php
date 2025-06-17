<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Add this import

class ProfileController extends Controller  // Changed to PascalCase (recommended)
{
    public function show()
    {
        return view('profile', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('editProfile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'birthday' => 'nullable|date',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validated['profile_photo'] = $path;
        }

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }
}