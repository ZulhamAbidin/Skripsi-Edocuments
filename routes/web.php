<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PencakerController;
use App\Http\Controllers\VerifikasiController;

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

//RENDERING DATA TERVERIFIKASI
Route::get('data', [DataController::class, 'index'])->name('data.index')->middleware('Verifikasi');
Route::post('data/store', [DataController::class, 'store'])->name('data.store');
Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');
Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');


//RENDERING DATA YANG TIDAK TERVERIFIKASI
Route::get('data/verifikasi', [VerifikasiController::class, 'index'])->name('data.verifikasi.index')->middleware('Verifikasi');
Route::post('data/verifikasi/store', [VerifikasiController::class, 'store'])->name('data.verifikasi.store');
Route::get('data/verifikasi/{id}/edit', [VerifikasiController::class, 'edit'])->name('data.verifikasi.edit');
Route::put('data/verifikasi/{id}', [VerifikasiController::class, 'update'])->name('data.verifikasi.update');


Route::delete('data/verifikasi/{id}', [VerifikasiController::class, 'destroy'])->name('data.verifikasi.destroy');
Route::get('/data/verifikasi/create', [VerifikasiController::class, 'create'])->name('data.verifikasi.create');

Route::put('/data/verifikasi/{id}', [VerifikasiController::class, 'verifikasi'])->name('data.verifikasi.verifikasi');




//HALAMAN PESERTA PENGESAHAN
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pencaker', [PencakerController::class, 'index'])->name('pencaker.index');
    Route::get('/pencaker/create', [PencakerController::class, 'create'])->name('pencaker.create');
    Route::post('/pencaker', [PencakerController::class, 'store'])->name('pencaker.store');
    Route::get('/pencaker/{id}', [PencakerController::class, 'show'])->name('pencaker.show');
    Route::get('/pencaker/{id}/edit', [PencakerController::class, 'edit'])->name('pencaker.edit');
    Route::put('/pencaker/{id}', [PencakerController::class, 'update'])->name('pencaker.update');
    Route::delete('/pencaker/{id}', [PencakerController::class, 'destroy'])->name('pencaker.destroy');
});


// Route::get('/pencaker/print/{id}', [PencakerController::class, 'print'])->name('pencaker.print');
 // Route::get('/pencaker/print', 'Pencaker\PencakerController@printVerifiedData')->name('pencaker.print');
// Route::get('/pencaker/print', [PencakerController::class, 'printVerifiedData'])->name('pencaker.print');


require __DIR__.'/auth.php';
