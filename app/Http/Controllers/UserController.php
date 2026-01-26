<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; // si tu veux lister les avatars
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs
     */
    public function index()
    {
        $utilisateurs = Utilisateur::orderBy('created_at', 'desc')->get();
        $utilisateurs = Utilisateur::paginate(4);
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
     * Sauvegarde un nouvel utilisateur (méthode STORE)
     */
    public function store(Request $request)
{
    // 1 VALIDATION DES DONNÉES
    $validator = Validator::make($request->all(), [
        'prenom' => 'required|string|min:2|max:100',
        'nom' => 'required|string|min:2|max:100',
        'email' => 'required|email|unique:utilisateurs,email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,utilisateur'
    ], [
        // Messages d’erreur personnalisés
        'prenom.required' => 'Le prénom est obligatoire.',
        'prenom.min' => 'Le prénom doit contenir au moins 2 caractères.',
        'prenom.max' => 'Le prénom ne peut pas dépasser 100 caractères.',
        'nom.required' => 'Le nom est obligatoire.',
        'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
        'nom.max' => 'Le nom ne peut pas dépasser 100 caractères.',
        'email.required' => 'L\'email est obligatoire.',
        'email.email' => 'L\'email doit être valide.',
        'email.unique' => 'Cet email est déjà utilisé.',
        'password.required' => 'Le mot de passe est obligatoire.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        'role.required' => 'Le rôle est obligatoire.',
        'role.in' => 'Le rôle doit être admin ou utilisateur.'
    ]);

    // 2️⃣ SI ERREURS, ON RENVOIE AU FORMULAIRE
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput($request->except('password'));
    }

    try {
        
       

        // 3 CRÉATION DE L’UTILISATEUR
        $utilisateur = Utilisateur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => 'blank.png',
        ]);
        

        // 4 REDIRECTION APRÈS SUCCÈS
        return redirect()->route('utilisateur.index')
            ->with('success', 'Utilisateur créé avec succès !');

    } catch (\Exception $e) {
        // 5 GESTION DES ERREURS
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


    public function monProfil()
{
    // On récupère directement l'utilisateur connecté
    $utilisateur = Auth::user();
    

    // On réutilise la même vue utilisateur.show
    return view('utilisateur.show', compact('utilisateur'));
}


public function updateProfil(Request $request)
{
    $utilisateur = Auth::user();

    // Validation
    $request->validate([
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'prenom' => 'required|string|min:2|max:100',
        'nom' => 'required|string|min:2|max:100',
        'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Mise à jour des infos
    $utilisateur->prenom = $request->prenom;
    $utilisateur->nom = $request->nom;
    $utilisateur->email = $request->email;

    // Mise à jour du mot de passe si rempli
    if ($request->filled('password')) {
        $utilisateur->mot_de_passe = Hash::make($request->password);
    }

    // Gestion de l'avatar si upload
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('avatars'), $filename);
        $utilisateur->avatar = $filename;
    }

    $utilisateur->save();

    return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
}



public function update(Request $request, Utilisateur $utilisateur)
{
    // Validation
    $request->validate([
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'prenom' => 'required|string|min:2|max:100',
        'nom' => 'required|string|min:2|max:100',
        'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
        'password' => 'nullable|string|min:8|confirmed',
        'role' => 'required|in:admin,utilisateur',
    ]);

    // Mise à jour des infos
    $utilisateur->prenom = $request->prenom;
    $utilisateur->nom = $request->nom;
    $utilisateur->email = $request->email;

    // Mise à jour du mot de passe si rempli
    if ($request->filled('password')) {
        $utilisateur->mot_de_passe = Hash::make($request->password);
    }

    // Mise à jour du rôle
    $utilisateur->role = $request->role;

    // Gestion de l'avatar si upload
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('avatars'), $filename);
        $utilisateur->avatar = $filename;
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
     * Met à jour un utilisateur
     */



    /**
     * Supprime un utilisateur
     */
    public function destroy(Utilisateur $utilisateur)
    {
        try {
            $nom = $utilisateur->nom; // On garde le nom avant suppression
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
    





