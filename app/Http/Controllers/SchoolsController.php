<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('sections.admin.schools.index', [
            'schools' => $schools
        ]);
    }

    public function create()
    {
        return view('sections.admin.schools.form', [
            'school' => null,
            'formAction' => route('schools.store'),
            'formMethod' => 'POST'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'desc_en' => ['required','string'],
            'desc_no' => ['required','string'],
        ]);

        $school = new School;
        $school->name = $validated['name'];
        $school->desc_en = $validated['desc_en'];
        $school->desc_no = $validated['desc_no'];
        $school->save();

        return redirect(route('schools.index'));
    }

    public function edit($id)
    {
        return view('sections.admin.schools.form', [
            'school' => School::find($id),
            'formAction' => route('schools.update', ['id' => $id]),
            'formMethod' => 'POST'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'desc_en' => ['required','string'],
            'desc_no' => ['required','string'],
        ]);

        $school = School::find($id);
        $school->name = $validated['name'];
        $school->desc_en = $validated['desc_en'];
        $school->desc_no = $validated['desc_no'];
        $school->save();

        return redirect(route('schools.index'));
    }
}
