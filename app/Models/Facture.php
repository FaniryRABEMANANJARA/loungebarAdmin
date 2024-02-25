<?php

// Facture.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $table = 'factures';

    protected $fillable = [
        'id_commande',
        'montant_total',
        'date_facturation',
        'id_type',
        'statut_paiement',
    ];

    // Relation avec la table 'commandes'
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }

    // Relation avec la table 'typepaiement'
    public function typePaiement()
    {
        return $this->belongsTo(TypePaiement::class, 'id_type');
    }
}
