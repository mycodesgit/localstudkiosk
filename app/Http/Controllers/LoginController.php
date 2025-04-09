<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function loginkioskstud()
    {
        return view('loginkiosk');
    }

    public function studkiosk_login(Request $request)
    {
        $request->validate([
            'email' => 'required_without:studid|email',
            'studid' => 'required_without:email',
        ]);

        $validatedStudent = auth()->guard('kioskstudent')->attempt([
            'studid' => $request->studid,
            'password' => $request->password,
        ]);
        
        if($validatedStudent) {
            return redirect()->route('kioskhome')->with('success', 'You have successfully logged in.');
        } 
        else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
}
