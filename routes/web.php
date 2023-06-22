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

//RENDERING DATA TERVERIFIKASI
Route::get('data', [DataController::class, 'index'])->name('data.index')->middleware('Verifikasi');
Route::post('data/store', [DataController::class, 'store'])->name('data.store');
Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');
Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');

//RENDERING DATA YANG TIDAK TERVERIFIKASI
Route::get('/data/verifikasi', [VerifikasiController::class, 'index'])->name('data/verifikasi.index');
Route::get('/data/verifikasi/create', [VerifikasiController::class, 'create'])->name('data/verifikasi.create');
Route::post('/data/verifikasi', [VerifikasiController::class, 'store'])->name('data/verifikasi.store');
Route::get('/data/verifikasi/{data/verifikasi}/edit', [VerifikasiController::class, 'edit'])->name('data/verifikasi.edit');
Route::put('/data/verifikasi/{data/verifikasi}', [VerifikasiController::class, 'update'])->name('data/verifikasi.update');
Route::delete('/data/verifikasi/{data/verifikasi}', [VerifikasiController::class, 'destroy'])->name('data/verifikasi.destroy');
Route::get('/data/verifikasi/verify/{id}', [VerifikasiController::class, 'verify'])->name('data/verifikasi.verify');

//HALAMAN PESERTA PENGESAHAN
Route::group(['prefix' => 'data/verifikasi', 'as' => 'verifikasi.'], function () {
    Route::get('/', [VerifikasiController::class, 'index'])->name('index');
    Route::get('/verify/{id}', [VerifikasiController::class, 'verify'])->name('verify');
    Route::delete('/destroy/{data}', [VerifikasiController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
