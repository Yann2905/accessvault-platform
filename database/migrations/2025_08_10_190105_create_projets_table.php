<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->text('description')->nullable(); // peut être NULL
            $table->enum('statut', ['en production', 'en recette', 'en developpement'])->default('en developpement');
            $table->unsignedBigInteger('created_by')->nullable(); // clé étrangère vers utilisateurs.id
            $table->timestamps();

            // Contrainte clé étrangère
            $table->foreign('created_by')->references('id')->on('utilisateurs')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
