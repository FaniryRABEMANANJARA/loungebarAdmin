<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsCommande extends Model
{
    protected $primaryKey = 'id_details_commande';

    protected $fillable = [
        'id_commande',
        'id_produit',
        'quantite',
        'prix_unitaire',
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }
}

