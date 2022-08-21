<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RacesController extends Controller
{
    public function index()
    {
        $races = Race::all();
        return view('sections.admin.races', [
            'races' => $races
        ]);
    }

    public function create(Request $request){        
        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'speed' => ['required','integer', 'min:0', 'max:100'],
            'size_id' => ['required','integer', 'min:0', 'max:10'],
            'str_bonus' => ['required','integer', 'min:0', 'max:100'],
            'dex_bonus' => ['required','integer', 'min:0', 'max:100'],
            'con_bonus' => ['required','integer', 'min:0','max:100'],
            'int_bonus' => ['required','integer', 'min:0', 'max:100'],
            'wis_bonus' => ['required','integer', 'min:0', 'max:100'],
            'cha_bonus' => ['required','integer', 'min:0', 'max:100']
        ]);

        $race = new Race;

        $race->name = $validated['name'];
        $race->speed = $validated['speed'];
        $race->size_id = $validated['size_id'];
        $race->str_bonus = $validated['str_bonus'];
        $race->dex_bonus = $validated['dex_bonus'];
        $race->con_bonus = $validated['con_bonus'];
        $race->int_bonus = $validated['int_bonus'];
        $race->wis_bonus = $validated['wis_bonus'];
        $race->cha_bonus = $validated['cha_bonus'];
        $race->save();

        return redirect('/races');
    }
}
