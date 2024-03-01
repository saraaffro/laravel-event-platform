<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\TagController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
}) -> middleware(['auth', 'verified']) -> name('dashboard');

Route::middleware('auth') -> group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']) -> name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update']) -> name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy']) -> name('profile.destroy');

    // CREATE
    Route::get('/events/create', [EventController :: class, 'create'])
    -> name('event.create');

    // STORE
    Route::post('/events/create', [EventController :: class, 'store'])
        -> name('event.store');

    // EDIT
    Route::get('/events/{id}/edit', [EventController :: class, 'edit'])
        -> name('event.edit');

    // UPDATE
    Route::put('/events/{id}/update', [EventController :: class, 'update'])
        -> name('event.update');

    // DELETE
    Route::delete('/events/{id}', [EventController :: class, 'destroy'])
        -> name('event.delete');
});

// INDEX
Route::get('/events', [EventController :: class, 'index'])
    -> name('event.index');

// SHOW
Route::get('/events/{id}', [EventController :: class, 'show'])
    -> name('event.show');


Route::get('/tags', [TagController::class, 'index'])
    ->name ('tag.index');




require __DIR__.'/auth.php';
