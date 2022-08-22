<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\User;
use App\Models\Character;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index()
    {
        $users = User::select('name','id')->get();
        $races = Race::select('name', 'id')->get();
        
        $characters = Character::all();
        
        return view('sections.admin.characters', [
            'users' => $users,
            'races' => $races,
            'characters' => $characters
        ]);
    }
}
