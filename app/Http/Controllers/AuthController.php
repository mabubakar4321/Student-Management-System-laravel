<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showregister(){
        return view('Auth.register');
    }
    public function register(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Optionally log the user in
  

    // Redirect to dashboard or home
    return redirect()->route('registration'); // adjust route as needed
}

public function showlogin(){
        return view('Auth.login');
    }

   public function login(Request $request)
{
    // Validate the input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Redirect to dashboard or intended route
        return redirect()->route('student');
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput();
}


public function logout(){
    Auth::logout();
    return redirect()->route('login');
}
}
