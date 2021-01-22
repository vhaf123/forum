<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;

use App\Http\Controllers\VoucherController;

Route::get('/', HomeComponent::class);

Route::get('vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');