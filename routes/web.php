<?php
namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\projet;
use App\Http\Controllers\ProjetController;
use App\Models\document;
use App\Http\Controllers\DocumentController;
use App\Models\acces;
use App\Http\Controllers\AccesController;
use App\Http\Controllers\UtilisateurProjetController;
use App\Http\Controllers\EnvironnementController;
use App\Models\Environnement;


// ========================================
// ROUTES PUBLIQUES (accessibles sans connexion)
// ========================================

// Page de connexion (GET) - Affiche le formulaire
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

// Traitement de la connexion (POST)
Route::post('/login', function(Request $request) {
    $user = Utilisateur::where('email', $request->email)->first();

    if($user && password_verify($request->mot_de_passe, $user->mot_de_passe)) {
        Auth::login($user);
        return redirect('/index')->with('success', 'Connexion réussie !');
    }

    return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
})->name('login.post')->middleware('guest');

// Page de création d'utilisateur (accessible aux utilisateurs connectés)


// ========================================
// ROUTES PROTÉGÉES (nécessitent une connexion)
// ========================================

Route::middleware(['auth'])->group(function () {
    
    
    // Page d'accueil (dashboard)
   
    
    
    
        // ======================
        // Page d'accueil (dashboard)
        // ======================
        Route::get('/index', function () {
            $user = Auth::user();
    
            // 📁 Récupérer les projets
            $projets = $user->role === 'admin'
                ? Projet::all()
                : $user->projets()->get();
    
            // 📊 Statistiques projets
            $statsProjets = [
                'developpement' => $projets->where('statut', 'en_developpement')->count(),
                'recette'       => $projets->where('statut', 'en_recette')->count(),
                'production'    => $projets->where('statut', 'en_production')->count(),
            ];
            $totalProjets = $projets->count();
             // 🆕 On récupère les 2 derniers projets créés
           $derniersProjets = $projets->sortByDesc('created_at')->take(2);
    
          
            // 🌍 Environnements
            $environnements = Environnement::all();
            $totalEnvironnements = $environnements->count();
            $derniersEnvironnements = Environnement::orderBy('created_at', 'desc')->take(2)->get();


          
            // Utilisateurs (pour la carte “Clients”)
            $utilisateurs = Utilisateur::take(5)->get(); // les 6 premiers
            $totalUtilisateurs = Utilisateur::count();
            $derniersUtilisateurs = Utilisateur::orderBy('created_at', 'desc')->take(2)->get();
    
            if ($user->role === 'admin') {
                // L'administrateur voit tous les accès
                $acces = Acces::all();
            } else {
                // L'utilisateur standard voit les accès liés à ses projets
                $projetIds = $user->projets->pluck('id'); // récupère tous les IDs des projets de l'utilisateur
                $acces = Acces::whereIn('projet_id', $projetIds)->get();
            }
            
    
            // Statistiques accès
            $totalAcces = $acces->count();
            $accesParType = $acces->groupBy('type')->map->count(); // ['Lien' => 5, 'Identifiants' => 3]
            
            $derniersAcces = Acces::orderBy('created_at', 'desc')->take(2)->get();
    
            // Retourne toutes les données à la vue
            return view('index', compact(
                'user',
                'projets',
                'totalProjets',
                'derniersProjets',
                'statsProjets',
                'utilisateurs',
                'totalUtilisateurs',
                'derniersUtilisateurs',
                'environnements',
                'derniersEnvironnements',
                'totalEnvironnements',
                'acces',
                'totalAcces',
                'accesParType',
                'derniersAcces'
            ));
        })->name('index');
    
    


    // Déconnexion
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login')->with('success', 'Déconnexion réussie !');
    })->name('logout');

  

   // Gestion des projets - ROUTES COMPLÈTES
