<?php

namespace App\Http\Controllers;

use App\Models\CharacterClass;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = CharacterClass::all();
        return view('sections.admin.classes', [
            'classes' => $classes
        ]);
    }
}
