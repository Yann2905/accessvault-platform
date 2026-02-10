<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs
     */
    public function index()
    {
        $utilisateurs = Utilisateur::orderBy('created_at', 'desc')->paginate(4);
        return view('utilisateur.index', compact('utilisateurs'));
    }

    /**
     * Affiche le formulaire de création d'utilisateur
     */
    public function create()
    {
        return view('utilisateur.create');
    }

    /**
     * Sauvegarde un nouvel utilisateur
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prenom' => 'required|string|min:2|max:100',
            'nom' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,utilisateur',
            'avatar_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        try {
            $utilisateur = Utilisateur::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'email' => $request->email,
                'mot_de_passe' => Hash::make($request->password),
                'role' => $request->role,
                'avatar_url' => $request->avatar_url ?? asset('assets/media/avatars/blank.jpg'),
            ]);

            return redirect()->route('utilisateur.index')
                ->with('success', 'Utilisateur créé avec succès !');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage())
                ->withInput($request->except('password'));
        }
    }

    /**
     * Affiche un utilisateur spécifique
     */
    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateur.show', compact('utilisateur'));
    }

    /**
     * Affiche le profil de l'utilisateur connecté
     */
    public function monProfil()
    {
        $utilisateur = Auth::user();
        return view('utilisateur.show', compact('utilisateur'));
    }

    /**
     * Met à jour le profil de l'utilisateur connecté
     */
    public function updateProfil(Request $request)
    {
        $utilisateur = Auth::user();

        $request->validate([
            'prenom' => 'required|string|min:2|max:100',
            'nom' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar_url' => 'nullable|url',
        ]);

        $utilisateur->prenom = $request->prenom;
        $utilisateur->nom = $request->nom;
        $utilisateur->email = $request->email;

        if ($request->filled('password')) {
            $utilisateur->mot_de_passe = Hash::make($request->password);
        }

        // Si l'utilisateur fournit une URL d'avatar
        if ($request->filled('avatar_url')) {
            $utilisateur->avatar_url = $request->avatar_url;
        }

        $utilisateur->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
    }

    /**
     * Met à jour un utilisateur (admin)
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'prenom' => 'required|string|min:2|max:100',
            'nom' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,utilisateur',
            'avatar_url' => 'nullable|url',
        ]);

        $utilisateur->prenom = $request->prenom;
        $utilisateur->nom = $request->nom;
        $utilisateur->email = $request->email;
        $utilisateur->role = $request->role;

        if ($request->filled('password')) {
            $utilisateur->mot_de_passe = Hash::make($request->password);
        }

        if ($request->filled('avatar_url')) {
            $utilisateur->avatar_url = $request->avatar_url;
        }

        $utilisateur->save();

        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur mis à jour !');
    }

    /**
     * Affiche le formulaire de modification
     */
    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateur.edit', compact('utilisateur'));
    }

    /**
     * Supprime un utilisateur
     */
    public function destroy(Utilisateur $utilisateur)
    {
        try {
            $nom = $utilisateur->nom;
            $utilisateur->delete();

            return response()->json([
                'status' => 'success',
                'message' => "L'utilisateur {$nom} a bien été supprimé."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => "Erreur lors de la suppression de l'utilisateur."
            ], 500);
        }
    }
}
