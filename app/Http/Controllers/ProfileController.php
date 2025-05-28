<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:61440' // 60MB
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;

        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('img/profile-pictures'), $avatarName);
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
