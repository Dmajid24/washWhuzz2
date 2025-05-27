<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function register(){
        return view('register');
    }

    public function insertUser(Request $req){

        $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|unique:users|max:12',
            'city' => 'required',
            'province'=> 'required',
            'address' => 'required|max:255',
        ]);
        
        $user = User::create([
            'name'=> $req->name,
            'email'=> $req->email,
            'username' => $req->username,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'city'=> $req->city,
            'province'=> $req->province,
            'address' => $req->address,
    
        ]);
        
        
        return redirect('/login')->with('success', 'Registrasion Successfull');
    }

    public function login(Request $req){
        return view('login');
    }

        public function checklogin(Request $req){
            if(!Auth::attempt([
                'username' => $req->username, 
                'password' => $req->password
            ])){
                return redirect('/')
                ->with('error', 'Username atau password salah!');
            }else{
                return redirect('/dashboard');
            }   
        }

    }


