<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function show(Voucher $voucher){
        return view('vouchers.show', compact('voucher'));
    }
}
