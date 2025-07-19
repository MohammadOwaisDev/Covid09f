<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function HospitalManage(){
        return view('admin.Hospitals');
    }
    public function AddHospital(Request $req){

        $req->validate()([
            'image'=>'required',
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required|min:8',
            'address'=>'required',
            
        ]);

        $user = User::create([
            
            'name'=> $req->name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password),
            'role'=> 'hospital'
        ]);

        $imageName = null;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('admindash/img'),$imageName);
        }

        Hospital::create([
            'user_id'=> $user->id,
            'image'=>$imageName,
            'name'=> $req->name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password),
            'address'=> $req->address
        ]);

        return redirect()->back()->with('success','Hospital Added Successfully');

        // $hospital = new Hospital();
        // $hospital->name = $req->name;
        // $hospital->email = $req->email;
        // $hospital->password = $req->password;
        // $hospital->address = $req->address;
  


    }
}


?>