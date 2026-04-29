<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Auth bawaan Laravel (login, register, dll)
Auth::routes();

// Halaman setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route Group Middleware Auth untuk bagian backend Admin
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

});