<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesTable extends Migration
{
    public function up()
    {
        Schema::create('acces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projet_id');
            $table->enum('type', ['lien', 'identifiants']);
            $table->string('description', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('mot_de_passe', 255)->nullable();
            $table->string('environnement', 50)->default('en_developpement');
            $table->timestamps();

            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acces');
    }
}
