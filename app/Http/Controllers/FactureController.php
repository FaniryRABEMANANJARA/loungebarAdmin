<?php

// FactureController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;

class FactureController extends Controller
{
    // Méthode pour afficher la liste des factures
    public function index()
    {
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }

    // Autres méthodes pour créer, mettre à jour, afficher, supprimer, etc.
    // ...

}
