<?php

namespace App\Http\Controllers;
use App\Models\Projet; // On importe le modèle Projet
use App\Models\Acces;
use App\Models\Environnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProjetController extends Controller
{
    /**
     * Afficher la liste de tous les projets
     */
    public function index2()
    {
        // On récupère tous les projets de la base de données
        $projets = Projet::all();

        // pagination de la page 
        $projets = Projet::paginate(4);
        // On retourne la vue avec les projets
        return view('projet.index2', compact('projets'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('projet.create');
    }

    /**
     * Enregistrer un nouveau projet
     */
    public function store(Request $request)
    {
            // 1️⃣ Validation des données envoyées par le formulaire
            $validator = Validator::make($request->all(), [
                'nom' => 'required|string|max:150',
                'description' => 'required|string|max:255',
                'statut' => 'required|in:en production,en recette,en developpement',
            ], [
                'nom.required' => 'Le nom du projet est obligatoire.',
                'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'description.required' => 'La description est obligatoire.',
                'description.max' => 'La description ne peut pas dépasser 255 caractères.',
                'statut.required' => 'Le statut est obligatoire.',
                'statut.in' => 'Le statut doit être : en_production, en_recette ou en_developpement.',
            ]);
        
            // Si la validation échoue, on retourne sur le formulaire avec les erreurs
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        
            try {
                // 2️⃣ Création du projet avec l'utilisateur connecté comme créateur
                Projet::create([
                    'nom' => $request->nom,
                    'description' => $request->description,
                    'statut' => $request->statut,
                    'created_by' => Auth::id(), // ID de l'utilisateur connecté
                ]);
        
                // 3️⃣ Redirection avec message de succès
                return redirect()->route('projet.index2')
                    ->with('success', 'Projet créé avec succès !');
        
            } catch (\Exception $e) {
                // 4️⃣ Gestion des erreurs inattendues
                return redirect()->back()
                    ->with('error', 'Erreur lors de la création du projet. Veuillez réessayer.')
                    ->withInput();
            }
    }
        
   

    /**
     * Afficher les détails d’un projet
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
         
        // on récupère les accès liés à ce projet
         $acces = $projet->acces; // si la relation est déjà définie dans ton modèle Projet
          
         // On récupère tous les environnements disponibles
          $environnements = Environnement::all();
          $acces = Acces::with('environnement')->where('projet_id', $projet->id)->get();
          


    // On envoie tout à la vue
    return view('projet.show', compact('projet', 'acces', 'environnements'));

    }

    /**
     * Afficher le formulaire d’édition
     */
    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projet.edit', compact('projet'));
    }
   

    /**
     * Mettre à jour un projet
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'statut' => 'required|in:en production,en recette,en developpement',
        ]);


       
        $projet = Projet::findOrFail($id);

       
        

        $projet->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'statut' => $request->statut,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('projet.index2')->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Supprimer un projet
     */
    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        // Si la requête vient d'AJAX, on renvoie du JSON
    if (request()->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Projet supprimé avec succès.'
        ]);
    }

        return redirect()->route('projet.index2')->with('success', 'Projet supprimé avec succès.');
    }


    public function updateLogo(Request $request, $id)
    {
        // 1️⃣ Vérification du fichier envoyé
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // 2️⃣ On récupère le projet
        $projet = Projet::findOrFail($id);
    
        // 3️⃣ Si un ancien logo existe, on le supprime du dossier public
        if ($projet->logo) {
            $oldPath = public_path('logos/' . basename($projet->logo));
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    
        // 4️⃣ On renomme le fichier pour éviter les doublons
        $file = $request->file('logo');
        $filename = time() . '_' . $file->getClientOriginalName();
    
        // 5️⃣ On définit le chemin de destination dans le dossier public/logos
        $destinationPath = public_path('logos');
    
        // Si le dossier n’existe pas, on le crée
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
    
        // 6️⃣ On déplace le fichier dans le dossier public
        $file->move($destinationPath, $filename);
    
        // 7️⃣ On enregistre le chemin du logo dans la base (relatif à /public)
        $projet->logo = 'logos/' . $filename;
        $projet->save();
    
        // 8️⃣ On redirige vers la page précédente
        return redirect()->back()->with('success', 'Logo mis à jour avec succès.');
    }
    

}
