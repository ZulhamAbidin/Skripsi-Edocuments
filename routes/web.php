<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PencakerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::prefix('dashboard')->group(function () {
//     Route::resource('data', DataController::class);
// });


Route::get('data', [DataController::class, 'index'])->name('data.index')->middleware('Verifikasi');;
Route::post('data/store', [DataController::class, 'store'])->name('data.store');
Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');
Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');

Route::get('/data/create', [DataController::class, 'create'])->name('data.create');


// routes/web.php


// routes/web.php

// Route::group(['middleware' => 'auth'], function () {
//     Route::prefix('pencaker')->name('pencaker.')->group(function () {
//         Route::get('/', [PencakerController::class, 'index'])->name('index');
//     });
// });


Route::group(['middleware' => 'auth'], function () {
    Route::get('/pencaker', [PencakerController::class, 'index'])->name('pencaker.index');
    Route::get('/pencaker/create', [PencakerController::class, 'create'])->name('pencaker.create');
    Route::post('/pencaker', [PencakerController::class, 'store'])->name('pencaker.store');
    Route::get('/pencaker/{id}', [PencakerController::class, 'show'])->name('pencaker.show');
    Route::get('/pencaker/{id}/edit', [PencakerController::class, 'edit'])->name('pencaker.edit');
    Route::put('/pencaker/{id}', [PencakerController::class, 'update'])->name('pencaker.update');
    Route::delete('/pencaker/{id}', [PencakerController::class, 'destroy'])->name('pencaker.destroy');
});



require __DIR__.'/auth.php';
