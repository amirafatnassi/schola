<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class sessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        Auth::attempt($attributes);

        request()->session()->regenerate();

        return redirect('/');
    }
}
