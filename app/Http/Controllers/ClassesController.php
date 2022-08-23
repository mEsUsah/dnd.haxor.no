<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use Illuminate\Http\Request;
use App\Models\CharacterClass;
use Illuminate\Support\Facades\Log;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = CharacterClass::all();

        $spellsLv0 = Spell::where('level', 0)->get();
        $spellsLv1 = Spell::where('level', 1)->get();
        $spellsLv2 = Spell::where('level', 2)->get();
        $spellsLv3 = Spell::where('level', 3)->get();
        $spellsLv4 = Spell::where('level', 4)->get();
        $spellsLv5 = Spell::where('level', 5)->get();
        $spellsLv6 = Spell::where('level', 6)->get();
        $spellsLv7 = Spell::where('level', 7)->get();
        $spellsLv8 = Spell::where('level', 8)->get();
        $spellsLv9 = Spell::where('level', 9)->get();
        return view('sections.admin.classes', [
            'classes' => $classes,
            'spells' => [
                'Cantip' => $spellsLv0,
                'Level 1' => $spellsLv1,
                'Level 2' => $spellsLv2,
                'Level 3' => $spellsLv3,
                'Level 4' => $spellsLv4,
                'Level 5' => $spellsLv5,
                'Level 6' => $spellsLv6,
                'Level 7' => $spellsLv7,
                'Level 8' => $spellsLv8,
                'Level 9' => $spellsLv9,
            ],
            'class' => null,
            'checkeds' => null,
            'postUrl' => '/class',
            'deleteUrl' => null
        ]);
    }

    public function create(Request $request)
    {
        Log::debug($request);
        $characterClass = new CharacterClass();
        $characterClass->name = $request['name'];
        $characterClass->save();
        
        $spells = Spell::find($request['spells']);
        $characterClass->spells()->attach($spells);
        
        return redirect('/classes');
    }

    public function edit($id)
    {
        $classes = CharacterClass::all();

        $spellsLv0 = Spell::where('level', 0)->get();
        $spellsLv1 = Spell::where('level', 1)->get();
        $spellsLv2 = Spell::where('level', 2)->get();
        $spellsLv3 = Spell::where('level', 3)->get();
        $spellsLv4 = Spell::where('level', 4)->get();
        $spellsLv5 = Spell::where('level', 5)->get();
        $spellsLv6 = Spell::where('level', 6)->get();
        $spellsLv7 = Spell::where('level', 7)->get();
        $spellsLv8 = Spell::where('level', 8)->get();
        $spellsLv9 = Spell::where('level', 9)->get();

        $class = CharacterClass::where('id',$id)->get()->first();
        
        $checkeds = [];
        foreach($class->spells as $spell){
            array_push($checkeds, $spell->id);
        }

        return view('sections.admin.classes', [
            'classes' => $classes,
            'spells' => [
                'Cantip' => $spellsLv0,
                'Level 1' => $spellsLv1,
                'Level 2' => $spellsLv2,
                'Level 3' => $spellsLv3,
                'Level 4' => $spellsLv4,
                'Level 5' => $spellsLv5,
                'Level 6' => $spellsLv6,
                'Level 7' => $spellsLv7,
                'Level 8' => $spellsLv8,
                'Level 9' => $spellsLv9,
            ],
            'class' => $class,
            'checkeds' => $checkeds,
            'postUrl' => "/class/{$id}/update",
            'deleteUrl' => "/class/{$id}/delete"
        ]);
    }

    public function update(Request $request, $id)
    {
        $characterClass = CharacterClass::find($id);
        $characterClass->name = $request['name'];
        $characterClass->save();
        
        $spells = Spell::find($request['spells']);
        $characterClass->spells()->sync($spells);
        
        return redirect('/classes');
    }

    public function delete($id)
    {
        $characterClass = CharacterClass::find($id);
        $characterClass->spells()->detach();
        $characterClass->delete();

        return redirect('/classes');
    }
}
