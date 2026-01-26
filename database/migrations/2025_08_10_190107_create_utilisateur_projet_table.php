<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurProjetTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateur_projet', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('projet_id');
            $table->timestamps();

            $table->primary(['utilisateur_id', 'projet_id']);

            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateur_projet');
    }
}
