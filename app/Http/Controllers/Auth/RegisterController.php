<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
{
    return view('sign-up'); // montre resources/views/sign-up.blade.php
}

public function register(Request $request)
{
    // 1) Valider les champs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|in:admin,utilisateur',
    ]);

    // 2) Créer l’utilisateur
    $utilisateurs = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    // 3) Connecter l’utilisateur
    Auth::login($utilisateurs);

    // 4) Rediriger vers le tableau de bord unique : index
    return redirect()->route('index');
}

    //
}
