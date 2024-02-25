<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id_users';

    protected $fillable = [
        'nom',
        'prenoms',
        'email',
        'password',
        'adresse',
        'role',
        'photo',
    ];
    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_users');
    }

    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'id_users');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_users');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
