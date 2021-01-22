<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

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

            return redirect('/');
        }

        return back()->with('info', 'RUT no registrado en la bbdd');
        
    }
}
