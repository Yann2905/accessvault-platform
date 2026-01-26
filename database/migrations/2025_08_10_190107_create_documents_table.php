<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projet_id');
            $table->string('nom_fichier', 255);
            $table->string('chemin_fichier', 255);
            $table->string('type_fichier', 100)->nullable();
            $table->string('icon_fichier')->nullable();
            $table->timestamp('uploaded_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
