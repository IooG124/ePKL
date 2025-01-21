<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user based on the username
        $user = User::where('username', $request->input('username'))->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Optionally, store additional information like condition
            session(['user' => $user]);  // You can store the user in session
            
            // Redirect to a protected page like dashboard
            return redirect('/');
        }

        // If login fails, return back with error message
        return back()->withErrors(['Invalid credentials']);
    }
}

