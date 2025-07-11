@extends('patient.headfootside')

@section('patientcontent')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Frequently Asked Questions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Frequently Asked Questions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<div class="row row-cols-md-3 g-3">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="images/aga khan.jpg" class="card-img-top" id="mycardimg" alt="...">
      <div class="card-body">
        <h5 class="card-title">Aga Khan</h5>
        <p class="card-text">We continuously monitor COVID-19 guidance from the Centers for Disease Control and Prevention (CDC) and adjust our safety practices and safeguards accordingly.</p>
        <<div class="row">
          <a href="/bookappoitment" class="btn btn-primary">Covid-Test</a>
          <a href="/bookappoitment" class="btn btn-danger">Vaccination</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="images/Bahria.jpg" class="card-img-top" id="mycardimg" alt="...">
      <div class="card-body">
        <h5 class="card-title">Bahria Hospital</h5>
        <p class="card-text">Bahria, the largest transplant center in Pakistan started a COVID OPD, ward, and intensive care facility for the public as part of the national effort to contain test</p>
        <<div class="row">
          <a href="/bookappoitment" class="btn btn-primary">Covid-Test</a>
          <a href="/bookappoitment" class="btn btn-danger">Vaccination</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="images/jinnah.jpg" class="card-img-top" id="mycardimg" alt="...">
      <div class="card-body">
        <h5 class="card-title">Jinnah Hospital</h5>
        <p class="card-text">The journey of Jinnah Postgraduate Medical Centre (JPMC) started in 1930 in Medical Corps Hospital, meant for medical aid to military personnel exclusively. In.</p>
        <<div class="row">
          <a href="/bookappoitment" class="btn btn-primary">Covid-Test</a>
          <a href="/bookappoitment" class="btn btn-danger">Vaccination</a>
        </div>
      </div>
    </div>
  </div>
  </main><!-- End #main -->

  @endsection