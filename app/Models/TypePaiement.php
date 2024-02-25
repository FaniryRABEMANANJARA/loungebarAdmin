<?php
// app/Models/TypePaiement.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePaiement extends Model
{
    protected $table = 'typepaiements';

    protected $fillable = [
        'nom',
        'logo',
    ];

    // Définissez les relations Eloquent si nécessaire
    public function factures()
    {
        return $this->hasMany(Facture::class, 'id_type');
    }
}

