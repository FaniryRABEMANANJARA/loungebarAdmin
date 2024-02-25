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
        Schema::create('detailscommandes', function (Blueprint $table) {
            $table->id('id_detailcommande');
            $table->integer('id_commande');
            $table->integer('id_produit');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2)->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailscommandes');
    }
};
