<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'max:300'],
            // When using "confirmed" laravel checks if it matches "password_confirmation"
            // Can be applied to any attribute, if we used the "email" field then confirm would impact
            // "email_confirmation"
            'password' => ['required', Password::min(1), 'confirmed'],
        ]);

        $user = User::create($validatedAttributes);

        // Log in
        Auth::login($user);

        return redirect("/jobs");
    }
}
