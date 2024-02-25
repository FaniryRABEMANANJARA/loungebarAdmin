<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $primaryKey = 'id_categorie';

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_categorie');
    }

    protected $fillable = [
       'id_categorie' ,
       'nom',
    ];
}
