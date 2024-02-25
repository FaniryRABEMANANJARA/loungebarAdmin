<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Commencez par récupérer tous les utilisateurs
        $query = User::query();
    
        // Appliquez les filtres de recherche s'ils sont présents dans la requête
        if ($request->has('nom')) {
            $query->where('nom', 'like', '%' . $request->input('nom') . '%');
        }
    
         if ($request->has('prenoms')) {
            $query->where('prenoms', '>=', $request->input('prenoms'));
         }
    
        // if ($request->has('prix')) {
        //     $query->where('prix', '<=', $request->input('prix'));
        // }
        // Ajoutez la condition pour l'état 0
        $query->where('etat', 0);
    
        // Obtenez les utilisateurs filtrés
        $users = $query->get();
    
        // Passez les utilisateurs filtrés à la vue
        return view('users', compact('users'));
    }
    public function ajouterUsers()
    {
      return view('ajouterusers');
    }
    public function ajouterUtilisateur(Request $request)
    {
        // Valider les données du formulaire
       // die($request);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|max:255',
            'adresse' => 'required|string',
            'role' => 'required|string',
            'photo' => 'required|string|max:255',
            'etat' => 'integer',
            
    ]);

        // Créer un nouveau users dans la base de données
        User::create([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'email' => $request->email,
            'password' => $request->password,
            'adresse' => $request->adresse,
            'role' => $request->role,
            'photo' => $request->photo,
            'etat' => 0
        ]);

        // Rediriger vers une page de confirmation ou ailleurs
        //return redirect()->route('users')->with('success', 'Utilisateur ajouté avec succès!');
        return view('ajouterusers');
    }
    
    public function modificationUsers($id)
    {
      $user = User::findOrFail($id);
      return view('modifierusers',compact('user'));
    }

    public function mettreAjourUser(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|max:255',
            'adresse' => 'required|string',
            'role' => 'required|string',
            'photo' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        // Mettre à jour les attributs du user
        $user->update([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'email' => $request->email,
            'password' => $request->password,
            'adresse' => $request->adresse,
            'role' => $request->role,
            'photo' => $request->photo,
        ]);

        return redirect()->route('users')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    public function supprimerUtilisateur($id)
    {
        // Trouver le produit
        $user = User::findOrFail($id);
    
        // Mettre à jour l'état du produit au lieu de le supprimer
        $user->update([
            'etat' => 10, // Assurez-vous que votre modèle de produit a une colonne "etat"
        ]);
    
        // Rediriger vers la page d'accueil ou ailleurs
        return redirect()->route('users')->with('success', 'Utilisateur supprimé avec succès!');
    }
  
    public function logout()
{
    Auth::logout();
    return redirect('/');
}
    
}
