<?php

namespace App\Http\Controllers;

use App\Models\Covid_test;
use App\Models\Appointment;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use App\Models\Appointmentbook;
use Illuminate\Support\Facades\Validator;

class AppointmentsController extends Controller
{
    public function Appointmentbooking(Request $req){

        $validate = $req->validate([
            'patient_id'=> 'required',
            'hospital_id' => 'required',
            'appointment_type' => 'required|in:covid_test,vaccination',
            'appointment_date' => 'required|date',
          
            // covid_test fields validation
            'symptoms' => 'required_if:appointment_type,covid_test',
            'test_type' => 'required_if:appointment_type,covid_test',
            
            // Vaccination fields validation
            'vaccination_name' => 'required_if:appointment_type,vaccination',
            'dose_number' => 'required_if:appointment_type,vaccination',
            
            

            
        ]);

         $appointment =  Appointment::create([
            'patient_id' => $validate['patient_id'],
            'hospital_id' => $validate['hospital_id'],
            'appointment_type' => $validate['appointment_type'],
            'appointment_date' => $validate['appointment_date'],
            'status' => 'pending',
        ]);

        

       // Step 3: Based on appointment_type, insert into covid_test OR vaccination table
    if ($validate['appointment_type'] === 'covid_test') {
        Covid_test::create([
            'appointment_id' => $appointment->id,
            'symptoms' => $validate['symptoms'],
            'test_type' => $validate['test_type'],
           
        ]);
    } elseif ($validate['appointment_type'] === 'vaccination') {
       Vaccination::create([
            'appointment_id' => $appointment->id,
            'vaccine_name' => $validate['vaccination_name'],
            'dose_number' => $validate['dose_number'],
           
            
        ]);
    }
     dd($req->all()); 
    return redirect()->back()->with('success', 'Appointment booked!');
    }
}
