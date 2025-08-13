@extends('hospitals.headfootside')

@section('hospitalcontent')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Patient Results of Vaccinations</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark">
                            <thead>
                                <tr>
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <th scope="col">Id</th>
                                    <th scope="col">Patient_Id</th>
                                    <th scope="col">Patient_Name</th>
                                    <th scope="col">Hospital_Name</th>
                                    <th scope="col">Appointment_Id</th>
                                    <th scope="col">Appointment_Date</th>
                                    <th scope="col">Vaccine_Name</th>
                                    <th scope="col">dose_number</th>
                                    <th scope="col">Test_Result</th>
                                    <th scope="col">Test_Result_Date</th>
                                    <th scope="col">Status</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($fetchVnResult as $VnResult)
                                    <tr>
                                        <td>{{ $VnResult->id }}</td>
                                        <td>{{ $VnResult->patient_id }}</td>
                                        <td>{{ $VnResult->patient_name }}</td>
                                        <td>{{ $VnResult->hospital_name}}</td>
                                        <td>{{ $VnResult->appointment_id }}</td>
                                        <td>{{ $VnResult->appointment_date }}</td>
                                        <td>{{ $VnResult->vaccination_name }}</td>
                                        <td>{{ $VnResult->dose_number }}</td>
                                        <td>{{ $VnResult->vaccination_result}}</td>
                                        <td>{{ $VnResult->vaccination_result_date}}</td>
                                        <td>{{ $VnResult->status }}</td>

                                    </tr>
                                @endforeach







                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


            {{-- Approved Appointments for Covid-test --}}

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Patient Results of Covid Test</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Patient_Id</th>
                                    <th scope="col">Patient_Name</th>
                                    <th scope="col">Hospital_Name</th>
                                    <th scope="col">Appointment_Id</th>
                                    <th scope="col">Appoitment_Date</th>
                                    <th scope="col">Test_Type</th>
                                    <th scope="col">Symptoms</th>
                                    <th scope="col">Test_Result</th>
                                    <th scope="col">Test_Result_Date</th>
                                    <th scope="col">Status</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($fetchCtResult as $CtResult)
                                    <tr>
                                        <td>{{ $CtResult->id }}</td>
                                        <td>{{ $CtResult->patient_id }}</td>
                                        <td>{{ $CtResult->patient_name }}</td>
                                        <td>{{ $CtResult->hospital_name }}</td>
                                        <td>{{ $CtResult->appointment_id }}</td>
                                        <td>{{ $CtResult->appointment_date }}</td>
                                        <td>{{ $CtResult->test_type }}</td>
                                        <td>{{ $CtResult->symptoms }}</td>
                                        <td>{{ $CtResult->test_result }}</td>
                                        <td>{{ $CtResult->test_result_date }}</td>
                                        <td>{{ $CtResult->status }}</td>
                                        

                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




  


    






    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
@endsection
