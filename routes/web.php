<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/ajout-users', [UserController::class, 'ajouterUsers'])->name('ajouterUsers');
Route::post('/ajouter-utilisateur', [UserController::class, 'ajouterUtilisateur']);
Route::get('/modifier-user/{id}', [UserController::class, 'modificationUsers'])->name('modificationUsers');
Route::put('/modifier-users/{id}', [UserController::class, 'mettreAjourUser']);
Route::put('/supprimer-users/{id}', [UserController::class, 'supprimerUtilisateur'])->name('supprimerUtilisateur');


Route::get('/produit', [ProduitController::class, 'index'])->name('produit');

Route::get('/ajout-produit', [ProduitController::class, 'ajoutProduit'])->name('ajoutProduit');
Route::post('/ajouter-produit', [ProduitController::class, 'ajouterProduit']);
Route::get('/modifier-produits/{id}', [ProduitController::class, 'modifierProduit'])->name('modifierProduit');
Route::put('/modifier-produit/{id}', [ProduitController::class, 'mettreAjourProduit']);
Route::put('/supprimer-produit/{id}', 'ProduitController@supprimerProduit')->name('supprimerProduit');


Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie');

Route::get('/ajout-categorie', [CategorieController::class, 'ajouterCategorie'])->name('ajouterCategorie');
Route::post('/ajouter-categorie', [CategorieController::class, 'ajouterCat']);
Route::get('/modifier-categorie/{id}', [CategorieController::class, 'modificationCategorie'])->name('modificationCategorie');
Route::put('/modifier-categories/{id}', [CategorieController::class, 'mettreAjourCategorie']);
Route::put('/supprimer-categories/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimerCategorie');



Route::get('/commande', function () {
    return view('commande');
})->name('commande');


Route::get('/historique', function () {
    return view('historique');
})->name('historique');


Route::get('/dashboard', [ProduitController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
