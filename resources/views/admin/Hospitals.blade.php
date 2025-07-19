@extends('admin.headfootside')


@section('admincontent')

<main id="main">
    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                
                <div class="d-flex justify-content-end">
                    <button class=" btn btn-primary showModal">Add Hospital</button>
                </div>

{{-- Modal Code start --}}


  <div class="modal fade" id="bookModal" tabindex="-1">
    <div class="modal-dialog">
      <form>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Book Appointment at <span id="hospital_name" class="text-primary"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">

            <!-- Hidden hospital_id -->
            <input type="hidden" name="hospital_id" id="hospital_id">

            <!-- Type -->
            <div class="mb-3">
              <label>Appointment Type</label>
              <select name="type" id="type" class="form-select" required>
                <option value="">Select</option>
                <option value="test">COVID-19 Test</option>
                <option value="vaccine">Vaccination</option>
              </select>
            </div>

            <!-- Date -->
            <div class="mb-3">
              <label>Select Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>

            <!-- COVID Test Fields -->
            <div class="mb-3 type-section test-section d-none">
              <label>Symptoms (Optional)</label>
              <input type="text" name="symptoms" class="form-control">
            </div>

            <!-- Vaccination Fields -->
            <div class="mb-3 type-section vaccine-section d-none">
              <label>Vaccine Dose</label>
              <select name="dose" class="form-select">
                <option value="dose1">Dose 1</option>
                <option value="dose2">Dose 2</option>
                <option value="booster">Booster</option>
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

{{-- Modal Code End --}}
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Image</td>
                                <td>name</td>
                                <td>name</td>
                                <td>name</td>
                                <td>name</td>
                                <td>name</td>
                                
                            </tr>
                        </tbody>
        
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
</main>


@endsection