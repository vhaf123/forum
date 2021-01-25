<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('session', [LoginController::class, 'session'])->name('session');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');