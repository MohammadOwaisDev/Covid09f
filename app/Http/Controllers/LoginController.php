<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // public function login(Request $request){
    //     $credentials = $request->only('email','password');
    
    //     if(Auth::attempt($credentials)){
    //         $user = Auth::user();
    
    //         if($user->role == 'patient'){
    //             return redirect('/patient/index');
    //         } elseif($user->role == 'admin'){
    //             return redirect('/admin/index');
    //         } elseif($user->role == 'hospital'){
    //             return redirect('/hospital/index');
    //         }
    //     }
    
    //     return redirect()->back()->withErrors([
    //         'email' => 'Invalid credentials.',
    //     ]);
    // }



    public function login(Request $req){

        $patient = DB::select("SELECT * FROM `patientregs` WHERE Pemail =?",[$req->email]);

  if($patient){

    if(Hash::check($req->password,$patient[0]->Ppassword)){
        return redirect('/pdash');
    }
  else{
    echo "inncorrect passowrd";
  }

    }
    else{
        echo "inncorrect email";
    }
}
    
}
