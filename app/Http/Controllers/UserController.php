<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->has('comics')->get();
        return view('users.index', compact('users'));
    }
//mostra tutti i fumettisti che hanno pubblicato qualcosa
    public function show(User $user)
    {
        $user->load('profile','comics.categories');
        return view('users.show', compact('user'));
    }

//mostra il profilo pubblico di un fumettista con i suoi fumetti e le categorie associate
}
