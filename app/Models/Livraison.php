<?php

// app/Models/Livraison.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = 'livraisons';

    protected $fillable = [
        'id_users',
        'adresse',
        'ville',
        'code_postal',
        'pays',
    ];

    // Définissez les relations Eloquent si nécessaire
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}
