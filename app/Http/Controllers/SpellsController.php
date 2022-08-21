<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Spell;
use Illuminate\Http\Request;

class SpellsController extends Controller
{
    public function index()
    {
        $spells = Spell::all();
        $schools = School::all();

        return view('sections.admin.spells', [
            'spells' => $spells,
            'schools' => $schools
        ]);
    }

    public function create(Request $request)
    {
        // $table->string('name');
        // $table->integer('level');
        // $table->integer('school_id');
        // $table->integer('casting_time');
        // $table->integer('form');
        // $table->integer('range');
        // $table->integer('duration');
        // $table->json('comp')->default(new Expression('(JSON_ARRAY())'));
        // $table->string('comp_spec')->default("");
        // $table->string('desc_en')->default("");
        // $table->string('desc_no')->default("");
        
        $validated = $request->validate([
            'name' => ['required','string'],
            'level' => ['required','integer'],
            'school_id' => ['required','integer'],
            'casting_time' => ['required','integer'],
            'range' => ['required','integer'],
            'duration' => ['required','integer'],
            'comp_v' => ['nullable','string'],
            'comp_s' => ['nullable','string'],
            'comp_m' => ['nullable','string'],
            'comp_spec' => ['nullable','string'],
            'desc_en' => ['nullable','string'],
            'desc_no' => ['nullable','string'],
            'form' => ['nullable','integer'],
        ]);

        $school = new Spell;
        $school->name = $validated['name'];
        $school->level = $validated['level'];
        $school->school_id = $validated['school_id'];
        $school->casting_time = $validated['casting_time'];
        $school->range = $validated['range'];
        $school->duration = $validated['duration'];
        $school->comp = [
            'comp' => [
                'v' => isset($validated['comp_v']),
                's' => isset($validated['comp_s']),
                'm' => isset($validated['comp_m']),
            ],
            'comp_spec' => $validated['comp_spec'],
        ];
        $school->desc_en = $validated['desc_en'];
        $school->desc_no = $validated['desc_no'];
        $school->form = $validated['form'];

        $school->save();

        return redirect('/spells');
    }
}