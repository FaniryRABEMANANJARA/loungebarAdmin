<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produit';
    //protected $view = 'fullproduit';
    protected $fillable = [
        'nom_produit',
        'description',
        'prix',
        'stock',
        'peremption',
        'type_unite',
        'id_categorie',
        'created_at', 
    ];

}
