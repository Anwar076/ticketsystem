<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Toon een lijst van gebruikers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Andere methoden voor gebruikersbeheer kunnen hier worden toegevoegd

    // Voorbeeld van een methode om een enkele gebruiker te tonen
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Voorbeeld van een methode om een gebruiker te bewerken
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Voorbeeld van een methode om een gebruiker bij te werken
    public function update(Request $request, User $user)
    {
        // Validatie en gegevens bijwerken
    }

    // Voorbeeld van een methode om een gebruiker te verwijderen
    public function destroy(User $user)
    {
        // Gebruiker verwijderen
    }
}
