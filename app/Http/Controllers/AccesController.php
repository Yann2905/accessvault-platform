<?php

namespace App\Http\Controllers;
use App\Models\Environnement;
use App\Models\Acces;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AccesController extends Controller
{
  /**
     * Afficher la liste de tous les documents
     */
    public function index(Projet $projet)
    {

        // On récupère tous les acces de la base de données qui concerne se projet concerner
        $acces = Acces::where('projet_id', $projet->id)->get();
        $acces = Acces::paginate(4);
          // 2. récupérer la liste des environnements (pour le select du modal)
         $environnements = Environnement::orderBy('libelle', 'asc')->get();
        $acces = Acces::with('environnement')->where('projet_id', $projet->id)->get();
         return view('acces.index', compact('acces', 'projet','environnements'));

        
        // $projetModel = Projet::find($projet);
        // $projet = 
        // On retourne la vue avec les documents
        
    }

    /**
     * Afficher le formulaire de création
     */
    

    public function create(Projet $projet)
    {
        // Tous les accès existants (si tu en as besoin dans la vue)
        $acces = Acces::all();
    
        // Tous les environnements créés par l'admin
        $environnements = Environnement::orderBy('created_at', 'desc')->get();
    
        // On envoie tout à la vue
        return view('acces.create', compact('acces', 'projet', 'environnements'));
    }
    

    public function store(Request $request, Projet $projet)
    {
        

        
        // 1️⃣ Validation des données envoyées par le formulaire
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:Lien,identifiants',
            'url' => $request->type === 'Lien' ? 'required|string|max:255' : 'nullable',
            'email' => $request->type === 'identifiants' ? 'required|email|max:255' : 'nullable',
            'password' => $request->type === 'identifiants' ? 'required|string|min:8' : 'nullable',
            'environnement_id' => 'required|exists:environnements,id',
    // autres champs...

        ], [
            'type.required' => 'Le type est obligatoire.',
            'type.in' => 'Le type doit être : Lien ou Identifiants.',
            'url.max' => 'L\'URL ne peut pas dépasser 255 caractères.',
            'email.email' => 'L\'email doit être valide.',
            'email.max' => 'L\'email ne peut pas dépasser 255 caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'environnements.required' => 'L\'environnement est obligatoire.',
            

        ]);
    
        // 2️⃣ Si la validation échoue, retour sur le formulaire
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        

        // 3️⃣ Création de l'accès dans la base de données
        $acces = Acces::create([
            'type' => $request->type,
            'url' => $request->url,
            'email' => $request->email,
            'mot_de_passe' => $request->password, // hash si password fourni
            
    // autres champs...
            'projet_id' => $projet->id,
            'environnement_id' => $request->environnement_id
        ]);
    
        // 4️⃣ Redirection vers la liste des accès avec message de succès
        return redirect()->route('projet.acces.index', $projet->id)
                         ->with('succès', 'Accès créé avec succès !');
    }
    
     
    /**
     * Supprimer un document
     */
    public function destroy(Projet $projet,Acces $acces)
    {
        $acces->delete();

        return redirect()->route('projet.acces.index',$acces->projet_id)->with('success', 'acces supprimé avec succès.');
    }
   
}


