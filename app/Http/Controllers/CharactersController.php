<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index()
    {
        $users = User::select('name','id')->get();
        $characters = Character::all();
        return view('sections.admin.characters', [
            'users' => $users,
            'characters' => $characters
        ]);
    }
}
