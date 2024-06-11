<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // If user fails authentication
        if (!Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry those credentials do not match!'
            ]);
        }


        // Regenerate the session token
        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        // You don't need to provide a $user
        // it assumes it is the current user
        Auth::logout();
        return redirect("/");
    }
}
