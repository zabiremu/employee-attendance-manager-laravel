<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // display login page
    public function login()
    {
       return view('backend.auth.login');
    }

    // display register page
    public function register()
    {
       return view('backend.auth.register');
    }

    public function googleLogin()
    {
      return Socialite::driver('google')->redirect(); 
    }
    public function googleRedricet()
    {
      // $user = Socialite::driver('google')->user();
      $user = Socialite::driver('google')->stateless()->user();
        
      $newUser =  User::updateOrCreate(
       [
           'email' =>$user->email,
       ],
       [     
           'full_name' => $user->name,
           'email' => $user->email,
           'password' => Hash::make(uniqid()),
      ]);
       
       $newUser->assignRole('Employee');
       Auth::login($newUser);
       return redirect()->route('admin.dashboard');
    }

}
