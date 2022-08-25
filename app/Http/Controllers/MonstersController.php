<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;

class MonstersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monsters = Monster::all();
        return view('sections.admin.monsters.index', [
            'monsters' => $monsters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.admin.monsters.form', [
            'monster' => null,
            'formAction' => route('monsters.store'),
            'formMethod' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'type' => ['required','integer'],
            'alignment' => ['required','integer'],
            'size_id' => ['required','integer'],
            'speed' => ['required','integer'],
            'ac' => ['required','integer'],
            'armor' => ['required','string'],
            'hp' => ['required','string'],
            'str' => ['required','integer'],
            'dex' => ['required','integer'],
            'con' => ['required','integer'],
            'int' => ['required','integer'],
            'wis' => ['required','integer'],
            'cha' => ['required','integer'],
            'saves' => ['nullable','string'],
            'skills' => ['required','string'],
            'languages' => ['nullable','string'],
            'description' => ['nullable','string'],
            'traits' => ['nullable','string'],
            'actions' => ['required','string'],
            'challenge' => ['required','string'],
        ]);

        $monster = new Monster();
        $monster->name = $validated['name'];
        $monster->type = $validated['type'];
        $monster->alignment = $validated['alignment'];
        $monster->size_id = $validated['size_id'];
        $monster->speed = $validated['speed'];
        $monster->ac = $validated['ac'];
        $monster->armor = $validated['armor'];
        $monster->hp = $validated['hp'];
        $monster->str = $validated['str'];
        $monster->dex = $validated['dex'];
        $monster->con = $validated['con'];
        $monster->int = $validated['int'];
        $monster->wis = $validated['wis'];
        $monster->cha = $validated['cha'];
        $monster->saves = $validated['saves'];
        $monster->skills = $validated['skills'];
        $monster->languages = $validated['languages'];
        $monster->description = $validated['description'];
        $monster->traits = $validated['traits'];
        $monster->actions = $validated['actions'];
        $monster->challenge = $validated['challenge'];

        $monster->save();

        return redirect(route('monsters.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monster = Monster::find($id);
        return view('sections.admin.monsters.form', [
            'monster' => $monster,
            'formAction' => route('monsters.update', ['id' => $id]),
            'formMethod' => 'POST'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'type' => ['required','integer'],
            'alignment' => ['required','integer'],
            'size_id' => ['required','integer'],
            'speed' => ['required','integer'],
            'ac' => ['required','integer'],
            'armor' => ['required','string'],
            'hp' => ['required','string'],
            'str' => ['required','integer'],
            'dex' => ['required','integer'],
            'con' => ['required','integer'],
            'int' => ['required','integer'],
            'wis' => ['required','integer'],
            'cha' => ['required','integer'],
            'saves' => ['nullable','string'],
            'skills' => ['required','string'],
            'languages' => ['nullable','string'],
            'description' => ['nullable','string'],
            'traits' => ['nullable','string'],
            'actions' => ['required','string'],
            'challenge' => ['required','string'],
        ]);

        $monster = Monster::find($id);
        $monster->name = $validated['name'];
        $monster->type = $validated['type'];
        $monster->alignment = $validated['alignment'];
        $monster->size_id = $validated['size_id'];
        $monster->speed = $validated['speed'];
        $monster->ac = $validated['ac'];
        $monster->armor = $validated['armor'];
        $monster->hp = $validated['hp'];
        $monster->str = $validated['str'];
        $monster->dex = $validated['dex'];
        $monster->con = $validated['con'];
        $monster->int = $validated['int'];
        $monster->wis = $validated['wis'];
        $monster->cha = $validated['cha'];
        $monster->skills = $validated['skills'];
        $monster->saves = $validated['saves'];
        $monster->languages = $validated['languages'];
        $monster->description = $validated['description'];
        $monster->traits = $validated['traits'];
        $monster->actions = $validated['actions'];
        $monster->challenge = $validated['challenge'];

        $monster->save();

        return redirect(route('monsters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monster = Monster::find($id);
        $monster->delete();
        return redirect(route('monsters.index'));
    }
}
