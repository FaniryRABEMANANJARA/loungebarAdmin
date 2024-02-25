<?php

// app/Http/Controllers/TypePaiementController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePaiement;

class TypePaiementController extends Controller
{
    public function index()
    {
        // Logique pour afficher la liste des types de paiement
    }

    public function create()
    {
        // Logique pour afficher le formulaire de création d'un type de paiement
    }

    public function store(Request $request)
    {
        // Logique pour enregistrer un nouveau type de paiement dans la base de données
    }

    public function show($id)
    {
        // Logique pour afficher les détails d'un type de paiement spécifique
    }

    public function edit($id)
    {
        // Logique pour afficher le formulaire de modification d'un type de paiement
    }

    public function update(Request $request, $id)
    {
        // Logique pour mettre à jour les informations d'un type de paiement
    }

    public function destroy($id)
    {
        // Logique pour supprimer un type de paiement de la base de données
    }
}
