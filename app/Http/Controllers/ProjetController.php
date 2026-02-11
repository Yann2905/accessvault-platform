<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\Acces;
use App\Models\Environnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjetController extends Controller
{
    public function index2()
    {
        $projets = Projet::paginate(4);
        return view('projet.index2', compact('projets'));
    }

    public function create()
    {
        return view('projet.create');
    }

    public function store(Request $request)
    {
        // 🔧 FIX: Remplacer les underscores par des espaces AVANT validation
        $statut = str_replace('_', ' ', $request->statut);

        // 1️⃣ Validation
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:150',
            'description' => 'nullable|string|max:255',
            'statut' => 'required|string',
        ], [
            'nom.required' => 'Le nom du projet est obligatoire.',
            'nom.max' => 'Le nom ne peut pas dépasser 150 caractères.',
            'description.max' => 'La description ne peut pas dépasser 255 caractères.',
            'statut.required' => 'Le statut est obligatoire.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // 2️⃣ Création du projet
            $projet = Projet::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'statut' => $statut, // ✅ Utilise la version corrigée
                'created_by' => Auth::id(),
            ]);

            // 🔍 DEBUG - Vérifie si le projet est bien créé
            Log::info('Projet créé', [
                'id' => $projet->id,
                'nom' => $projet->nom,
                'statut' => $projet->statut
            ]);

            // 3️⃣ Redirection avec message de succès
            return redirect()->route('projet.index2')
                ->with('success', 'Projet créé avec succès !');

        } catch (\Exception $e) {
            // 4️⃣ Log de l'erreur
            Log::error('Erreur création projet', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Erreur : ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        $acces = Acces::with('environnement')->where('projet_id', $projet->id)->get();
        $environnements = Environnement::all();

        return view('projet.show', compact('projet', 'acces', 'environnements'));
    }

    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projet.edit', compact('projet'));
    }

    public function update(Request $request, $id)
    {
        // 🔧 FIX: Remplacer les underscores par des espaces
        $statut = str_replace('_', ' ', $request->statut);

        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'statut' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $projet = Projet::findOrFail($id);

        $projet->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'statut' => $statut, // ✅ Utilise la version corrigée
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('projet.index2')
            ->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Projet supprimé avec succès.'
            ]);
        }

        return redirect()->route('projet.index2')
            ->with('success', 'Projet supprimé avec succès.');
    }

    public function updateLogo(Request $request, $id)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $projet = Projet::findOrFail($id);

        if ($projet->logo) {
            $oldPath = public_path('logos/' . basename($projet->logo));
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $file = $request->file('logo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('logos');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $file->move($destinationPath, $filename);
        $projet->logo = 'logos/' . $filename;
        $projet->save();

        return redirect()->back()
            ->with('success', 'Logo mis à jour avec succès.');
    }
}