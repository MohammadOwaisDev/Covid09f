<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 public function PatientReg(Request $req){

    $user = new User();
    $user->name = $req->name;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->role = 'patient';
    $user->save();


    $patient = new Patient();
    $patient->name = $req->name;
    $patient->email = $req->email;
    $patient->password = Hash::make($req->password);
    $patient->phone = $req->contact;
    $patient->age = $req->age;
    $patient->cnic = $req->nic;
    $patient->address = $req->Address;
    $patient->gender = $req->gender;
     $patient->user_id = $user->id;
    $patient->save();

    return redirect('/loginform');


   

 }


 public function adashview(){
    return view('admin.index');
 }

    public function Login(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required|min:8'
        ]);

        $user = User::where('email', $req->email)->first();
        if($user && $user->role === 'admin' && Hash::check($req->password,$user->password)){
            Auth::login($user);

            return redirect('/adash');


        }if($user && $user->role === 'hospital' && Hash::check($req->password,$user->password)){
            Auth::login($user);

            return redirect('/hdash');

        }if($user && $user->role === 'patient' && Hash::check($req->password,$user->password)){
            Auth::login($user);

            return redirect('/pdash');
        }else{
            return redirect('/loginform');
        }
        
        
    }       
}
