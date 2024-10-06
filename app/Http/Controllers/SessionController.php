<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // validate
        $validatedRequest = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required', Password::min(6)]
        ]);

        // login attempt
       if (! Auth::attempt($validatedRequest)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials not match'
        ]);
       }

        // regenerate the session token
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
