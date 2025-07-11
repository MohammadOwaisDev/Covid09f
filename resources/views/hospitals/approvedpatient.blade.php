@extends('hospitals.headfootside')

@section('hospitalcontent')

       
      

            <!-- Main Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Data Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">name</th>
                                            <th scope="col">email</th>
                                            <th scope="col">birthdate</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">appoitmentType</th>
                                            <th scope="col">appoitmentDate</th>
                                            <th scope="col">appoitmentTime</th>
                                            <th scope="col">hospital</th>
                                            <th scope="col">status</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fetchbookings as $approved)
                                        <tr>
                                            
                                            <td>{{ $approved->Name }}</td>
                                            <td>{{ $approved->Email }}</td>
                                            <td>{{ $approved->Birthdate }}</td>
                                            <td>{{ $approved->Phone }}</td>
                                            <td>{{ $approved->AppoitmentType }}</td>
                                            <td>{{ $approved->AppoitmentDate }}</td>
                                            <td>{{ $approved->AppoitmentTime }}</td>
                                            <td>{{ $approved->Hospital }}</td>
                                            <td><button href="" class="btn btn-success">Approved</button></td>
                                            <td><a href="./edit_test/{{$approved->id}}" class="btn btn-warning">Update</a></td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content End -->
       
           @endsection