<?php

namespace App\Livewire;

use App\Models\Utilisateur;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UtilisateursTable extends Component
{
    use WithPagination;

    public $showForm = false;
    public $nom, $email, $password, $password_confirmation, $role;
    public $editingUserId = null;
    public $search = '';

    protected $rules = [
        'nom' => 'required|min:2|max:100',
        'email' => 'required|email|max:150',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|in:admin,utilisateur'
    ];

    protected $messages = [
        'nom.required' => 'Le nom est obligatoire.',
        'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
        'nom.max' => 'Le nom ne peut pas dépasser 100 caractères.',
        'email.required' => 'L\'email est obligatoire.',
        'email.email' => 'L\'email doit être valide.',
        'email.max' => 'L\'email ne peut pas dépasser 150 caractères.',
        'password.required' => 'Le mot de passe est obligatoire.',
        'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        'role.required' => 'Le rôle est obligatoire.',
        'role.in' => 'Le rôle doit être admin ou utilisateur.'
    ];

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->resetPage();
    }

    public function showTable()
    {
        $this->showForm = false;
        $this->resetForm();
        $this->resetPage();
    }

    public function resetForm()
    {
        $this->nom = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = '';
        $this->editingUserId = null;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        // Vérifier que l'email n'existe pas déjà
        if (Utilisateur::where('email', $this->email)->exists()) {
            $this->addError('email', 'Cet email est déjà utilisé.');
            return;
        }

        Utilisateur::create([
            'nom' => $this->nom,
            'email' => $this->email,
            'mot_de_passe' => Hash::make($this->password),
            'role' => $this->role
        ]);

        session()->flash('message', 'Utilisateur créé avec succès !');
        $this->showTable();
        $this->resetForm();
    }

    public function edit($userId)
    {
        $user = Utilisateur::findOrFail($userId);
        $this->editingUserId = $user->id;
        $this->nom = $user->nom;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = '';
        $this->password_confirmation = '';
        $this->showForm = true;
        $this->resetValidation();
    }

    public function update()
    {
        $rules = [
            'nom' => 'required|min:2|max:100',
            'email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('utilisateurs')->ignore($this->editingUserId)
            ],
            'role' => 'required|in:admin,utilisateur'
        ];

        if ($this->password) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $this->validate($rules, $this->messages);

        $user = Utilisateur::findOrFail($this->editingUserId);
        $user->update([
            'nom' => $this->nom,
            'email' => $this->email,
            'role' => $this->role
        ]);

        if ($this->password) {
            $user->update(['mot_de_passe' => Hash::make($this->password)]);
        }

        session()->flash('message', 'Utilisateur mis à jour avec succès !');
        $this->showTable();
        $this->resetForm();
    }

    public function delete($userId)
    {
        $user = Utilisateur::findOrFail($userId);
        
        // Empêcher la suppression de l'utilisateur connecté
        if ($user->id === auth()->id()) {
            session()->flash('error', 'Vous ne pouvez pas supprimer votre propre compte.');
            return;
        }
        
        $user->delete();
        session()->flash('message', 'Utilisateur supprimé avec succès !');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Utilisateur::query();
        
        if ($this->search) {
            $query->where(function($q) {
                $q->where('nom', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }
        
        $utilisateurs = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('livewire.utilisateurs-table', compact('utilisateurs'));
    }
}
