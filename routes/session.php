<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('login/session', [LoginController::class, 'index'])->name('login.session');

Route::post('session', [LoginController::class, 'session'])->name('session');

Route::post('logout/session', [LoginController::class, 'logout'])->name('logout.session');