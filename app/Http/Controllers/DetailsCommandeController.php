<?php

namespace App\Http\Controllers;

use App\Models\DetailsCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsCommandeController extends Controller
{
    public function show($id)
    {
        $detailsCommande = DetailsCommande::findOrFail($id);
        return view('details_commande.show', compact('detailsCommande'));
    }

    public function detailsCommande($idCommande)
{
    $detailsCommande = Commande::select(
        'commandes.*',
        'users.nom as nom_utilisateur',
        'livraisons.adresse as adresse_livraison',
        'factures.total as montant_total',
        'factures.date as date_facturation'
    )
    ->join('users', 'commandes.id_users', '=', 'users.id_users')
    ->join('livraisons', 'commandes.id_users', '=', 'livraisons.id_users')
    ->join('factures', 'commandes.id_commande', '=', 'factures.id_commande')
    ->where('commandes.id_commande', $idCommande)
    ->first();

    // Récupérez les détails de chaque produit associé à la commande
    $detailsProduits = DB::table('detailscommande')
        ->select('produit.nom_produit', 'detailscommande.quantite', 'detailscommande.prix_unitaire')
        ->join('produit', 'detailscommande.id_produit', '=', 'produit.id_produit')
        ->where('detailscommande.id_commande', $idCommande)
        ->get();

    return view('details_commande', compact('detailsCommande', 'detailsProduits'));
}

public function detailsCommandeProduit($idCommande, $idProduit)
{
    $detailsCommande = Commande::select(
        'commandes.*',
        'users.nom as nom_utilisateur',
        'livraisons.adresse as adresse_livraison',
        'factures.total as montant_total',
        'factures.date as date_facturation'
    )
    ->join('users', 'commandes.id_users', '=', 'users.id_users')
    ->join('livraisons', 'commandes.id_users', '=', 'livraisons.id_users')
    ->join('factures', 'commandes.id_commande', '=', 'factures.id_commande')
    ->where('commandes.id_commande', $idCommande)
    ->first();

    // Récupérez les détails du produit spécifique associé à la commande
    $detailsProduit = DB::table('detailscommande')
        ->select('produit.nom_produit', 'detailscommande.quantite', 'detailscommande.prix_unitaire')
        ->join('produit', 'detailscommande.id_produit', '=', 'produit.id_produit')
        ->where('detailscommande.id_commande', $idCommande)
        ->where('detailscommande.id_produit', $idProduit)
        ->first();

    return view('details_commande_produit', compact('detailsCommande', 'detailsProduit'));
}
}
