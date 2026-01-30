<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // PostgreSQL utilise des types personnalisés ou CHECK constraints
        
        // Si la colonne existe déjà, on la modifie
        if (Schema::hasColumn('acces', 'environnement')) {
            // Supprimer la contrainte existante si elle existe
            DB::statement("ALTER TABLE acces DROP CONSTRAINT IF EXISTS acces_environnement_check");
            
            // Modifier la colonne pour accepter les nouvelles valeurs
            Schema::table('acces', function (Blueprint $table) {
                $table->string('environnement')->default('en_developpement')->change();
            });
            
            // Ajouter une contrainte CHECK pour limiter les valeurs
            DB::statement("
                ALTER TABLE acces 
                ADD CONSTRAINT acces_environnement_check 
                CHECK (environnement IN ('en_developpement', 'recette', 'production'))
            ");
        }
    }

    public function down(): void
    {
        // Supprimer la contrainte
        DB::statement("ALTER TABLE acces DROP CONSTRAINT IF EXISTS acces_environnement_check");
    }
};