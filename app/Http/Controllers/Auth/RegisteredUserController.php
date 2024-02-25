<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Enregistrement de l'image dans un dossier
        $photoPath = $request->file('photo')->store('profile_photos', 'public');

        $user = User::create([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'photo' => $photoPath, // Enregistrement du chemin d'accès dans la base de données
            'password' => Hash::make($request->password),
            'role' => 'fournisseur',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
