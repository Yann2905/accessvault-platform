<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();  // crée un champ auto-incrémenté 'id' (clé primaire)
            $table->string('nom', 100); // champ VARCHAR(100) 'nom' obligatoire
            $table->string('email', 150)->unique(); // VARCHAR(150) unique pour email
            $table->string('mot_de_passe'); // VARCHAR(255) mot_de_passe (password hashé)
            $table->enum('role', ['admin', 'utilisateur'])->default('utilisateur'); // enum 'role' avec valeurs et défaut
            $table->timestamps(); // crée deux champs 'created_at' et 'updated_at' en TIMESTAMP automatiquement
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs'); // supprime la table si rollback
    }
}
