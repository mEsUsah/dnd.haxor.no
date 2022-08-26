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
            'skills' => ['nullable','string'],
            'languages' => ['nullable','string'],
            'description' => ['nullable','string'],
            'traits' => ['nullable','string'],
            'actions' => ['required','string'],
            'challenge' => ['required','string'],
        ]);

        $monster = Monster::create($validated);
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
        $monster = Monster::findOrFail($id);
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
            'skills' => ['nullable','string'],
            'languages' => ['nullable','string'],
            'description' => ['nullable','string'],
            'traits' => ['nullable','string'],
            'actions' => ['required','string'],
            'challenge' => ['required','string'],
        ]);

        $monster = Monster::findOrFail($id);
        $monster->fill($validated);
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
