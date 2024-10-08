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
        // validate
        $validateAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'] // confirmed digunakan untuk cek dengan form input dengan name password_confirmation
        ]);
        // create the user
        $user = User::create($validateAttributes);

        // log in
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}
