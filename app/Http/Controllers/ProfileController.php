<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit()
{
    return view('profile.edit'); // Le dossier profile contient edit.blade.php
}

public function update(Request $request)
{
    // Validation et mise à jour de l'utilisateur
    $user = auth()->user();
    $user->name = $request->fname . ' ' . $request->lname;
    $user->company = $request->company;
    $user->phone = $request->phone;
    $user->website = $request->website;
    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profile updated!');
}

}