Route::prefix('projet')->name('projet.')->group(function () {
    // Liste des projets
    Route::get('/', [ProjetController::class, 'index2'])->name('index2');
    
    // Formulaire de création
    Route::get('/create', [ProjetController::class, 'create'])->name('create');
    
    // Traitement de la création (STORE)
    Route::post('/', [ProjetController::class, 'store'])->name('store');
    
    // Affichage d'un projet
    Route::get('/{projet}', [ProjetController::class, 'show'])->name('show');
    // Formulaire de modification
    Route::get('/{projet}/edit', [ProjetController::class, 'edit'])->name('edit');
    
    // Traitement de la modification
    Route::put('/{projet}', [ProjetController::class, 'update'])->name('update');

    Route::PUT('/{id}/logo', [ProjetController::class, 'updateLogo'])->name('updateLogo');

    
    // Suppression d'un projet
    Route::delete('/{projet}', [ProjetController::class, 'destroy'])->name('destroy');

     // Gestion des documents - ROUTES COMPLÈTES
     Route::prefix('{projet}/documents')->name('document.')->group(function () {
        // Liste des documents
        Route::get('/', [DocumentController::class, 'index3'])->name('index3');
        
        // Formulaire de création
        Route::get('/create', [DocumentController::class, 'create'])->name('create');
        
        // Traitement de la création (STORE)
        Route::post('/', [DocumentController::class, 'store'])->name('store');
        
        //suppression d'un document
        Route::delete('/{document}',[DocumentController::class, 'destroy'])->name('destroy');
    });
    

    // Gestion des acces- ROUTES COMPLÈTES
    Route::prefix('{projet}/acces')->name('acces.')->group(function () {
        // Liste des acces
        Route::get('/', [AccesController::class, 'index'])->name('index');
        
        // Formulaire de création
        Route::get('/create', [AccesController::class, 'create'])->name('create');
        
        // Traitement de la création (STORE)
        Route::post('/', [AccesController::class, 'store'])->name('store');
        
        //suppression d'un acces
        Route::delete('/{acces}',[AccesController::class, 'destroy'])->name('destroy');
    });
    });


    


    Route::prefix('utilisateur')->group(function () {
        Route::get('/projets', [UtilisateurProjetController::class, 'index'])->name('utilisateur.projets.index');
        Route::post('/projets/{projet}', [UtilisateurProjetController::class, 'store'])->name('utilisateur.projets.store');
        Route::delete('/projets/{projet}', [UtilisateurProjetController::class, 'destroy'])->name('utilisateur.projets.destroy');
        Route::get('/projets/{projet}', [UtilisateurProjetController::class, 'show'])->name('utilisateur.projets.show'); // détails
    });
    
        
       
    // Gestion des utilisateurs - ROUTES COMPLÈTES
    Route::prefix('utilisateur')->name('utilisateur.')->group(function () {
        // Liste des utilisateurs
        Route::get('/', [UserController::class, 'index'])->name('index');
        
        // Formulaire de création
        Route::get('/create', [UserController::class, 'create'])->name('create');
        
        // Traitement de la création (STORE)
        Route::post('/', [UserController::class, 'store'])->name('store');

        Route::get('/mon-profil', [UserController::class, 'monProfil'])->middleware('auth')->name('monProfil');
        Route::put('/mon-profil', [UserController::class, 'updateProfil'])->middleware('auth')->name('updateProfil');
        
        // Affichage d'un utilisateur
        Route::get('/{utilisateur}', [UserController::class, 'show'])->name('show');
        
        // Formulaire de modification
        Route::get('/{utilisateur}/edit', [UserController::class, 'edit'])->name('edit');
        
        // Traitement de la modification
        Route::put('/{utilisateur}', [UserController::class, 'update'])->name('update');
        
        // Suppression d'un utilisateur
        Route::delete('/{utilisateur}', [UserController::class, 'destroy'])->name('destroy');
        // Route pour que l'utilisateur voie son propre profil
        

        
        
    
    });

   


    

Route::prefix('environnements')->name('environnements.')->group(function () {
    // Liste des environnements
    Route::get('/', [EnvironnementController::class, 'index'])->name('index');

    // Formulaire de création
    Route::get('/create', [EnvironnementController::class, 'create'])->name('create');

    // Traitement de la création
    Route::post('/', [EnvironnementController::class, 'store'])->name('store');

    // Formulaire de modification
    Route::get('/{environnement}/edit', [EnvironnementController::class, 'edit'])->name('edit');

    // Traitement de la modification
    Route::put('/{environnement}', [EnvironnementController::class, 'update'])->name('update');

    // Suppression
    Route::delete('/{environnement}', [EnvironnementController::class, 'destroy'])->name('destroy');
});


    // Dashboard admin (protégé par rôle)
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/index')->with('error', 'Accès non autorisé.');
        }
        return view('dashboard');
    })->name('dashboard');


// ========================================
// ROUTE DE FALLBACK (page 404)
// ========================================

Route::fallback(function () {
    return redirect('/index')->with('error', 'Page non trouvée.');
});
});