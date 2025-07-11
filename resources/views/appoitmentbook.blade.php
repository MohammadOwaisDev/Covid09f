<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
<style>
  body{
    background: rgb(0,36,25);
    background: linear-gradient(90deg, rgba(0,36,25,1) 0%, rgba(9,121,56,1) 0%, rgba(7,155,99,1) 3%, rgba(0,212,255,1) 96%);
  }
  .container{
    margin-top: 50px;
  }
      select{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .myradio{
           margin-left: 5px;
           
        }
</style>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h1 class="card-title text-center pb-0 fs-4 ">Book Your Appointment</h1>
                <p class="text-center small">Enter your details for booking</p>
              </div>

              <form class="row g-3 needs-validation" novalidate action="/book" method="POST">
                @csrf
                <div class="col-6">
                  <label for="yourName" class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your full name!</div>
                </div>

                <div class="col-6">
                  <label for="yourEmail" class="form-label">Your Email</label>
                  <input type="email" name="email" class="form-control" id="yourEmail" required>
                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                </div>


                <div class="col-6">
                  <label for="yourPassword" class="form-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="yourPassword" required>
                  <div class="invalid-feedback">Please enter your date of birth!</div>
                </div>

                <div class="col-6">
                  <label for="yourPassword" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" id="yourPhone" required>
                  <div class="invalid-feedback">Please enter your Phone Number!</div>
                </div>

              
                <div class="col-12">
                  <label for="yourappoitment" class="custom-select">AppoitmentType</label>
                 <select  name="appoitmenttype" id="appoitmentType">
                    <option value="">Select Type</option>
                    <option value="Covid-Test">Covid-Test</option>
                    <option value="Vaccination">Vaccination</option>
                 </select>
                  <div class="invalid-feedback">Please enter your Appointment _!</div>
                </div>
         
                <div class="col-6">
                    <label for="appoitmentDate" class="form-label">Select Appoitment Date:</label>
                    <input type="date" name="appdate" class="form-control" id="date" required>
                    <div class="invalid-feedback">Please select appoitment date!</div>
                  </div>

                  <div class="col-6">
                    <label for="appoitmentTime" class="form-label">Select Appoitment Time</label>
                    <input type="time" name="apptime" class="form-control" id="time" required>
                    <div class="invalid-feedback">Please select appoitment time!</div>
                  </div>
                



                  <div class="col-12">
                   
                   <select  name="hospital" id="appoitmentType">
                      <option value="">Select_Hospital</option>
                      <option value="AgaKhan Hospital">AgaKhan Hospital</option>
                      <option value="Jinnah Hospital">Jinnah Hospital</option>
                      <option value="SIUT">SIUT</option>
                   </select>
                    <div class="invalid-feedback">Please enter your Hospital _!</div>
                  </div>
  

                
                <div class="col-12">
                  <button class="btn btn-success w-100" type="submit">Book Appoitmnet</button>
                </div>
                
              </form>

            </div>
          </div>
              </div>
            </div>
        </div>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
