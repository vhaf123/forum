<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodeExchanged;

class VoucherController extends Controller
{
    public function show(Voucher $voucher){

        /* return $voucher->contador; */

        /* return $voucher->codes()->where('customer_id', null)->count(); */

        return view('vouchers.show', compact('voucher'));
    }

    public function exchange(Voucher $voucher){
        // return $this->customers->contains(session('customer')->id);

        foreach ($voucher->codes as $code) {
            if(!$code->customer_id){
                $code->update([
                    'customer_id' => session('customer')->id
                ]);

                $mail = new CodeExchanged($code);
                Mail::to(session('customer')->email)->send($mail);

                return redirect()->route('vouchers.show', $voucher)->with('info', 'El código se envío a su correo electrónico');

            }elseif ($code->customer_id == session('customer')->id) {
                $mail = new CodeExchanged($code);
                Mail::to(session('customer')->email)->send($mail);

                return redirect()->route('vouchers.show', $voucher)->with('info', 'El código se envío a su correo electrónico');
            }
            
        }

    }
}
