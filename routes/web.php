<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/prodi', [ProdiController::class, 'index'])->name('/prodi');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi/create');
    Route::post('/prodi/save', [ProdiController::class, 'save'])->name('prodi/save');
    Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi/edit');
    Route::put('/prodi/edit/{id}', [ProdiController::class, 'update'])->name('prodi/update');
    Route::delete('/prodi/delete/{id}', [ProdiController::class, 'delete'])->name('prodi/delete');
    //MAHASISWA
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('/mahasiswa');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa/create');
    Route::post('/mahasiswa/save', [MahasiswaController::class, 'save'])->name('mahasiswa/save');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa/edit');
    Route::put('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa/update');
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa/delete');
});

require __DIR__.'/auth.php';
