@extends('hospitals.headfootside')

@section('hospitalcontent')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Pending Appointments of Vaccinations</h6>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
                                <th scope="col">Id</th>
                                <th scope="col">Patient_Id</th>
                                <th scope="col">Appointment_Id</th>
                                <th scope="col">Appointment_Date</th>
                                <th scope="col">Vaccine_Name</th>
                                <th scope="col">dose_number</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>

                        <tbody>

@foreach($appointments as $appointment)
@if($appointment->vaccineDetails)
                            <tr>
                                <td>{{ $appointment->vaccineDetails->id }}</td>
            <td>{{ $appointment->patient_id }}</td>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->vaccineDetails->vaccination_name }}</td>
            <td>{{ $appointment->vaccineDetails->dose_number }}</td>
            <td>{{ $appointment->status }}</td>
                                <td>
                                    <a href="" class="col-12 btn btn-success">Approve</a>
                                    <a href="" class="col-12 btn btn-danger">Reject</a>
                                </td>
                                
                            </tr>
                            @endif
                            @endforeach






                            
                        </tbody>
        
                        </table>
                            </div>
                        </div>
                    </div>


{{-- Pending Appointments for Vaccinations --}}

                    <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Pending Appointments of Covid Test</h6>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Patient_Id</th>
                                <th scope="col">Appointment_Id</th>
                                <th scope="col">Appoitment_Date</th>
                                <th scope="col">Test_Type</th>
                                <th scope="col">Symptoms</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach($appointments as $appointment)
@if($appointment->testDetails)
                            <tr>
                                <td>{{ $appointment->testDetails->id }}</td>
            <td>{{ $appointment->patient_id }}</td>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->testDetails->test_type }}</td>
            <td>{{ $appointment->testDetails->symptoms}}</td>
            <td>{{ $appointment->status }}</td>
                                <td>
                                    <a href="{{ url('/approvect/' . $appointment->testDetails->id) }}" class="col-12 btn btn-success">Approve</a>
                                    <a href="" class="col-12 btn btn-danger">Reject</a>
                                </td>
                                
                            </tr>
                            @endif
                            @endforeach
                           
                        </tbody>
        
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
           @endsection