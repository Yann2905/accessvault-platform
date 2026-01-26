<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('acces', function (Blueprint $table) {
            // MySQL ne supporte pas "modifier" directement un varchar en enum via Blueprint
            // Donc on doit utiliser une instruction brute
            \DB::statement("ALTER TABLE acces MODIFY environnement ENUM('en_developpement', 'recette', 'production') NOT NULL DEFAULT 'en_developpement'");
        });
    }

    public function down(): void
    {
        Schema::table('acces', function (Blueprint $table) {
            // Revenir en varchar si on rollback
            \DB::statement("ALTER TABLE acces MODIFY environnement VARCHAR(255) NOT NULL");
        });
    }
};
