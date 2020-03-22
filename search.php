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

</head>

<body class="">

  <div class="container">   

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">UmrahClicks.my</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <!-- <h3 class="h5 text-gray-900 mb-4">Country</h3> -->
                    <label for="" class="col-form-label text-gray-900">Country</label>
                  </div>
                  <div class="col-sm-7">
                    <select class="form-control" id="country">
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
                    <input type="text" class="form-control" id="date_Depart" placeholder="dd/mm/yyyy">
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <!-- <h3 class="h5 text-gray-900 mb-4">Adult</h3> -->
                    <label for="" class="col-form-label text-gray-900">Adult</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="no_adult" placeholder="No. of Adult">
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <label for="" class="col-form-label text-gray-900">Children</label>
                    <!-- <h3 class="h5 text-gray-900 mb-4">Children</h3> -->
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="no_children" placeholder="No. of Children">
                  </div>                  
                </div>
                <a href="packages.php" class="btn btn-primary btn-user btn-block">
                  <i class="fas fa-search fa-sm"></i> Search
                </a>                
              </form>
              <hr>
              <div class="text-center"> 
                <a class="small" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a> | 
                <a class="small" href="packages.php">Packages</a> | 
                <a class="small" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>
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

      <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Jawrah Info</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div> -->

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
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Advertisment 1</h6>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <a target="_blank" rel="nofollow" href="https://www.google.com">View Details &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Advertisment 2</h6>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <a target="_blank" rel="nofollow" href="https://www.google.com">View Details &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Advertisment 3</h6>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <a target="_blank" rel="nofollow" href="https://www.google.com">View Details &rarr;</a>
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

</body>

</html>
