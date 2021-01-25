<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodeExchanged;
use Illuminate\Support\Carbon;
use App\Models\VoucherTrack;

class VoucherController extends Controller
{
    public function show(Voucher $voucher){

        /* return $voucher->contador; */

        /* return $voucher->codes()->where('customer_id', null)->count(); */

        VoucherTrack::create([
            'id_cliente'    => session('customer')->id_cliente,
            'rut'           =>  session('customer')->rut,
            'accion'        => 'OPEN',
            'modulo'        => 'BENEFICIOS',
            'fecha_track'   => Carbon::now()->format('d-m-Y')
        ]);

        return view('vouchers.show', compact('voucher'));
    }

    public function exchange(Voucher $voucher){
        // return $this->customers->contains(session('customer')->id);

        foreach ($voucher->codes as $code) {
            if(!$code->customer_id){
                $code->update([
                    'customer_id' => session('customer')->id
                ]);

                VoucherTrack::create([
                    'id_cliente'    => session('customer')->id_cliente,
                    'rut'           =>  session('customer')->rut,
                    'accion'        => 'OPEN',
                    'modulo'        => 'CUPON',
                    'observacion'   => 'CANJE DE CUPON',
                    'fecha_track'   => Carbon::now()->format('d-m-Y')
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
