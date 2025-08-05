<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function PatientReg(Request $req)
    {

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








    public function Login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $req->email)->first();

        if ($user && Hash::check($req->password, $user->password)) {
            Auth::login($user);



            if ($user->role === 'admin') {
                return redirect('/adash');
            } elseif ($user->role === 'hospital') {
                session(['hospital_id' => $user->id]);
                return redirect('/hdash');
            } elseif ($user->role === 'patient') {
                return redirect('/index');
            }
        }



        return redirect('/loginform')->with('error', 'Invalid credentials');
    }






    // All Dashboard View Routes
    public function AdminDash()
    {

        return view('admin.index');
    }

    public function HospitalDash()
    {
        return view('hospitals.index');
    }

    public function PatientDash()
    {
        return view('patient.index');
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
