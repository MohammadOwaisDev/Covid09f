@extends('patient.headfootside')

@section('patientcontent')
    <main id="main">

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">My Vaccination Report</h6>
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
                                        <th scope="col">Patient_Id</th>
                                        <th scope="col">Patient_Name</th>
                                        <th scope="col">Hospital_Name</th>
                                        <th scope="col">Appointment_Id</th>
                                        <th scope="col">Appointment_Date</th>
                                        <th scope="col">Vaccine_Name</th>
                                        <th scope="col">dose_number</th>
                                        <th scope="col">Vaccination_Result</th>
                                        <th scope="col">Vaccination_Result_Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($MyVnResult as $fetchVnResult)
                                        <tr>
                                           
                                            <td>{{ $fetchVnResult->patient_id }}</td>
                                            <td>{{ $fetchVnResult->patient_name }}</td>
                                            <td>{{ $fetchVnResult->hospital_name }}</td>
                                            <td>{{ $fetchVnResult->appointment_id }}</td>
                                            <td>{{ $fetchVnResult->appointment_date }}</td>
                                            <td>{{ $fetchVnResult->vaccination_name }}</td>
                                            <td>{{ $fetchVnResult->dose_number }}</td>
                                            <td>{{ $fetchVnResult->vaccination_result }}</td>
                                            <td>{{ $fetchVnResult->vaccination_result_date }}</td>
                                            <td>{{ $fetchVnResult->status }}</td>
                                            <td>
                                                <a href="{{route('download.vaccination', $fetchVnResult->id)}}" class="btn btn-success">Download Report</button>
                                            </td>
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
                        <h6 class="mb-4">My CovidTest Report</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                     
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
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($MyCtResult as $fetchCtResult)
                                        <tr>
                                            
                                            <td>{{ $fetchCtResult->patient_id }}</td>
                                            <td>{{ $fetchCtResult->patient_name }}</td>
                                            <td>{{ $fetchCtResult->hospital_name }}</td>
                                            <td>{{ $fetchCtResult->appointment_id }}</td>
                                            <td>{{ $fetchCtResult->appointment_date }}</td>
                                            <td>{{ $fetchCtResult->test_type }}</td>
                                            <td>{{ $fetchCtResult->symptoms }}</td>
                                            <td>{{ $fetchCtResult->test_result }}</td>
                                            <td>{{ $fetchCtResult->test_result_date }}</td>
                                            <td>{{ $fetchCtResult->status }}</td>
                                            <td>
                                               <a href="{{route('download.covidtest', $fetchCtResult->id)}}" class="btn btn-success">Download Report</button>

                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
