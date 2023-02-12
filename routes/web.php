<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Models\Nomenclator;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(NoteController::class)->prefix('note')->group( function(){
    Route::get('/index', 'index')->middleware(['auth', 'verified'])->name('note-index');
    Route::get('/create', 'create')->name('note-create');
    Route::post('/regNote', 'store')->name('note-store');
    Route::get('/{noteId}', 'show')->name('note-show');
    Route::patch('/update/{id}', 'update')->name('note-update');
    Route::delete('delete/{id}', 'destroy')->name('note-destroy');
});

require __DIR__.'/auth.php';
