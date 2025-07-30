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
    
    public function Appointmentbooking(Request $request)
{

    $validated = $request->validate([
        'patient_id' => 'required',
        'appointment_type' => 'required',
        'appointment_date' => 'required|date',
        'test_type' => 'nullable|string',
        'symptoms' => 'nullable|string',
        'vaccination_name' => 'nullable|string',
        'dose_number' => 'nullable|string',
        
    ]);

    $validated['hospital_id'] = session('hospital_id'); // ✅ Add this line

    $appointment = Appointment::create($validated); // Make sure hospital_id is fillable in model


        if ($validated['appointment_type'] === 'covid_test') {
        Covid_test::create([
            'appointment_id' => $appointment->id,
            'symptoms' =>$validated['symptoms'],
            'test_type' => $validated['test_type'],
           
        ]);
    } elseif ($validated['appointment_type'] === 'vaccination') {
       Vaccination::create([
            'appointment_id' => $appointment->id,
            'vaccination_name' => $validated['vaccination_name'],
            'dose_number' => $validated['dose_number'],
           
           
        ]);
        
    }

    return redirect()->back()->with('success', 'Appointment booked successfully!');
}

public function showTableAppointments(){
    return view('hospitals.pendingappointments');
}

public function showPendingAppointments(){
$hospital = session('hospital_id');

$pendingAppointments = Appointment::with('patient')
->where('hospital_id',$hospital)
->where('status','pending')
->get();

return view('hospitals.pendingappointments',compact('pendingAppointments'));
}

}
