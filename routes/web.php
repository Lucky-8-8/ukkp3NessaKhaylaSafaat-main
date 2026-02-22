<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;

//TIDAK DIGUNAKAN [WELCOME]
Route::get('/', function () {
    return view('welcome');
});

//ROUTE UNTUK LOGIN, DI AUTHCONTROLLER DI ATUR LOGIN SESUAI ROLE
//JIKA ADMIN MAKA DI ARAHKAN KE DASHBOARD ADMIN
//JIKA SISWA MAKA DI ARAHKAN KE DASHBOARD SISWA

//URL UNTUK MEMBUKA HALAMAN LOGIN
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
//ROUTE UNTUK LOGIN DAN DILAKUKAN PENGECEKAN ROLE [ADMIN/SISWA]
Route::post('/login', [AuthController::class,'login']);
//ROUTE UNTUK LOGOUT ADMIN DAN SISWA
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// Redirect sesuai role

Route::prefix('admin')->group(function () {
    //URL UNTUK MEMBUKA DASHBOARD ADMIN
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    //URL UNTUK MEMBUKA HALAMAN KELOLA KATEGORI DAN CRUDYA
    Route::resource('kategori', KategoriController::class);
    //URL UNTUK MELIHAT DETAIL ASPIRASI BEDASARKAN ID ASPIRASI
    Route::get('/aspirasi/{id}', [AdminController::class, 'detailAspirasi'])->name('admin.aspirasi.detail');
    //ROUTE UNTUK MENAMBAH FEED DARI ADMIN UNTUK SISWA
    Route::post('/aspirasi/{id}/feedback', [AdminController::class, 'addFeedback'])->name('admin.aspirasi.feedback');
    //ROUTE UNTUK MENAMBAH / UPDATE PROGRESS [DIKIRIM, DIPROSES, SELESAI]
    Route::post('/aspirasi/{id}/progress', [AdminController::class, 'addProgress'])->name('admin.aspirasi.progress');
});


Route::prefix('siswa')->group(function () {
    
    //URL UNTUK MEMBUKA HALAMAN DASBOARD SISWA
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    //URL UNTUK MEMBUKA HALAMAN TAMBAH ASPIRASI BARU
    Route::get('/aspirasi/create', [SiswaController::class, 'createAspirasi'])->name('siswa.aspirasi.create');
    //ROUTE UNTUK SAVE/STORE ASPIRASI BARU
    Route::post('/aspirasi', [SiswaController::class, 'storeAspirasi'])->name('siswa.aspirasi.store');
    //URL UNTUK MEMBUKA DETAIL ASPIRASI, UNTUK MELIHAT FEEDBACK DAN PROGRESS
    Route::get('/aspirasi/{id}', [SiswaController::class, 'detailAspirasi'])->name('siswa.aspirasi.detail');
});
