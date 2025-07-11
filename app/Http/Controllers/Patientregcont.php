<?php

namespace App\Http\Controllers;

use App\Models\patientreg;
use Illuminate\Http\Request;
use App\Models\appoitmentbook;
use Illuminate\Support\Facades\Hash;

class Patientregcont extends Controller
{

public function index(){
  return view('patient.index');
}


   

  // public function patientedit($id){
  //   $patient = patientreg::find($id);
  //   return view('patient.patientedit', compact('patient'));
  // }
  // public function patientupdate($id, Request $req){
  //   $patientupdate = patientreg::find($id);
  //   $patientupdate->Pname = $req->name;
  //   $patientupdate->Pemail = $req->email;
  //   $patientupdate->Pphone = $req->contact;
  //   $patientupdate->Ppassword = $req->password;
  //   $patientupdate->Paddress = $req->address;
  //   $patientupdate->Pnic = $req->nic;
  //   $patientupdate->Pgender = $req->gender;
  //   $patientupdate->save();
  //   return redirect()->back();
  // }

  
  
}
