<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PencakerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerifikasiController;


use App\Http\Middleware\CheckWritePermission;



Route::get('/data/verifikasi/index', [VerifikasiController::class, 'index'])->name('data.verifikasi.index');
Route::delete('/data/verifikasi/{item}', [VerifikasiController::class, 'destroy'])->name('data.verifikasi.destroy');
Route::post('/data/verifikasi/reject/{id}', [VerifikasiController::class, 'reject'])->name('data.verifikasi.reject');
Route::get('/data/verifikasi/verifikasi/{id}', [VerifikasiController::class, 'verifikasi'])->name('data.verifikasi.verifikasi');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showSiswaRegistrationForm'])->name('register.siswa');
Route::post('/register', [RegisterController::class, 'registerSiswa']);

// Route::middleware('auth', 'role:guru,kepala_sekolah')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::prefix('pencaker')->group(function () {
        Route::get('/', [PencakerController::class, 'index'])->name('pencaker.index');
        Route::get('/create', [PencakerController::class, 'create'])->name('pencaker.create');
        Route::post('/', [PencakerController::class, 'store'])->name('pencaker.store');
        Route::get('/{id}/edit', [PencakerController::class, 'edit'])->name('pencaker.edit');
        Route::put('/{id}', [PencakerController::class, 'update'])->name('pencaker.update');
        Route::delete('/{id}', [PencakerController::class, 'destroy'])->name('pencaker.destroy');
    });
});


Route::get('pencaker/confirm-delete/{id}', 'PencakerController@confirmDelete')->name('pencaker.confirm-delete');


Route::middleware(['auth', 'role:guru,kepala_sekolah' ])->group(function () {
    Route::get('data', [DataController::class, 'index'])->name('data.index');
    Route::post('data/store', [DataController::class, 'store'])->name('data.store');
    Route::get('data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
    Route::put('data/{id}', [DataController::class, 'update'])->name('data.update');

    Route::delete('data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
    Route::get('/data/create', [DataController::class, 'create'])->name('data.create');

    Route::get('/data/export', [DataController::class, 'export'])->name('data.export');
    Route::get('/data/print', [DataController::class, 'print'])->name('data.print');


Route::get('/data/verifikasi/search', [VerifikasiController::class, 'search'])->name('data.verifikasi.search');

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

    
Route::get('/documents/get', [DocumentController::class, 'getDocuments'])->name('documents.get');
// Tambahkan rute lain sesuai kebutuhan

});

Route::middleware(['auth', 'role:kepala_sekolah'])->group(function () {
    Route::get('/management', [UserController::class, 'index'])->name('management.index');
    Route::delete('/management/{id}', [UserController::class, 'destroy'])->name('management.destroy');
    Route::get('/management/{id}/edit', [UserController::class, 'edit'])->name('management.edit');
    Route::put('/management/{id}', [UserController::class, 'update'])->name('management.update');
    Route::get('/export', [ExportController::class, 'index'])->name('export.index');
    Route::get('/export/data', [ExportController::class, 'getData'])->name('export.data');
    Route::get('/register/praktik-industri', [RegisterController::class, 'showGuruRegistrationForm'])->name('register.guru');
    Route::post('/register/praktik-industri', [RegisterController::class, 'registerGuru']);

    
});

require __DIR__ . '/auth.php';


// Route::get('/register/admin', [RegisterController::class, 'showKepalaSekolahRegistrationForm'])->name('register.kepala-sekolah');
// Route::post('/register/admin', [RegisterController::class, 'registerKepalaSekolah'])->name('register.kepala-sekolah.submit');