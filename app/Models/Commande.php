<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $primaryKey = 'id_commande';
    
    protected $fillable = [
        'id_users',
        'id_commande',
        'date_commande',
        'status',
        
    ];
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function detailsCommande()
    {
        return $this->hasMany(DetailsCommande::class, 'id_commande');
    }
}
