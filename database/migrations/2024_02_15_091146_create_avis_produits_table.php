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
        Schema::create('avis_produits', function (Blueprint $table) {
            $table->id('id_avisproduit');
            $table->text('commentaire');
            $table->integer('note');
            $table->integer('id_users');
            $table->integer('id_produit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis_produits');
    }
};
