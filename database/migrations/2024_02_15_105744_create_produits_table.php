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
        DB::statement("
        CREATE VIEW fullproduit AS
        SELECT
        p.nom_produit as nom_produit, p.id_categorie as id_categorie, p.description as description,p.prix as prix,p.peremption as peremption,p.type_unite as type_unite,p.stock as stock,ca.id_categorie as id_categorie,c.nom as categorie
        FROM
            categories AS ca
        JOIN produits AS p ON ca.id_categorie = p.id_categorie
        JOIN categories AS c ON p.id_categorie = c.id_categorie
        WHERE
            p.id_categorie = ca.id_categorie;
        ;
    ");
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id_produit');
            $table->string('nom_produit');
            $table->text('description');
            $table->decimal('prix',10,2);
            $table->integer('stock');
            $table->string('peremption');
            $table->string('type_unite');
            $table->integer('id_categorie');
            $table->string('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
