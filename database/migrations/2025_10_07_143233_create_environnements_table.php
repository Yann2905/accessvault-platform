<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('environnements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');       // Nom de l'environnement
            $table->string('couleur');       // Couleur Bootstrap (primary, warning, danger, success)
            $table->timestamps();            // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('environnements');
    }
};
