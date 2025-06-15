<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ---------- REGISTER FORM ---------- */
    public function register()
    {
        return view('register');
    }

    /* ---------- SIMPAN USER BARU ---------- */
    public function insertUser(Request $req)
    {
        $validated = $req->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
            'phone'    => 'required|unique:users|max:12',
            'city'     => 'required',
            'province' => 'required',
            'address'  => 'required|max:255',
        ]);

        /*  generate idUser: CU001, CU002, ... */
        $last = User::max('idUser');          // null | "CU007"
        $seq  = $last ? (int)substr($last, 2) + 1 : 1;
        $id   = 'CU' . str_pad($seq, 3, '0', STR_PAD_LEFT);

        User::create([
            'idUser'   => $id,
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'phone'    => $validated['phone'],
            'city'     => $validated['city'],
            'province' => $validated['province'],
            'address'  => $validated['address'],
        ]);

        return redirect('/login')->with('success', 'Registration successful! Silakan login.');
    }

    /* ---------- LOGIN FORM ---------- */
    public function login()
    {
        return view('login');
    }

    /* ---------- PROSES LOGIN ---------- */
    public function checklogin(Request $req){
        if (!Auth::attempt([
            'username' => $req->username, 
            'password' => $req->password
        ])) {
            return redirect('/login')->with('error', 'Username atau password salah!');
        }
    
        $req->session()->regenerate();
        return redirect('/homePage');
    }

    /* ---------- LOGOUT ---------- */
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
