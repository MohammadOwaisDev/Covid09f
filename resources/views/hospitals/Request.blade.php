@extends('hospitals.headfootside')

@section('hospitalcontent')

       
<style>

</style>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Table</h6>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
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
                            <tr>
                                <td>owais123</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                                <td>owais</td>
                            </tr>
                        </tbody>
        
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
           @endsection