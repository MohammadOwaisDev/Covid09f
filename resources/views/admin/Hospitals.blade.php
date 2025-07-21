@extends('admin.headfootside')


@section('admincontent')

<main id="main">
    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                
                <div class="d-flex justify-content-end">
                    <button class=" btn btn-primary addModalBtn">Add Hospital</button>
                </div>

{{-- Modal Code start --}}


  <div class="modal fade" id="bookModal" tabindex="-1">
    <div class="modal-dialog">
  <form class="row g-3 needs-validation" novalidate action="/addhospital" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Hospital Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <div class="col-12">
          <label class="form-label">Hospital Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Hospital Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Image</label>
          <input type="file" name="image" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" required>
            <label class="form-check-label">I agree to terms and conditions</label>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Add</button>
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>

  </div>

{{-- Modal Code End --}}

{{-- Edit Code --}}

<div class="modal fade" id="editModal"  tabindex="-1">
    <div class="modal-dialog">
  <form class="row g-3 needs-validation" novalidate action="{{url('/updatehospital')}}" method="POST" enctype="multipart/form-data">
    @csrf

    


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Hospital Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

<input type="hidden" name="id" id="edit_id">

        <div class="col-12">
          <label class="form-label">Hospital Name</label>
          <input type="text" name="name" id="edit_name" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Hospital Email</label>
          <input type="email" name="email" id="edit_email" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Password</label>
          <input type="password" name="password"  class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Image</label>
          <input type="file" name="image"  class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">Address</label>
          <input type="text" name="address" id="edit_address" class="form-control" required>
        </div>

        <br>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" required>
            <label class="form-check-label">I agree to terms and conditions</label>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">Update</button>
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>

  </div>

{{-- Edit Code End --}}
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
                          @foreach ($fetchhospital as $fetch)

                            <tr>
                                <td>
        <img src="{{ asset('admindash/img/'.$fetch->image) }}" width="70" height="70px" style="object-fit:cover;">
    </td>
                                <td>{{$fetch->name}}</td>
                                <td>{{$fetch->email}}</td>
                                <td>Encrypted</td>
                                <td>{{$fetch->address}}</td>
                                <td>
                                  <a class=" col-12 btn btn-success editModalBtn"
                                  data-id = "{{$fetch->id}}"
                                  data-name = "{{$fetch->name}}"
                                  data-email = "{{$fetch->email}}"
                                  data-address = "{{$fetch->address}}"                                  
                                  >Edit</a>
                                  <a href="deletehospital/{{$fetch->id}}" class="col-12 btn btn-danger">Delete</a>
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


<script>
    document.querySelector('.addModalBtn').addEventListener('click', function() {
        let modal = new bootstrap.Modal(document.getElementById('bookModal'));
        modal.show();
    });

    
</script>

<script>
   document.querySelectorAll('.editModalBtn').forEach(btn => {
    btn.addEventListener('click', function(){
      document.getElementById('edit_name').value = this.dataset.name;
      document.getElementById('edit_email').value = this.dataset.email;
      document.getElementById('edit_address').value = this.dataset.address;

      new bootstrap.Modal(document.getElementById('editModal')).show();

    });
   });


    
</script>


@endsection