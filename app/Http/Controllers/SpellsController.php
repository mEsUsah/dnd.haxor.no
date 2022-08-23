<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $validated = $request->validate([
            'name' => ['required','string'],
            'level' => ['required','integer'],
            'school_id' => ['required','integer'],
            'casting_time' => ['required','integer'],
            'range' => ['required','integer'],
            'duration' => ['required','integer'],
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
                'v' => isset($request['comp_v']),
                's' => isset($request['comp_s']),
                'm' => isset($request['comp_m']),
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
