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
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="css/jquery.datetimepicker.min.css" rel="stylesheet"> -->
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">
  
  <style>
    .container2 {
      width: 100%;
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
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
            <div id="imgIndicator" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                <li data-target="#imgIndicator" data-slide-to="1"></li>
                <li data-target="#imgIndicator" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active box">
                  <img class="d-block caros" src="img/kaabah.jpg" height="550px">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros" src="img/kaabah.jpg" height="550px">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros" src="img/kaabah.jpg" height="550px">
                </div>
              </div>
              <a class="carousel-control-prev" href="#imgIndicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#imgIndicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-primary mb-4">UmrahClicks.my</h1>
                <!-- <h1 class="h4 text-gray-900 mb-4">Umrah<span style="color:grey;">Clicks</span>.my</h1> -->
                <!-- <img src="img/umrahclicks_black.png" style="width:80%"> -->
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <!-- <h3 class="h5 text-gray-900 mb-4">Country</h3> -->
                    <label for="" class="col-form-label text-gray-900">Country</label>
                  </div>
                  <div class="col-sm-7">
                    <select class="form-control form-control-sm" id="country">
                      <option value="">Please Select</option>
                      <option value="Malaysia">Malaysia</option>
                    </select>
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <!-- <h3 class="h5 text-gray-900 mb-4">Date Depart From</h3> -->
                    <label for="" class="col-form-label text-gray-900">Date Depart From</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="date_Depart" name="date_Depart" placeholder="dd/mm/yyyy">
                  </div>                  
                </div>
                <!-- <div class="date-picker">
                  <div class="selected-date"></div>
                  <div class="dates">
                    <div class="month">
                      <div class="arrows prev-mth">&lt;</div>
                      <div class="mth"></div>
                      <div class="arrows next-mth">&gt;</div>
                    </div>
                    <div class="days"></div>
                  </div>
                </div> -->
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <!-- <h3 class="h5 text-gray-900 mb-4">Adult</h3> -->
                    <label for="" class="col-form-label text-gray-900">Adult</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="no_adult" placeholder="No. of Adult">
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <label for="" class="col-form-label text-gray-900">Children</label>
                    <!-- <h3 class="h5 text-gray-900 mb-4">Children</h3> -->
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form-control-sm" id="no_children" placeholder="No. of Children">
                  </div>                  
                </div>
                <a href="packages.php" class="btn btn-outline-primary btn-block" style="font-size: 0.9rem;">
                  <i class="fas fa-search fa-sm"></i> Search
                </a>                
              </form>
              <hr>
              <div class="text-center"> 
                <a class="small" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a> | 
                <a class="small" href="packages.php">Packages</a> | 
                <a class="small" href="#" data-toggle="modal" data-target="#contactModal">Contact Us</a>
              </div>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      include('view/modal/mcontact.php');
      include('view/modal/magencies.php');
    ?>

    <!-- Content Row -->
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jawrah Info</h6>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package 1</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/elaf4.jpg" height="180px">
            <br>
            <p>Al-Nile Tour & Travel Sdn Bhd</p>
          </div>
          <div class="card-footer">
            <a rel="nofollow" href="packages.php" style="font-size: 0.9rem;">View Packages &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package 2</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/elaf2.jpg" height="180px">
            <br>
            <p>Ash-Har Travel & Tours Sdn Bhd</p>
          </div>
          <div class="card-footer">
            <a rel="nofollow" href="packages.php" style="font-size: 0.9rem;">View Packages &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package 3</h6>
          </div> -->
          <div class="card-body" style="font-size: 0.8rem;">
            <img class="d-block w-100" src="img/elaf3.jpg" height="180px">
            <br>
            <p>Andalusia Travel & Tours Sdn Bhd</p>
          </div>
          <div class="card-footer">
            <a rel="nofollow" href="packages.php" style="font-size: 0.9rem;">View Packages &rarr;</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- <script src="js/date-picker.js"></script> -->
  <!-- <script src="js/jquery.datetimepicker.full.min.js"></script> -->
  <script src="js/bootstrap-datepicker.js"></script>

  <script>
    $(function() {
      $('#date_Depart').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });
    });
    /* jQuery('#date_Depart').datetimepicker({
      timepicker: false,
      datepicker: true,
      format: 'd/m/Y'
    }); */
  </script>

</body>

</html>