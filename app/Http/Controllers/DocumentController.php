<?php

namespace App\Http\Controllers;
use App\Models\Document;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller  // Majuscules sur D et C
{
     /**
     * Afficher la liste de tous les documents
     */
    public function index3(Projet $projet)
    {

        // On récupère tous les documents de la base de données qui concerne se projet concerner
        $documents = Document::where('projet_id',$projet->id)->get();
        // $projetModel = Projet::find($projet);
        // $projet = 
        // On retourne la vue avec les documents
        return view('document.index3', compact('documents', 'projet'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create(Projet $projet)
    {
         // On récupère tous les documents de la base de données
         $documents = Document::all();

        return view('document.create',compact('documents', 'projet'));
    }

    public function store(Request $request,Projet $projet)
    {
            // 1️⃣ Validation des données envoyées par le formulaire
            $validator = Validator::make($request->all(), [
                'nom_fichier' => 'required|string|max:255',
                'chemin_fichier' => 'required|file|max:10240',
            ], [
                'nom_fichier.required' => 'Le nom du fichier est obligatoire.',
                'nom_fichier.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'chemin_fichier.required' => 'Le chemin du fichier est obligatoire.',
                'chemin_fichier.max' => 'Le chemin du fichier ne peut pas dépasser 255 caractères.',
            ]);
                  // Si la validation échoue, on retourne sur le formulaire avec les erreurs
             if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
             }   
            
            
            try {

                
               //recuperation des fichiers
               $file= $request->file('chemin_fichier');
               //extension des fichiers
               $type=strtolower($file->getClientOriginalExtension());//ex:pdf
               //stockage du fichiers dans "storage/app/public/documents
               $path = $file->store('documents','public');
               //choix de l'icone
               $icon= $this->getIconForTypefichier($type);
               

                // Création du Document avec l'utilisateur connecté comme créateur
                Document::create([
                    'nom_fichier' => $request->nom_fichier,
                    'chemin_fichier' => $path,
                    'type_fichier' => $type,
                    'icon_fichier'=> $icon,
                    'projet_id' => $projet->id, // ID du projet
                ]);

        
                // Redirection avec message de succès
                return redirect()->route('projet.document.index3',$projet->id)
                    ->with('success', 'Document créé avec succès !');
        
            } catch (\Exception $e) {
                //  Gestion des erreurs inattendues

                dd($e->getMessage());

                return redirect()->back()
                ->with('error','Erreur lors de la création du document. Veuillez réessayer.')
                ->with('error_details','Erreur lors de la création du document. Veuillez réessayer.')
                ->withInput();
            }
        }
     //fonction qui mappe le type de fichier->icon
    private function getIconForTypefichier($type) {
        $map=[
            'pdf'=>'assets/icon/pdf.svg',
            'sql'=>'assets/icon/sql.svg',
            'doc'=>'assets/icon/doc.svg',
            'docx'=>'assets/icon/docx.svg',
            'txt'=>'assets/icon/txt.svg',
            'css'=>'assets/icon/css.svg',
            'ai'=>'assets/icon/ai.svg',
            'xml'=>'assets/icon/xml.svg',
            'tif'=>'assets/icon/tif.svg',
            'word'=>'assets/icon/word.svg',
            'odt'=>'assets/icon/odt.svg',
            'png'=>'assets/icon/png.svg',
            'jpg'=>'assets/icon/jpg.svg',
            'xlsx'=>'assets/icon/excel.svg',
            'html'=>'assets/icon/html.svg',
            'htm'=>'assets/icon/html.svg',
            'js'=>'assets/icon/js.svg',
            'ts'=>'assets/icon/ts.svg',
            'py'=>'assets/icon/py.svg',
            'c'=>'assets/icon/C.svg',
            'cpp'=>'assets/icon/C++.svg',
            'cc'=>'assets/icon/C++.svg',
            'h'=>'assets/icon/C++.svg',
            'cs'=>'assets/icon/C#.svg',
            'swift'=>'assets/icon/swift.svg',
            'pls'=>'assets/icon/pls.svg',
            'plsql'=>'assets/icon/pls.svg',
            'sh'=>'assets/icon/bash.svg',
            'ps1'=>'assets/icon/powershell.svg',
            'r'=>'assets/icon/R.svg',
            'jl'=>'assets/icon/julia.svg',
            'm'=>'assets/icon/matlab.svg',
            'kt'=>'assets/icon/kotlin.svg',
            'kts'=>'assets/icon/kotlin.svg',
            'java'=>'assets/icon/java.svg',
            'rb'=>'assets/icon/ruby.svg',
            'php'=>'assets/icon/php.svg',
            'dart'=>'assets/icon/flutter.svg',

        ];
        return $map[$type] ?? 'assets/icon/file.svg';
    }  
    /**
     * Supprimer un document
     */
    public function destroy(Projet $projet,Document $document)
    {
        $document->delete();

        return redirect()->route('projet.document.index3',$document->projet_id)->with('success', 'Document supprimé avec succès.');
    }
   
}
