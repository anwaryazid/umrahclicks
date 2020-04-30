<?php
session_start();
session_unset();
session_destroy();
?>

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
    .bg {
      /* The image used */
      background-image: url("img/white-cloud.jpg");

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
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
            </div>
            <hr>
            <div class="alert alert-danger collapse" id="login-alert" style="font-size: 0.8rem;">
              <span id="err_text"></span>
              <button type="button" class="close align-middle" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="formLogin" action="index.php" method="post" enctype="application/x-www-form-urlencoded">
              <div class="row text-md">
                <div class="form-group col-md-12">
                  <label for="" class="col-form-label text-gray-900">User Name</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
              </div>
              <div class="row text-md">
                <div class="form-group col-md-12">  
                  <label for="" class="col-form-label text-gray-900">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="row text-md">
                <div class="form-group col-md-12">  
                  <input type="hidden" name="operation" id="operation" value="Login">
                  <input type="hidden" name="mid" id="mid" value="1">
                  <input type="hidden" name="m2id" id="m2id" value="0">
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
              </div>              
            </form>           
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

  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('submit', '#formLogin', function(event){
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        var err_text = "";
        if(username == '' || password == '') {
          err_text = "Please fill in the form."
          $('#err_text').text(err_text);
          $('#login-alert').show('fade');
          setTimeout(function () {
            $('#login-alert').hide('fade');
          }, 6000);
        }
        else {
          $.ajax({
            url: "process/p_login.php",
            type: "POST",
            dataType: "json",
            data: $("#formLogin").serializeArray(),
            async: false,
            success: function(resp) {
              if (resp.success == 'true') {
                document.getElementById("formLogin").submit();
              } else {
                $('#err_text').html(resp.result);
                $('#login-alert').show('fade');
                setTimeout(function () {
                  $('#login-alert').hide('fade');
                }, 6000);
                return false;
              }
            },
            error: function() {
              $('#err_text').html('<strong>System Error!</strong> <br/>Please contact system administrator.');
              $('#login-alert').show('fade');
              setTimeout(function () {
                $('#login-alert').hide('fade');
              }, 6000);
              return false;
            }
          });
        }
      });
      
    });
  </script>

</body>

</html>
