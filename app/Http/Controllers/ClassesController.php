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
        return view('sections.admin.classes', [
            'classes' => $classes,
            'spells' => SpellsController::getSpells(),
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

        $class = CharacterClass::where('id',$id)->get()->first();
        
        $checkeds = [];
        foreach($class->spells as $spell){
            array_push($checkeds, $spell->id);
        }

        return view('sections.admin.classes', [
            'classes' => $classes,
            'spells' => SpellsController::getSpells(),
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
