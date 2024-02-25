<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        return view('commande.show', compact('commande'));
    }
}

