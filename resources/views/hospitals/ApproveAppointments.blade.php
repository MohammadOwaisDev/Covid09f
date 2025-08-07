@extends('hospitals.headfootside')

@section('hospitalcontent')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Approved Appointments of Vaccinations</h6>
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
                                    <th scope="col">Appointment_Id</th>
                                    <th scope="col">Appointment_Date</th>
                                    <th scope="col">Vaccine_Name</th>
                                    <th scope="col">dose_number</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($fetchVn as $fetchVnApp)
                                    <tr>
                                        <td>{{ $fetchVnApp->id }}</td>
                                        <td>{{ $fetchVnApp->patient_id }}</td>
                                        <td>{{ $fetchVnApp->id }}</td>
                                        <td>{{ $fetchVnApp->appointment_date }}</td>
                                        <td>{{ $fetchVnApp->vaccination_name }}</td>
                                        <td>{{ $fetchVnApp->dose_number }}</td>
                                        <td>{{ $fetchVnApp->status }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="col-12 btn btn-primary vn-edit-btn"
                                                data-id={{ $fetchVnApp->id }}>Edit</a>

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
                    <h6 class="mb-4">Approved Appointments of Covid Test</h6>
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
                                @foreach ($fetchCt as $fetchCtApp)
                                    <tr>
                                        <td>{{ $fetchCtApp->id }}</td>
                                        <td>{{ $fetchCtApp->patient_id }}</td>
                                        <td>{{ $fetchCtApp->id }}</td>
                                        <td>{{ $fetchCtApp->appointment_date }}</td>
                                        <td>{{ $fetchCtApp->test_type }}</td>
                                        <td>{{ $fetchCtApp->symptoms }}</td>
                                        <td>{{ $fetchCtApp->status }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="col-12 btn btn-primary edit-ct-btn"
                                                data-id="{{ $fetchCtApp->id }}">Edit</a>

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




    <!-- Modal -->

    <div class="modal fade" id="covidtestModal" style="display: none" tabindex="-1">
        <div class="modal-dialog">
            <form id="editCTform" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Test_Result</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="ct_id">


                        <!-- Type -->
                        <div class="col-12 mb-3">
                            <label>Patient_id</label>
                            <input class="form-control" type="text" name="patient_id" id="ct_patient_id" readonly><br>
                            <label>Patient_name</label>

                            <input class="form-control" type="text" name="patient_name" id="ct_patient_name" readonly>
                        </div>


                        <div class="col-12 mb-3">

                            <label>hospital_name</label>

                            <input class="form-control" type="text" name="hospital_name" id="ct_hospital_name" readonly>
                        </div>



                        <div class="col-12 mb-3">
                            <label>Appointment_id</label>
                            <input class="form-control" type="text" name="appointment_id" id="ct_appointment_id"
                                readonly><br>
                            <label>Appointment_date</label>

                            <input class="form-control" type="text" name="appointment_date" id="ct_appointment_date"
                                readonly>
                        </div>



                        <div class="mb-3">
                            <label>Test_type</label>

                            <input class="form-control" type="text" name="test_type" id="ct_test_type" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Symptoms</label>
                            <textarea class="form-control" name="symptoms" id="ct_symptoms" readonly></textarea>
                        </div>

                        <div class="mb-3 type-section test-section">
                            <label>Test Result</label>
                            <select name="test_result" class="form-select">
                                <option value="">Select test_result</option>
                                <option value="Positive" name="test_result">Positive</option>
                                <option value="Negative" name="test_result">Negative</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            Result_date<input class="form-control" type="date" name="test_result_date">
                        </div>


                        <div class="mb-3 type-section test-section">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Cleared" name="status">Cleared</option>
                                <option value="UnCleared" name="status">UnCleared</option>

                            </select>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- Modal of Vaccination Start --}}

    <!-- Modal -->

    <div class="modal fade" id="vaccineModal" style="display: none" tabindex="-1">
        <div class="modal-dialog">
            <form id="editVNform" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Vaccination</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="vn_id">


                        <!-- Type -->
                        <div class="col-12 mb-3">
                            <label>Patient_id</label>
                            <input class="form-control" type="text" name="patient_id" id="vn_patient_id" readonly><br>
                            <label>Patient_name</label>

                            <input class="form-control" type="text" name="patient_name" id="vn_patient_name" readonly>
                        </div>


                        <div class="col-12 mb-3">

                            <label>hospital_name</label>

                            <input class="form-control" type="text" name="hospital_name" id="vn_hospital_name" readonly>
                        </div>



                        <div class="col-12 mb-3">
                            <label>Appointment_id</label>
                            <input class="form-control" type="text" name="appointment_id" id="vn_appointment_id"
                                readonly><br>
                            <label>Appointment_date</label>

                            <input class="form-control" type="text" name="appointment_date" id="vn_appointment_date"
                                readonly>
                        </div>



                        <div class="mb-3">
                            <label>vaccine_Name</label>

                            <input class="form-control" type="text" name="vaccination_name" id="vn_vaccination_name" readonly>
                        </div>

                        <div class="mb-3">
                            <label>dose</label>
                            <input class="form-control" name="dose_number" id="vn_doseNumber" readonly>
                        </div>

                        <div class="mb-3 type-section test-section">
                            <label>Vaccination_Result</label>
                            <select name="test_result" class="form-select">
                                <option value="">Select vaccination_result</option>
                                <option value="Positive" name="test_result">Completed</option>
                                <option value="Negative" name="test_result">Partial</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            Result_date<input class="form-control" type="date" name="vaccine_result_date">
                        </div>


                        <div class="mb-3 type-section test-section">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Cleared" name="status">Cleared</option>
                                <option value="UnCleared" name="status">UnCleared</option>

                            </select>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-ct-btn').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '/editCtTest/' + id,
                    type: 'GET',
                    success: function(data) {
                        
                        
                        // Populate modal fields
                        $('#ct_patient_id').val(data.patient_id);
                        $('#ct_patient_name').val(data.patient_name);
                        $('#ct_hospital_name').val(data.hospital_name);
                        $('#ct_appointment_id').val(data.appointment_id); // or data.appointment_id
                        $('#ct_appointment_date').val(data.appointment_date);
                        $('#ct_test_type').val(data.test_type);
                        $('#ct_symptoms').val(data.symptoms);
                        $('#ct_status').val(data.status);

                        // Show modal using Bootstrap 5
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'covidtestModal'));
                        myModal.show();
                    },
                    error: function(xhr) {
                        alert('Something went wrong while fetching data!');
                    }
                });
            });

            $('.vn-edit-btn').click(function () {
                var id = $(this).data('id');

                $.ajax(
                    {
                        url: '/editVn/' + id,
                        type: 'GET',
                        success: function(data) {
                            $('#vn_patient_id').val(data.patient_id);
                            $('#vn_patient_name').val(data.patient_name);
                            $('#vn_hospital_name').val(data.hospital_name);
                            $('#vn_appointment_id').val(data.appointment_id);
                            $('#vn_appointment_date')
                        }
                    }
                )
            })
        });


    </script>
@endsection
