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
        return view('sections.admin.classes.index', [
            'classes' => $classes,
        ]);
    }
    public function create()
    {
        return view('sections.admin.classes.form', [
            'spells' => SpellsController::getSpells(),
            'class' => null,
            'checkeds' => null,
            'formAction' => route('classes.store'),
            'formMethod' => 'POST'
        ]);
    }

    public function store(Request $request)
    {
        Log::debug($request);
        $characterClass = new CharacterClass();
        $characterClass->name = $request['name'];
        $characterClass->save();
        
        $spells = Spell::find($request['spells']);
        $characterClass->spells()->attach($spells);
        
        return redirect(route('classes.index'));
    }

    public function edit($id)
    {
        $class = CharacterClass::where('id',$id)->get()->first();
        
        $checkeds = [];
        foreach($class->spells as $spell){
            array_push($checkeds, $spell->id);
        }

        return view('sections.admin.classes.form', [
            'spells' => SpellsController::getSpells(),
            'class' => $class,
            'checkeds' => $checkeds,
            'formAction' => route('classes.update', ['id' => $id]),
            'formMethod' => 'POST'
        ]);
    }

    public function update(Request $request, $id)
    {
        $characterClass = CharacterClass::find($id);
        $characterClass->name = $request['name'];
        $characterClass->save();
        
        $spells = Spell::find($request['spells']);
        $characterClass->spells()->sync($spells);
        
        return redirect(route('classes.index'));
    }

    public function destroy($id)
    {
        $characterClass = CharacterClass::find($id);
        $characterClass->spells()->detach();
        $characterClass->delete();

        return redirect(route('classes.index'));
    }
}
