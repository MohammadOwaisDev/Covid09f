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
                                            <a href="{{ url('/showApproveAppointment/' . $fetchVnApp->id) }}"
                                                class="col-12 btn btn-primary">Edit</a>

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
                                            <a href="" class="col-12 btn btn-primary edit-ct-btn" data-bs-toggle="modal" data-bs-target="#covidtestModal">Edit</a>

                                        </td>

                                    </tr>
                     
                              

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
<!-- Modal -->

  <div class="modal fade" id="covidtestModal" tabindex="-1">
    <div class="modal-dialog">
      <form action="{{url('/updatetest'.$fetchCtApp->id)}}" method="post">
		@csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Test_Result</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">

           


            <!-- Type -->
            <div class="col-12 mb-3">
              <input type="text" name="patient_id" value="{{$fetchCtApp->patient_id}}" readonly>
               <input type="text" name="hospital_id" value="{{$fetchCtApp->hospital_id}}" readonly>
            </div>

            

            <div class="col-12 mb-3">
              <input type="text" name="appointment_id" value="{{$fetchCtApp->appointment_id}}" readonly>
               <input type="text" name="appointment_date" value="{{$fetchCtApp->appointment_date}}" readonly>
            </div>

             

            <div class="mb-3">
              <input type="text" name="test_type" value="{{$fetchCtApp->test_type}}" readonly>
            </div>

            <div class="mb-3">
              <textarea type="text" name="symptoms" value="{{$fetchCtApp->symptoms}}" readonly>
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
              Result_date<input type="date" name="test_result_date">
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
  @endforeach

  <script>
    $(document).ready(function () {
      // Modal open
      $('.edit-ct-btn').on('click', function () {
       
        let modal = new bootstrap.Modal(document.getElementById('covidtestModal'));
        modal.show();
      });

      
    });

	
  </script>
@endsection
