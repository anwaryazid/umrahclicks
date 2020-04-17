<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UmrahClicks.my</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/main-custom.css" rel="stylesheet">

  <style>
    .container2 {
      max-width: 500px;
      padding-right: 2.5rem;
      padding-left: 2.5rem;
      margin-right: auto;
      margin-left: auto;
    }
    .caros {
        max-width: 100%;
        min-height: 100%;
        display: block; /* remove extra space below image */
        object-fit: cover;
    }
    .box{
        height: 550px;        
    }    

    /* @media screen and (min-width: 1200px) {
      .container2 {
        width: 40%;
      }
    }   */

  </style>

</head>

<body class="">

  <div class="container2">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="">
          <div class="p-5">
            <div class="text-center">
              <img class="d-block w-100" src="img/umrahclicks-logo.JPG" height="" alt="UmrahClicks">
              <!-- <h5 class="h5 text-primary mb-4" style="font-weight: 700;"><i class="fas fa-fw fa-kaaba text-gray-900"></i>&nbsp;UmrahClicks.my</h5> -->
            </div>
            <form>
              <div class="form-group text-md">
                <label for="" class="col-form-label text-gray-900">User Name</label>
                <input type="email" class="form-control form-control-sm" id="exampleInputEmail" aria-describedby="emailHelp">
                <label for="" class="col-form-label text-gray-900">Password</label>
                <input type="password" class="form-control form-control-sm" id="exampleInputPassword">
              </div>
              <a href="index.php?page=dashboard" class="btn btn-primary btn-block">
                Login
              </a>
            </form>                  
            <hr>
            <div class="text-center">
              <!-- <a class="small" href="forgot-password.php">Forgot Password?</a> -->
              <a class="small" href="#" data-toggle="modal" data-target="#forgotModal">Forgot Password?</a>
            </div>
            <!-- <div class="text-center">
              <a class="small" href="#" data-toggle="modal" data-target="#registerModal">Create an Account!</a>
            </div> -->
            <hr>
            <div class="text-center">
              <a class="small" href="home.php">Search Package</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
    include('view/modal/mforgot-password.php');
    include('view/modal/mregister.php');
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/main.js"></script>

</body>

</html>
