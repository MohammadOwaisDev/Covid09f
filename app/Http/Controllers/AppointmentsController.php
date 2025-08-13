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
use Barryvdh\DomPDF\Facade\Pdf;
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

    

    $appointment = Appointment::create($validated); // Make sure hospital_id is fillable in model


        if ($validated['appointment_type'] === 'covid_test') {
        Covid_test::create([
            'patient_id' => $appointment->patient_id,
            'appointment_id' => $appointment->id,
         'appointment_date' => $validated['appointment_date'] = date('Y-m-d', strtotime($validated['appointment_date'])),
            'hospital_id' =>$validated['hospital_id'],
            'symptoms' =>$validated['symptoms'],
            'test_type' => $validated['test_type'],
           
        ]);
    } elseif ($validated['appointment_type'] === 'vaccination') {
       Vaccination::create([
            'patient_id' => $appointment->patient_id,
            'appointment_id' => $appointment->id,
                   'appointment_date' => $validated['appointment_date'] = date('Y-m-d', strtotime($validated['appointment_date'])),

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


//        public function editCT($id) {
//     $editct = DB::table('approve_c_t_s')
//         // Join patients using patient_id = patients.user_id
//         ->join('patients', 'approve_c_t_s.patient_id', '=', 'patients.user_id')
        
//         // Join users table to get patient name
//         ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')

//         // Join hospitals using hospital_id = hospitals.user_id
//         ->join('hospitals', 'approve_c_t_s.hospital_id', '=', 'hospitals.user_id')
        
//         // Join users table to get hospital name
//         ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')

//         ->select(
//             'approve_c_t_s.*',
//             'patient_users.name as patient_name',
//             'hospital_users.name as hospital_name'
//         )
//         ->where('approve_c_t_s.id', $id)
//         ->first();

//     return response()->json($editct);
// }

//         public function editVN($id){
//         $editvn = DB::table('approve_v_n_s')
//         ->join('patients', 'approve_v_n_s.patient_id', '=', 'patients.id')
//         ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
//         ->join('hospitals', 'approve_v_n_s.hospital_id', '=', 'hospitals.id')
//         ->join('users as hospital_users', 'hospitals.user_id','=','hospital_users.id')
//         ->select(
//             'approve_v_n_s.*',
//             'patient_users.name as patient_name',
//             'hospital_users.name as hospital_name' 
//         )
//         ->where('approve_v_n_s.id', $id)
//         ->first();

      

//         return response()->json($editvn);
//        }





public function editCT($id) {
    $editct = DB::table('approve_c_t_s')
        // Join patients (patient_id in approve_c_t_s matches patients.user_id)
        ->join('patients', 'approve_c_t_s.patient_id', '=', 'patients.user_id')

        // Join users table to get patient name
        ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')

        // Join hospitals (hospital_id in approve_c_t_s matches hospitals.user_id)
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

public function editVN($id) {
    $editvn = DB::table('approve_v_n_s')
        // Join patients (patient_id in approve_v_n_s matches patients.user_id)
        ->join('patients', 'approve_v_n_s.patient_id', '=', 'patients.user_id')

        // Join users table to get patient name
        ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')

        // Join hospitals (hospital_id in approve_v_n_s matches hospitals.user_id)
        ->join('hospitals', 'approve_v_n_s.hospital_id', '=', 'hospitals.user_id')

        // Join users table to get hospital name
        ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')

        ->select(
            'approve_v_n_s.*',
            'patient_users.name as patient_name',
            'hospital_users.name as hospital_name'
        )
        ->where('approve_v_n_s.id', $id)
        ->first();

    return response()->json($editvn);
}



// public function UpdateAppointment(Request $req,$type,$id){
//     if($type == 'covid_test'){
//     $updateappointment = ApproveCT::find($id);

//     $patientName = DB::table('patients')
//     ->join('users', 'patients.user_id', '=', 'users.id')
//     ->where('patients.id', $updateappointment->patient_id)
//     ->value('users.name');

// $hospitalName = DB::table('hospitals')
//     ->join('users', 'hospitals.user_id', '=', 'users.id')
//     ->where('hospitals.id', $updateappointment->hospital_id)
//     ->value('users.name');

// $updateappointment->patient_name = $patientName;
// $updateappointment->hospital_name = $hospitalName;

//     $updateappointment->test_result = $req->test_result;
//     $updateappointment->test_result_date = $req->test_result_date;
//     $updateappointment->status = $req->status;
//     $updateappointment->save();

//     return redirect()->back()->with('covidSuccess','CovidTest Update Successfully');
// }else{
//     $updateappointment = ApproveVN::find($id);

//     $patientName = DB::table('patients')
//     ->join('users', 'patients.user_id', '=', 'users.id')
//     ->where('patients.id', $updateappointment->patient_id)
//     ->value('users.name');

// $hospitalName = DB::table('hospitals')
//     ->join('users', 'hospitals.user_id', '=', 'users.id')
//     ->where('hospitals.id', $updateappointment->hospital_id)
//     ->value('users.name');

// $updateappointment->patient_name = $patientName;
// $updateappointment->hospital_name = $hospitalName;

//     $updateappointment->vaccination_status = $req->vaccination_status;
//     $updateappointment->status = $req->status;
//     $updateappointment->save();

//     return redirect()->back()->with('vaccineSuccess','Vaccination Update Successfully');

// }
//     }





public function UpdateAppointment(Request $req, $type, $id) {
    if ($type == 'covid_test') {
        $updateappointment = ApproveCT::find($id);

        // Joins laga ke patient_name aur hospital_name fetch karo
        $patientName = DB::table('approve_c_t_s')
            ->join('patients', 'approve_c_t_s.patient_id', '=', 'patients.user_id')
            ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
            ->where('approve_c_t_s.id', $id)
            ->value('patient_users.name');

        $hospitalName = DB::table('approve_c_t_s')
            ->join('hospitals', 'approve_c_t_s.hospital_id', '=', 'hospitals.user_id')
            ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')
            ->where('approve_c_t_s.id', $id)
            ->value('hospital_users.name');

        $updateappointment->patient_name = $patientName;
        $updateappointment->hospital_name = $hospitalName;

        $updateappointment->test_result = $req->test_result;
        $updateappointment->test_result_date = date(strtotime($req->test_result_date));
        $updateappointment->status = $req->status;

        $updateappointment->save();

        return redirect()->back()->with('covidSuccess', 'CovidTest Update Successfully');
    } else {
        $updateappointment = ApproveVN::find($id);

        // Joins laga ke patient_name aur hospital_name fetch karo
        $patientName = DB::table('approve_v_n_s')
            ->join('patients', 'approve_v_n_s.patient_id', '=', 'patients.user_id')
            ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
            ->where('approve_v_n_s.id', $id)
            ->value('patient_users.name');

        $hospitalName = DB::table('approve_v_n_s')
            ->join('hospitals', 'approve_v_n_s.hospital_id', '=', 'hospitals.user_id')
            ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')
            ->where('approve_v_n_s.id', $id)
            ->value('hospital_users.name');

        $updateappointment->patient_name = $patientName;
        $updateappointment->hospital_name = $hospitalName;

        $updateappointment->vaccination_result = $req->vaccination_result;
        $updateappointment->vaccination_result_date = date('Y-m-d', strtotime($req->vaccination_result_date));
        $updateappointment->status = $req->status;

        $updateappointment->save();

        return redirect()->back()->with('vaccineSuccess', 'Vaccination Update Successfully');
    }
}


 public function Result(){
            $hospitalid = session('hospital_id');
           
            $fetchCtResult = ApproveCT::where('hospital_id',$hospitalid)->get();

             $fetchVnResult = ApproveVN::where('hospital_id',$hospitalid)->get();
          
            
            return view('hospitals.PatientResults',compact('fetchCtResult','fetchVnResult'));
        }



        public function ResultsForPatients(){
          
           
            $MyCtResult = ApproveCT::where('patient_id', auth()->id())->get();

             $MyVnResult = ApproveVN::where('patient_id', auth()->id())->get();
          
            
            return view('patient.report',compact('MyCtResult','MyVnResult'));
        }

        public function DownloadCovidTestReport($id){
            $testReport = ApproveCT::find($id);
         $testReport = DB::table('approve_c_t_s')
    ->join('patients', 'approve_c_t_s.patient_id', '=', 'patients.user_id')
    ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
    ->join('hospitals', 'approve_c_t_s.hospital_id', '=', 'hospitals.user_id')
    ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')
    ->select(
        'approve_c_t_s.*',
        'patient_users.name as patient_name',
        'hospital_users.name as hospital_name',
        'hospitals.address as hospital_address'
    )
    ->where('approve_c_t_s.id', $id)
    ->first();
   
   
            $pdf = Pdf::loadview('Patient.PDF.CovidTestPdf',compact('testReport'));
            return $pdf->download('MyCovidTestReport'.'.pdf');
        }

         public function DownloadVaccinationReport($id){
            $vaccineReport = ApproveVN::find($id);
         $vaccineReport = DB::table('approve_v_n_s')
    ->join('patients', 'approve_v_n_s.patient_id', '=', 'patients.user_id')
    ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
    ->join('hospitals', 'approve_v_n_s.hospital_id', '=', 'hospitals.user_id')
    ->join('users as hospital_users', 'hospitals.user_id', '=', 'hospital_users.id')
    ->select(
        'approve_v_n_s.*',
        'patient_users.name as patient_name',
        'hospital_users.name as hospital_name',
        'hospitals.address as hospital_address'
    )
    ->where('approve_v_n_s.id', $id)
    ->first();
   

            $pdf = Pdf::loadview('Patient.PDF.VaccinationPdf',compact('vaccineReport'));
            return $pdf->download('MyVaccinationReport'.'.pdf');
        }


}


