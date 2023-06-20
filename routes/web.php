<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataController;


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


Route::get('data', [DataController::class, 'index'])->name('data.index');
Route::post('data/store', [DataController::class, 'store'])->name('data.store');
Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');
Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');

Route::get('/data/create', [DataController::class, 'create'])->name('data.create');

require __DIR__.'/auth.php';
