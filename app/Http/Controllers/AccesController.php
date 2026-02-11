<?php

namespace App\Http\Controllers;
use App\Models\Environnement;
use App\Models\Acces;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccesController extends Controller
{
    /**
     * Afficher la liste des accès d'un projet
     */
    public function index(Projet $projet)
    {
        // ✅ Récupère les accès du projet avec pagination ET la relation environnement
        $acces = Acces::with('environnement')
            ->where('projet_id', $projet->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        // Récupère tous les environnements pour le modal de création
        $environnements = Environnement::orderBy('libelle', 'asc')->get();
        
        return view('projet.show', compact('acces', 'projet', 'environnements'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create(Projet $projet)
    {
        $environnements = Environnement::orderBy('created_at', 'desc')->get();
        return view('acces.create', compact('projet', 'environnements'));
    }

    /**
     * Enregistrer un nouvel accès
     */
    public function store(Request $request, Projet $projet)
    {
        // 1️⃣ Validation dynamique selon le type
        $rules = [
            'type' => 'required|in:Lien,identifiants',
            'environnement_id' => 'required|exists:environnements,id',
        ];

        // Ajoute les règles selon le type choisi
        if ($request->type === 'Lien') {
            $rules['url'] = 'required|string|max:255';
        } elseif ($request->type === 'identifiants') {
            $rules['email'] = 'required|email|max:255';
            $rules['password'] = 'required|string|min:8';
        }

        $validator = Validator::make($request->all(), $rules, [
            'type.required' => 'Le type est obligatoire.',
            'type.in' => 'Le type doit être : Lien ou identifiants.',
            'url.required' => 'L\'URL est obligatoire pour un accès de type Lien.',
            'url.max' => 'L\'URL ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire pour un accès avec identifiants.',
            'email.email' => 'L\'email doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire pour un accès avec identifiants.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'environnement_id.required' => 'L\'environnement est obligatoire.',
            'environnement_id.exists' => 'L\'environnement sélectionné n\'existe pas.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // 2️⃣ Création de l'accès
            $acces = Acces::create([
                'type' => $request->type,
                'url' => $request->type === 'Lien' ? $request->url : null,
                'email' => $request->type === 'identifiants' ? $request->email : null,
                'mot_de_passe' => $request->type === 'identifiants' ? $request->password : null,
                'projet_id' => $projet->id,
                'environnement_id' => $request->environnement_id,
            ]);

            // 🔍 DEBUG - Log pour vérifier la création
            Log::info('Accès créé', [
                'id' => $acces->id,
                'type' => $acces->type,
                'projet_id' => $projet->id
            ]);

            // 3️⃣ Redirection avec message de succès (✅ correction de la faute de frappe)
            return redirect()->route('projet.acces.index', $projet->id)
                ->with('success', 'Accès créé avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur création accès', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Erreur : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Supprimer un accès
     */
    public function destroy(Projet $projet, Acces $acces)
    {
        try {
            $acces->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Accès supprimé avec succès.'
                ]);
            }

            return redirect()->route('projet.acces.index', $projet->id)
                ->with('success', 'Accès supprimé avec succès.');

        } catch (\Exception $e) {
            Log::error('Erreur suppression accès', [
                'message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', 'Erreur lors de la suppression.');
        }
    }
}