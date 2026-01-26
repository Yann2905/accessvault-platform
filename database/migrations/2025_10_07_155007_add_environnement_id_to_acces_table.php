<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('acces', function (Blueprint $table) {
            $table->unsignedBigInteger('environnement_id')->nullable(); // nullable si certains accès n'ont pas d'environnement
            $table->foreign('environnement_id')->references('id')->on('environnements')->onDelete('set null');
            $table->dropColumn('environnement'); // si tu avais l'ancien ENUM
        });
    }
    
    public function down(): void
    {
        Schema::table('acces', function (Blueprint $table) {
            $table->string('environnement')->nullable();
            $table->dropForeign(['environnement_id']);
            $table->dropColumn('environnement_id');
        });
    }
    
};
