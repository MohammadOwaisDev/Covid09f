<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
  
    public function hospitalreg(Request $req){
        $hospital = new Hospital();
        $hospital->Hname = $req->name;
        $hospital->Hemail = $req->email;
        $hospital->Hpassword = Hash::make($req->password);
        $hospital->Haddress = $req->address;
        $hospital->save();
        return redirect('/hlog');

    }

    public function hospitalogin(Request $req){

        $hospital = DB::select("SELECT * FROM `hospitals` WHERE Hemail =?",[$req->email]);

  if($hospital){

    if(Hash::check($req->password,$hospital[0]->Hpassword)){
        return redirect('/hdash');
    }
  else{
    echo "inncorrect passowrd";
  }

    }
    else{
        echo "inncorrect email";
    }
}

public function fetchapproved(){
  $fetchbookings = Approve::all();
  return view('hospitals.approvedpatient',compact('fetchbookings'));
}



public function patientedit($id){
  $Update = Approve::find($id);
  $Update->update();
  return view('hospitals.update', compact('Update'));
}
public function patientupdate($id, Request $req){
  $Update = Approve::find($id);
  $Update->Name = $req->name;
  $Update->Test = $req->test;
  $Update->Date = $req->date;
  $Update->Status = $req->status;

  
  $Update->save();
  return redirect()->back();
}
}
