@extends('admin.headfootside')


@section('admincontent')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Birthdate</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Appointment Type</th>
                                            <th scope="col">Appointment Date</th>
                                            <th scope="col">Appointment Time</th>
                                            <th scope="col">Hospital</th>
                                            <th scope="col">Action</th>
                                        </tr>     
                                    </thead>
                                    <tbody>
                                        @foreach($Fetchdata as $F)
                                        <tr>
                                            <td>{{$F->id}}</td> 
                                            <td>{{$F->Name}}</td>
                                            <td>{{$F->Email}}</td>
                                            <td>{{$F->Birthdate}}</td>
                                            <td>{{$F->Phone}}</td>
                                            <td>{{$F->AppoitmentType}}</td> 
                                            <td>{{$F->AppoitmentDate}}</td> 
                                            <td>{{$F->AppoitmentTime}}</td> 
                                            <td>{{$F->Hospital}}</td>
                                            <td>

                                                <form action="{{ route('appointments.approve', $F->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                </form>
                                                <form action="{{ route('appointments.reject', $F->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
       @endsection