<?php

// app/Models/AvisProduit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisProduit extends Model
{
    protected $table = 'avis_produits';

    protected $fillable = [
        'id_users',
        'id_produit',
        'commentaire',
        'note',
    ];

    // Définissez les relations Eloquent si nécessaire
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
