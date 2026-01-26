<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utilisateur; // On inclut le modèle User
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManager extends Component
{
    //  Variable qui contrôle ce qui est affiché
    public $showForm = false;

    //  Variables pour le formulaire
    public $nom, $email, $password, $password_confirmation, $role;

    //  Liste des utilisateurs
    public $utilisateurs;

    //  Méthode exécutée au chargement du composant
    public function mount()
    {
        $this->utilisateurs = User::all();
    }

    // Afficher le formulaire
    public function afficherForm()
    {
        $this->showForm = true;
    }

    //  Revenir à la liste
    public function afficherListe()
    {
        $this->showForm = false;
    }

    // Créer un utilisateur
    public function creerUtilisateur()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,utilisateur',
        ]);

        User::create([
            'nom' => $this->nom,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        //  Rafraîchir la liste
        $this->utilisateurs = User::all();

        //  Revenir à la liste après création
        $this->showForm = false;

        //  Message flash côté composant
        session()->flash('success', 'Utilisateur créé avec succès !');

        //  Réinitialiser le formulaire
        $this->reset(['nom','email','password','password_confirmation','role']);
    }

    public function render()
    {
        return view('livewire.user-manager');
    }
}
