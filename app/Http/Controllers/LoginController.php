<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\VoucherTrack;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function session(Request $request){

        if(Customer::where('rut', $request->rut)->count()){
            $customer = Customer::where('rut', $request->rut)->first();
            /* return $customer; */

            session(['customer' => $customer]);

            VoucherTrack::create([
                'id_cliente'    => $customer->id_cliente,
                'rut'           =>  $customer->rut,
                'accion'        => 'OPEN',
                'modulo'        => 'INICIO_SESION',
                'fecha_track'   => Carbon::now()->format('d-m-Y')
            ]);

            return redirect('/');
        }

        return back()->with('info', 'RUT no registrado en la bbdd');
        
    }

    public function logout(){
        session()->forget('customer');
        return redirect('/');
    }
}
