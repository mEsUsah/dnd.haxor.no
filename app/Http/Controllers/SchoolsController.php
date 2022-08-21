<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('sections.admin.schools', [
            'schools' => $schools
        ]);
    }

    public function create(Request $request)
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

        return redirect('/schools');
    }
}
