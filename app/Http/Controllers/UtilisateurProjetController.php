<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Acces;
use App\Models\Environnement;


class UtilisateurProjetController extends Controller
{

    // Afficher tous les projets créés par l’admin + ceux choisis par l’utilisateur
    public function index(Projet $projet)
    {
      
        
        $projets = Projet::all(); // tous les projets de l’admin
        $user = Auth::user();
       
        
        return view('utilisateur.projets.index', compact('projets', 'user'));
    }

    
    // Ajouter un projet pour l’utilisateur connecté
    public function store(Projet $projet)
    {
        $user = Auth::user();

        if ($user->projets()->where('projet_id', $projet->id)->exists()) {
            return redirect()->route('index')->with('info', 'Ce projet est déjà dans ton tableau de bord.');
        }

        $user->projets()->attach($projet->id);

        return redirect()->route('index')->with('success', 'Projet ajouté à ton tableau de bord.');
    }

    public function show($projetId)
                {
                    $user = Auth::user(); // Récupère l'utilisateur connecté

                    // Récupère le projet sans vérifier si l'utilisateur l'a ajouté
    $projet = Projet::findOrFail($projetId);

                    

                    $acces = $projet->acces; // si la relation est déjà définie dans ton modèle Projet
          
                        // On récupère tous les environnements disponibles
                        $environnements = Environnement::all();
                        $acces = Acces::with('environnement')->where('projet_id', $projet->id)->get();

                    // Retourne la vue avec le projet
                    return view('utilisateur.projets.show', compact('projet','acces', 'environnements'));
                }

    // Retirer un projet (optionnel)
    public function destroy(Projet $projet)
    {
        auth()->user()->projets()->detach($projet->id);

        return redirect()->route('index')->with('success', 'Projet retiré avec succès !');
    }


}
