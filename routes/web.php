<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MonstersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacesController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\SpellsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('characters', [CharactersController::class, 'index'])->name('characters');
    
    Route::get('races', [RacesController::class, 'index'])->name('races');
    Route::post('race', [RacesController::class, 'create']);
    
    Route::get('classes', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('classes/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('classes/{id}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('classes/{id}', [ClassesController::class, 'update'])->name('classes.update');
    Route::delete('classes/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');
    
    Route::get('schools', [SchoolsController::class, 'index'])->name('schools.index');
    Route::get('schools/create', [SchoolsController::class, 'create'])->name('schools.create');
    Route::post('schools', [SchoolsController::class, 'store'])->name('schools.store');
    Route::get('schools/{id}/edit', [SchoolsController::class, 'edit'])->name('schools.edit');
    Route::post('schools/{id}', [SchoolsController::class, 'update'])->name('schools.update');
    
    Route::get('spells', [SpellsController::class, 'index'])->name('spells.index');
    Route::get('spells/create', [SpellsController::class, 'create'])->name('spells.create');
    Route::post('spells', [SpellsController::class, 'store'])->name('spells.store');
    Route::get('spells/{id}/edit', [SpellsController::class, 'edit'])->name('spells.edit');
    Route::post('spells/{id}', [SpellsController::class, 'update'])->name('spells.update');
    
    Route::get('monsters', [MonstersController::class, 'index'])->name('monsters.index');
    Route::get('monsters/create', [MonstersController::class, 'create'])->name('monsters.create');
    Route::post('monsters', [MonstersController::class, 'store'])->name('monsters.store');
    Route::get('monsters/{id}/edit', [MonstersController::class, 'edit'])->name('monsters.edit');
    Route::post('monsters/{id}', [MonstersController::class, 'update'])->name('monsters.update');
    Route::post('monsters/{id}/destroy', [MonstersController::class, 'destroy'])->name('monsters.destroy');
});
