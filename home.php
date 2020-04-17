<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

require("lib/conn.php"); 
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
  <link href="css/main-dark-blue.min.css" rel="stylesheet">
  <!-- <link href="css/jquery.datetimepicker.min.css" rel="stylesheet"> -->
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">
  
  <style>
    .container2 {
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
        height: 640px;        
    }    

    @media screen and (max-width: 1200px) {
      .container2 {
        max-width: 640px;
      }
    } 
  </style>

</head>

<body>
  <div class="container2">   
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row h-100">
          <div class="col-xl-8 col-md-12 d-none d-xl-block my-auto">
            <div id="imgIndicator" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                <li data-target="#imgIndicator" data-slide-to="1"></li>
                <li data-target="#imgIndicator" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active box">
                  <img class="d-block caros w-100" src="img/smart1-min.jpg">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros w-100" src="img/smart2-min.jpg">
                </div>
                <div class="carousel-item box">
                  <img class="d-block caros w-100" src="img/kaabah-min.jpg">
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
          <div class="col-xl-4 col-md-12 align-middle my-auto">
            <div class="p-5">
              <div class="text-center mb-3">
                <!-- <h4 class="h4 text-primary mb-4" style="font-weight: 700;"><i class="fas fa-fw fa-kaaba text-gray-900"></i>&nbsp;UmrahClicks.my</h4> -->
                <a href="login.php"><img class="d-block w-100" src="img/umrahclicks-logo.JPG" height="" alt="UmrahClicks"></a>
              </div>
              <hr>
              <div class="alert alert-danger collapse" id="search-alert" style="font-size: 0.8rem;">
                <span id="textAlertSearch"></span>&nbsp;&nbsp;&nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <?php $countryList = $conn->query("SELECT * FROM ref_country"); ?>  
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Country</label>
                  <div class="col-sm-7">
                    <input type="hidden" class="form-control form-control-sm text-center border-primary text-primary" id="s_country" name="s_country" value="MY">
                    <div class="dropdown">
                      <button class="btn btn-outline-primary btn-sm btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="img/flag/MY-sq-32.png" height="23" alt="" id="countryFlag">&nbsp; <span id="countryName">MALAYSIA</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%;">
                        <?php
                        while($rows = $countryList->fetch_assoc())
                        {
                          $countryName = $rows['keterangan'];
                          $countryKod = $rows['kod'];
                          echo '<a class="dropdown-item" href="#" onClick="selectCountry(\''.$countryKod.'\',\''.$countryName.'\');"><img src="img/flag/'.$countryKod.'-sq-32.png" height="23" alt="">&nbsp;&nbsp;'.$countryName.'&nbsp;&nbsp;</a><div class="dropdown-divider"></div>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>            
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Departure Date</label>
                  <div class="col-sm-7">
                    <div class="input-group input-group-sm">   
                      <input type="text" class="form-control form-control-sm text-center border-primary text-primary input-date" id="s_dateDepart" name="s_dateDepart" placeholder="DD/MM/YYYY">
                      <div class="input-group-append">
                        <span class="input-group-text input-group-addon bg-white text-primary border-primary">&nbsp;<i class="fas fa-plane-departure fa-sm"></i>&nbsp;</span>
                      </div> 
                    </div>
                  </div>               
                </div>
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">No. of Adult</label>
                  <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-warning btn-number border-primary" type="button" id="button-minus-min" data-type="minus" data-field="quant[1]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[1]" id="s_noAdult" class="form-control form-control-sm text-center input-number border-primary text-primary" value="1" min="1" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-primary btn-number border-primary" type="button" id="button-plus-max" data-type="plus" data-field="quant[1]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>                 
                </div>
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">No. of Children</label>
                  <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-warning btn-number border-primary" type="button" id="button-minus-min" data-type="minus" data-field="quant[2]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[2]" id="s_noChild" class="form-control form-control-sm text-center input-number border-primary text-primary" value="0" min="0" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-primary btn-number border-primary" type="button" id="button-plus-max" data-type="plus" data-field="quant[2]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>                 
                </div>
                <!-- <div class="row">
                  <div class="col-sm-6">
                    <?php $countryList = $conn->query("SELECT * FROM ref_country"); ?>  
                    <div class="form-group">                  
                      <label>Country</label>
                      <input type="hidden" class="form-control form-control-sm text-center border-primary text-primary" id="s_country" name="s_country" value="MY">
                      <div class="dropdown">
                        <button class="btn btn-outline-primary btn-sm btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="img/flag/MY-sq-32.png" height="23" alt="" id="countryFlag">&nbsp; <span id="countryName">MALAYSIA</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%;">
                          <?php
                          while($rows = $countryList->fetch_assoc())
                          {
                            $countryName = $rows['keterangan'];
                            $countryKod = $rows['kod'];
                            echo '<a class="dropdown-item" href="#" onClick="selectCountry(\''.$countryKod.'\',\''.$countryName.'\');"><img src="img/flag/'.$countryKod.'-sq-32.png" height="23" alt="">&nbsp;&nbsp;'.$countryName.'&nbsp;&nbsp;</a><div class="dropdown-divider"></div>';
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">                  
                    <label>Departure Date</label>
                    <div class="input-group input-group-sm">   
                      <input type="text" class="form-control form-control-sm text-center border-primary text-primary input-date" id="s_dateDepart" name="s_dateDepart" placeholder="DD/MM/YYYY">
                      <div class="input-group-append">
                        <span class="input-group-text input-group-addon bg-white text-primary border-primary">&nbsp;<i class="fas fa-plane-departure fa-sm"></i>&nbsp;</span>
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label>No. of Adult</label>
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-warning btn-number border-primary" type="button" id="button-minus-min" data-type="minus" data-field="quant[1]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[1]" id="s_noAdult" class="form-control form-control-sm text-center input-number border-primary text-primary" value="1" min="1" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-primary btn-number border-primary" type="button" id="button-plus-max" data-type="plus" data-field="quant[1]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">  
                    <label>No. of Children</label>
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                          <button class="btn btn-warning btn-number border-primary" type="button" id="button-minus-min" data-type="minus" data-field="quant[2]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                      </div>
                      <input type="text" name="quant[2]" id="s_noChild" class="form-control form-control-sm text-center input-number border-primary text-primary" value="0" min="0" max="200">
                      <div class="input-group-append">
                          <button class="btn btn-primary btn-number border-primary" type="button" id="button-plus-max" data-type="plus" data-field="quant[2]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                      </div>
                    </div>
                  </div>
                </div> -->
                <hr>
                <div class="btn-group btn-block" role="group">
                  <button type="reset" class="btn btn-sm btn-danger" style="width:50%" onclick="resetSearch();"><i class="fas fa-eraser fa-sm"></i> Clear</button>
                  <button type="button" class="btn btn-sm btn-primary" onClick="searching();" style="width:50%"><i class="fas fa-search fa-sm"></i> Search</button>
                </div>                               
              </form>
              <hr>
              <div class="text-center"> 
                <div class="btn-group btn-block" role="group">
                  <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#agenciesModal" style="width:50%; font-size:11px;">List of Agencies</button>
                  <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#contactModal" style="width:50%; font-size:11px;">Contact Us</button>
                </div> 
              </div>
              <hr>
              <div class="text-center d-none d-sm-block">
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

    <!-- Advertisment -->
    <div class="row">

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <div class="card-body" style="font-size: 0.8rem;">
            <div class="text-center">
              <a rel="nofollow" href="http://umrahclicks.com/" target="_blank" style="font-size: 0.8rem;">
                <img class="d-block w-100" src="img/smart1-min.jpg" height="" alt="Smart Umrah4all">
              </a>
              <br>
              Smart Umrah4all Dot Com Travel & Services Sdn Bhd
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <div class="card-body" style="font-size: 0.8rem;">
            <div class="text-center">
              <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">
                <img class="d-block w-100" src="img/epl1-min.JPG" height="" alt="EPL Travel & Tours Sdn Bhd">
              </a>
              <br>
              EPL Travel & Tours Sdn Bhd
            </div> 
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card shadow mb-4">
          <div class="card-body" style="font-size: 0.8rem;">
            <div class="text-center">
              <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">
                <img class="d-block w-100" src="img/epl2-min.JPG" height="" alt="EPL Travel & Tours Sdn Bhd">
              </a>
              <br>
              EPL Travel & Tours Sdn Bhd
            </div> 
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
  <script src="js/main.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/home.js"></script>

</body>

</html>
