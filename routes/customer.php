<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;

use App\Imports\CodeImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\VoucherController;

Route::get('/', HomeComponent::class);

Route::get('vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');
Route::post('vouchers/{voucher}/exchange', [VoucherController::class, 'exchange'])->name('vouchers.exchange');

Route::get('ftp', function () {
    return Excel::toCollection(new CodeImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
});