@extends('hospitals.headfootside')

@section('hospitalcontent')

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                           
                            
<form action="{{url('./updatetest',$Update->id)}}" method="post">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div data-mdb-input-init class="form-outline">
          <input type="name" id="form3Example1" name="name" value="{{$Update->Name}}"  class="form-control" />
          <label class="form-label" for="form3Example1">Patient Name</label>
        </div>
      </div>
     



    
  
    
  
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="email" id="form3Example3"  value="{{$Update->Email}}" class="form-control" />
      <label class="form-label" for="form3Example3">Email address</label>
    </div>
  
    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="text" id="form3Example4" name="test"  value="{{$Update->AppoitmentType}}"  class="form-control" />
      <label class="form-label" for="form3Example4">Test</label>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="form3Example4" name="status" class="form-control" />
        <label class="form-label" for="form3Example4">Status</label>
      </div>
    
  
  <div class="text-align-center">
    <!-- Submit button -->
    <a href="/updatetests" class="btn btn-primary">Update</a>
  
</div>
  </form>
 
                </div>
            </div>
            <!-- Form End -->

           
@endsection