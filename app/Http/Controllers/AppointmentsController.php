<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\ApproveCT;
use App\Models\ApproveVN;
use App\Models\Covid_test;
use App\Models\Appointment;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use App\Models\Appointmentbook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppointmentsController extends Controller
{
    
    public function Appointmentbooking(Request $request)
{
 

    $validated = $request->validate([
        'patient_id' => 'required',
        'hospital_id' => 'required',
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
            'hospital_id' =>$validated['hospital_id'],
            'symptoms' =>$validated['symptoms'],
            'test_type' => $validated['test_type'],
           
        ]);
    } elseif ($validated['appointment_type'] === 'vaccination') {
       Vaccination::create([
            'appointment_id' => $appointment->id,
            'hospital_id' =>$validated['hospital_id'],
            'vaccination_name' => $validated['vaccination_name'],
            'dose_number' => $validated['dose_number'],
           
           
        ]);

        
        
    }

    return redirect()->back()->with('success', 'Appointment booked successfully!');
}



public function showPendingAppointments() {

$hospitalid = session('hospital_id');
    $appointments = Appointment::with(['testDetails', 'vaccineDetails'])
        ->where('hospital_id', $hospitalid)
        ->where(function ($query) {
            $query->whereHas('testDetails', function ($q){
                $q->where('status', 'pending');
                  
            })
            ->orWhereHas('vaccineDetails', function ($q) {
                $q->where('status', 'pending');
                  
            });
        })
        ->get();

    return view('hospitals.pendingappointments', compact('appointments'));
}




public function approveCovidtest($id) {
            // Find the appointment to approve
            $approveCovidTest = Covid_test::find($id);
    
            // Move the appointment data to the approved appointments table
            ApproveCT::create([
                'patient_id' => $approveCovidTest->appointment->patient_id,
                'hospital_id' => $approveCovidTest->hospital_id,
                'appointment_id' => $approveCovidTest->appointment->id,
                'appointment_date' => $approveCovidTest->appointment->appointment_date,
                'test_type' => $approveCovidTest->test_type,
                'symptoms' => $approveCovidTest->symptoms,
                'status' => $approveCovidTest->appointment->status,
                
            ]);
    
            // Delete the appointment from the original table
            $approveCovidTest->delete();
    
            return redirect()->back()->with('success', 'Appointment approved.');
        }
    
        public function reject($id) {
            // Find and delete the appointment
            $test = Covid_test::find($id);
            if($test){
            $test->delete();
           }
    
            return redirect()->back()->with('success', 'Appointment rejected.');
        }





        public function approveVaccination($id) {
            // Find the appointment to approve
            $approveVaccine = Vaccination::find($id);
    
            // Move the appointment data to the approved appointments table
            ApproveVN::create([
                'patient_id' => $approveVaccine->appointment->patient_id,
                'hospital_id' => $approveVaccine->hospital_id,
                'appointment_id' => $approveVaccine->appointment->id,
                'appointment_date' => $approveVaccine->appointment->appointment_date,
                'vaccination_name' => $approveVaccine->vaccination_name,
                'dose_number' => $approveVaccine->dose_number,
                'status' => $approveVaccine->appointment->status,
                
            ]);
    
            // Delete the appointment from the original table
            $approveVaccine->delete();
    
            return redirect()->back()->with('success', 'Appointment approved.');
        }
    
        public function rejectVaccine($id) {
            // Find and delete the appointment
            $vaccine = Covid_test::find($id);
           if($vaccine){
            $vaccine->delete();
           }
    
            return redirect()->back()->with('success', 'Appointment rejected.');
        }

        public function fetchApproveAppointment(){
            $hospitalid = session('hospital_id');
           
            $fetchCt = ApproveCT::where('hospital_id',$hospitalid)->get();

             $fetchVn = ApproveVN::where('hospital_id',$hospitalid)->get();
          
            
            return view('hospitals.ApproveAppointments',compact('fetchCt','fetchVn'));
        }


       public function editCT($id) {
    $editct = DB::table('approve_c_t_s')
        // Join patients using patient_id = patients.user_id
        ->join('patients', 'approve_c_t_s.patient_id', '=', 'patients.user_id')
        
        // Join users table to get patient name
        ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')

        // Join hospitals using hospital_id = hospitals.user_id
        ->join('hospitals', 'approve_c_t_s.hospital_id', '=', 'hospitals.user_id')
        
        // Join users table to get hospital name
        ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')

        ->select(
            'approve_c_t_s.*',
            'patient_users.name as patient_name',
            'hospital_users.name as hospital_name'
        )
        ->where('approve_c_t_s.id', $id)
        ->first();

    return response()->json($editct);
}

        public function editVN($id){
        $editvn = DB::table('approve_v_n_s')
        ->join('patients', 'approve_v_n_s.patient_id', '=', 'patients.id')
        ->join('users as patient_user', 'patients.user_id', '=', 'patient_user.id')
        ->join('hospitals', 'approve_v_n_s.hospital_id', '=', 'hospitals.id')
        ->join('users as hospital_user', 'hospitals.user_id','=','hospital_user.id')
        ->select(
            'approve_v_n_s.*',
            'patient_user.name as patient_name',
            'hospital_user.name as hospital_name' 
        )
        ->where('approve_v_n_s.id', $id)
        ->first();

      

        return response()->json($editvn);
       }
}
