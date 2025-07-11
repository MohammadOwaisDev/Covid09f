<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="patientdash/img/favicon.png" rel="icon">
  <link href="patientdash/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="patientdash/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="patientdash/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="patientdash/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="patientdash/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="patientdash/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="patientdash/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="patientdash/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="patientdash/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="patientdash/img/logo.png" alt="">
                  <span class="d-none d-lg-block">PatientDash</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register Yourself</h5>
                    <p class="text-center small">Enter your personal details to registration</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="/register" method="POST">
                    @csrf
                    <div class="col-6">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Phone</label>
                      <input type="text" name="contact" class="form-control" id="yourPhone" required>
                      <div class="invalid-feedback">Please enter your Phone Number!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Age</label>
                      <input type="number" name="age" class="form-control" min="10" id="yourAge" required>
                      <div class="invalid-feedback">Please enter your Age</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">National Identity</label>
                      <input type="text" name="nic" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your National Identity!</div>
                    </div>
 

                        <div class="col-12">
                      <label for="yourAddress" class="form-label">Address</label>
                      <input type="text" name="Address" class="form-control" id="yourAddress" required>
                      <div class="invalid-feedback">Please enter your Full Address!</div>
                    </div>
                   


                      <h3>Gender</h3>
                    <div class="col-6">
                      <label for="YourGender" class="form-label">Male</label>
                      <input type="radio" name="gender" value="male"  id="yourGender" required>
                      <div class="invalid-feedback">Please select your Gender!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">female</label>
                      <input type="radio" name="gender" value="female"  id="yourGender" required>
                      <div class="invalid-feedback">Please select your Gender!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="patientdash/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="patientdash/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="patientdash/vendor/chart.js/chart.umd.js"></script>
  <script src="patientdash/vendor/echarts/echarts.min.js"></script>
  <script src="patientdash/vendor/quill/quill.js"></script>
  <script src="patientdash/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="patientdash/vendor/tinymce/tinymce.min.js"></script>
  <script src="patientdash/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="patientdash/js/main.js"></script>

</body>

</html>