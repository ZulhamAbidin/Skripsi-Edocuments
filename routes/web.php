<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
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


Route::middleware('auth')->group(function () {
    //RENDERING DATA TERVERIFIKASI
    Route::get('data', [DataController::class, 'index'])->name('data.index')->middleware('Verifikasi');
    Route::post('data/store', [DataController::class, 'store'])->name('data.store');
    Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
    Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');
    Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
    Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
Route::get('/data/export', [DataController::class, 'export'])->name('data.export');

Route::get('/data/print', [DataController::class, 'print'])->name('data.print');


    //RENDERING DATA YANG TIDAK TERVERIFIKASI
    Route::get('/data/verifikasi', [VerifikasiController::class, 'index'])->name('data/verifikasi.index');
    Route::get('/data/verifikasi/create', [VerifikasiController::class, 'create'])->name('data/verifikasi.create');
    Route::post('/data/verifikasi', [VerifikasiController::class, 'store'])->name('data/verifikasi.store');
    Route::get('/data/verifikasi/{data/verifikasi}/edit', [VerifikasiController::class, 'edit'])->name('data/verifikasi.edit');
    Route::put('/data/verifikasi/{data/verifikasi}', [VerifikasiController::class, 'update'])->name('data/verifikasi.update');
    Route::delete('/data/verifikasi/{data/verifikasi}', [VerifikasiController::class, 'destroy'])->name('data/verifikasi.destroy');
    Route::get('/data/verifikasi/verify/{id}', [VerifikasiController::class, 'verify'])->name('data/verifikasi.verify');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{id}/view', [DocumentController::class, 'view'])->name('documents.view');
    Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('documents/{id}', [DocumentController::class, 'delete'])->name('documents.destroy');
    Route::get('/documents/{id}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{id}', [DocumentController::class, 'update'])->name('documents.update');

    //HALAMAN PESERTA PENGESAHAN
    Route::get('/data/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');
    Route::get('/data/verifikasi/verify/{id}', [VerifikasiController::class, 'verify'])->name('verifikasi.verify');
    Route::delete('/data/verifikasi/destroy/{data}', [VerifikasiController::class, 'destroy'])->name('verifikasi.destroy');

    //PENGUNJUNG
    Route::get('/pencaker', [PencakerController::class, 'index'])->name('pencaker.index');
    Route::get('/pencaker/create', [PencakerController::class, 'create'])->name('pencaker.create');
    Route::post('/pencaker', [PencakerController::class, 'store'])->name('pencaker.store');
    Route::get('/pencaker/{id}', [PencakerController::class, 'show'])->name('pencaker.show');
    Route::get('/pencaker/{id}/edit', [PencakerController::class, 'edit'])->name('pencaker.edit');
    Route::put('/pencaker/{id}', [PencakerController::class, 'update'])->name('pencaker.update');
    Route::delete('/pencaker/{id}', [PencakerController::class, 'destroy'])->name('pencaker.destroy');

});



require __DIR__.'/auth.php';
