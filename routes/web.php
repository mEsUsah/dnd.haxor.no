<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\ClassesController;
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
    Route::get('class/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('class', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('class/{id}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('class/{id}', [ClassesController::class, 'update'])->name('classes.update');
    Route::delete('class/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');
    
    Route::get('schools', [SchoolsController::class, 'index'])->name('schools');
    Route::post('school', [SchoolsController::class, 'create']);
    
    Route::get('spells', [SpellsController::class, 'index'])->name('spells');
    Route::post('spell', [SpellsController::class, 'create']);
});
