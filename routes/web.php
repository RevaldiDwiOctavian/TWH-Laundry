<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('superadmin', App\Http\Controllers\DataSiswaController::class)->middleware('checkRole:superadmin');

Route::get('/admin/pengguna', [AdminController::class, 'pengguna_index'])->name('admin.pengguna');

Route::get('/', [GuestController::class, 'index'])->name('guest.lihat_status');