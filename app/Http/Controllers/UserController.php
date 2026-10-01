<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Affiche le profil d'un utilisateur avec ses articles
     */
    public function show($id)
    {
        // On récupère l'utilisateur avec ses articles
        $user = User::with('posts')->findOrFail($id);

        return view('users.profile', compact('user'));
    }
    public function index() {
    $users = \App\Models\User::all();
    return view('users.index', compact('users'));
}
}