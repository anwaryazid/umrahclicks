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

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/main-custom.css" rel="stylesheet">
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">
  
  <style>
    .dropdown-toggle::after { 
      content: none; 
    }
    .container2 {
      padding-right: 2.5rem;
      padding-left: 2.5rem;
      margin-right: auto;
      margin-left: auto;      
    }
    .caros {
        max-width: 100%;
        min-height: 100%;
        display: block; 
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

<body class="" style="background-color: #417dc1;">
  <div class="container2 ">   
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
                  <img class="d-block caros w-100" src="img/kaabah-min.jpg">
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
                <div class="row">                  
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-6 mb-3">
                        <label class="text-md">Country</label>
                        <input type="hidden" class="form-control form-control-sm text-center border-primary text-primary" id="s_country" name="s_country" value="MY">
                        <div class="dropdown">
                          <button class="btn btn-outline-primary btn-sm btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="upload/flag/MY.png" height="16" alt="" id="countryFlag">&nbsp; <span id="countryName">MALAYSIA</span>
                          </button>
                          <div class="dropdown-menu" style="width: 100%;">
                            <?php
                            while($rows = $countryList->fetch_assoc())
                            {
                              $countryName = $rows['keterangan'];
                              $countryKod = $rows['kod'];
                              $countryImage = $rows['countryImage'];
                              echo '<a class="dropdown-item" href="#" onClick="selectCountry(\''.$countryKod.'\',\''.$countryName.'\',\''.$countryImage.'\');"><img src="upload/flag/'.$countryImage.'" height="16" alt="">&nbsp;&nbsp;'.$countryName.'&nbsp;&nbsp;</a><div class="dropdown-divider"></div>';
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label class="text-md">Departure Date</label>
                        <div class="input-group input-group-sm">   
                          <div class="input-group-prepend">
                            <span class="input-group-text input-group-addon bg-white text-primary border-primary">&nbsp;<img src="img/calendar.png" height="16" alt="">&nbsp;</span>
                          </div>
                          <input type="text" class="form-control form-control-sm border-primary border-left-0 text-primary input-date" id="s_dateDepart" name="s_dateDepart" placeholder="DD-MM-YYYY">
                        </div>
                      </div>
                    </div>                    
                  </div> 
                </div>
                <div class="row">                  
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-6 mb-3">
                        <label class="text-md">No. of Adult</label>
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary btn-number" type="button" id="button-minus-min" data-type="minus" data-field="quant[1]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                          </div>
                          <input type="text" name="quant[1]" id="s_noAdult" class="form-control form-control-sm text-center input-number border-left-0 border-right-0 border-primary text-primary" min="1" max="200" placeholder="ADULT" value="1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-number" type="button" id="button-plus-max" data-type="plus" data-field="quant[1]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label class="text-md">No. of Children</label>
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary btn-number" type="button" id="button-minus-min" data-type="minus" data-field="quant[2]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                          </div>
                          <input type="text" name="quant[2]" id="s_noChild" class="form-control form-control-sm text-center input-number border-left-0 border-right-0  border-primary text-primary" min="0" max="200" placeholder="CHILDREN" value="0">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-number" type="button" id="button-plus-max" data-type="plus" data-field="quant[2]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                          </div>
                        </div> 
                      </div>
                    </div>                    
                  </div>                 
                </div>
                <div class="form-group row">
                                  
                </div>
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
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="contactForm();" style="width:50%; font-size:11px;">Contact Us</button>
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

    <!-- Advertisement -->    
    <!-- <div class="row">
      <div class="col-sm-12">
        <div class="card shadow mb-4">
          <div class="card-body" style="font-size: 0.8rem;">
            <div class="row d-flex justify-content-center">
              <h6>Advertisement</h6>
            </div>
            <hr>
            <div class="row d-flex justify-content-center">
              <div class="col-auto">
                <div class="text-center">
                  <a rel="nofollow" href="http://umrahclicks.com/" target="_blank" style="font-size: 0.8rem;">
                    <img class="d-block w-100" src="img/smart1-min.jpg" height="180px" alt="Smart Umrah4all" style="display: block; object-fit: cover;">
                  </a>
                  <br>
                  Smart Umrah4all Dot Com Travel & Services Sdn Bhd
                </div>
              </div>
              <div class="col-auto">
                <div class="text-center">
                  <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">
                    <img class="d-block w-100" src="img/epl1-min.JPG" height="180px" alt="EPL Travel & Tours Sdn Bhd" style="display: block; object-fit: cover;">
                  </a>
                  <br>
                  EPL Travel & Tours Sdn Bhd
                </div>
              </div>
              <div class="col-auto">
                <div class="text-center">
                  <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">
                    <img class="d-block w-100" src="img/epl2-min.JPG" height="180px" alt="EPL Travel & Tours Sdn Bhd" style="display: block; object-fit: cover;">
                  </a>
                  <br>
                  EPL Travel & Tours Sdn Bhd
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>

    </div> -->

    <?php
      include('view/modal/mcontact.php');
      include('view/modal/magencies.php');
      include('view/modal/mcontact_success.php');
      include('view/modal/mcontact_error.php');
    ?>

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
