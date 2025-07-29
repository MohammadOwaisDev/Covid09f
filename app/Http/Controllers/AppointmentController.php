<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use Illuminate\Http\Request;
use App\Models\Appointmentbook;

class AppointmentController extends Controller
{
    public function booking(Request $req){
        $book = new Appointmentbook();
        $book->Name = $req->name;
        $book->Email = $req->email;
        $book->Birthdate = $req->dob;
        $book->Phone = $req->phone;
        $book->AppoitmentType = $req->appoitmenttype;
        $book->AppoitmentDate = $req->appdate;
        $book->AppoitmentTime = $req->apptime;
        $book->Hospital = $req->hospital;
        $book->save();
        return view('appoitmentbook');
        }

        public function fetchapp() {
            $Fetchdata = Appointmentbook::all();
            return view('admin.bookdetail', compact('Fetchdata'));
        }

        


        public function approve($id) {
            // Find the appointment to approve
            $appointment = Appointmentbook::find($id);
    
            // Move the appointment data to the approved appointments table
            Approve::create([
                'Name' => $appointment->Name,
                'Email' => $appointment->Email,
                'Birthdate' => $appointment->Birthdate,
                'Phone' => $appointment->Phone,
                'AppoitmentType' => $appointment->AppoitmentType,
                'AppoitmentDate' => $appointment->AppoitmentDate,
                'AppoitmentTime' => $appointment->AppoitmentTime,
                'Hospital' => $appointment->Hospital,
            ]);
    
            // Delete the appointment from the original table
            $appointment->delete();
    
            return redirect()->back()->with('success', 'Appointment approved.');
        }
    
        public function reject($id) {
            // Find and delete the appointment
            $appointment = Appointmentbook::find($id);
            $appointment->delete();
    
            return redirect()->back()->with('success', 'Appointment rejected.');
        }
}
