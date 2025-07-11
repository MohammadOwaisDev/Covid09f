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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patients</h4>
                                <div class="table-responsive">
                                <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Pname</th>
          <th>Pemail</th>
          <th>Pphone</th>
          <th>Ppassword</th>
          <th>Paddress</th>
          <th>Pnic</th>
          <th>Pvreason</th>
          <th>Pgender</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($patient as $p)
        <tr>
          
          <td>{{$p->Pname}}</td>
          <td>{{$p->Pemail}}</td>
          <td>{{$p->Pphone}}</td>
          <td>{{$p->Ppassword}}</td>
          <td>{{$p->Paddress}}</td>
          <td>{{$p->Pnic}}</td>
          <td>{{$p->Pgender}}</td>
          <td><a href="./excel/{{$p->id}}" class="btn btn-success mb-2">Export</a>
        <a href="./delete_patient/{{$p->id}}" class="btn btn-danger">Delete</a>
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
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
       @endsection