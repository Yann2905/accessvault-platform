<?php

namespace App\Http\Controllers;
use App\Models\Acces;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Environnement;



class EnvironnementController extends Controller
{
    /**
     * Afficher la liste des environnements.
     */
    public function index()
    {
        // On récupère tous les environnements, triés du plus récent au plus ancien
        $environnements = Environnement::orderBy('created_at', 'desc')->get();
        $environnements = Environnement::paginate(4);
        // Envoi à la vue
        return view('environnements.index', compact('environnements'));
    }

    /**
     * Enregistrer un nouvel environnement.
     */
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'libelle' => 'required|string|max:255',
            'couleur' => 'required|in:primary,warning,danger,success', 
        ]);

        // Création du nouvel environnement
        Environnement::create([
            'libelle' => $request->libelle,
            'couleur' => $request->couleur,
        ]);

        return redirect()->route('environnements.index')->with('success', 'Environnement créé avec succès.');
    }

    /**
     * Afficher le formulaire d’édition.
     */
    public function edit($id)
    {
        $environnement = Environnement::findOrFail($id);

        // On passe aussi la liste des couleurs possibles pour la vue
        $couleurs = ['primary', 'warning', 'danger', 'success'];

        return view('environnements.edit', compact('environnement', 'couleurs'));
    }

    /**
     * Mettre à jour un environnement existant.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'couleur' => 'required|in:primary,warning,danger,success',
        ]);

        $environnement = Environnement::findOrFail($id);
        // On passe aussi la liste des couleurs possibles pour la vue
        
        $environnement->update([
            'libelle' => $request->libelle,
            'couleur' => $request->couleur,
        ]);
      
        $environnement->save();
    
        // 3️⃣ Redirection vers la liste avec message
        return redirect()->route('environnements.index')
                         ->with('success', 'Environnement mis à jour avec succès !'); 
        
    }

    /**
     * Supprimer un environnement.
     */
    public function destroy($id)
    {
        $environnement = Environnement::findOrFail($id);
        $environnement->delete();
 
        return response()->json([
            'success' => true,
            'message' => 'Environnement supprimé avec succès.'
        ]);

        
    }
}


