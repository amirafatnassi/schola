<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate incoming request data using Laravel's built-in validation
        // This ensures all required fields are present and formatted correctly
        request()->validate([
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::default(), 'confirmed'],
        ]);

        // Create a new user record in the database
        // Assumes password mutator is set on the User model to automatically hash passwords
        $user = User::create([
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        // Automatically log in the newly registered user
        Auth::login($user);

        // Set a success flash message for the session
        Session::flash('success', 'You have successfully registered!');

        // Redirect to the home view (consider redirecting to a route instead)
        return redirect('/');
    }
}
