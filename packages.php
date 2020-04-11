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
  <link href="css/main.css" rel="stylesheet">
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    .btn-group-xs > .btn, .btn-xs {
      padding: .2rem .3rem;
      font-size: .875rem;
      line-height: .5;
      border-radius: .2rem;
    }

    #content {
      margin-top: 75px;
    }

  </style>

</head>

<body id="page-top">

  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column"> 
      
      <?php
        include('top-menu.php');
      ?> 

      <div id="content">  

        <div class="container-fluid ">

          <div class="row">

            <div class="col-lg-2 d-none d-xl-block">

              <!-- Filter -->
              <div class="card mb-4">
                <div class="card-header text-md" style="background-color: white;">
                  Filter By:
                </div>
                <div class="card-body">
                  <form class="">
                    <div class="row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">Price</div>
                      <div class="col-sm-12">
                        <div class="input-group input-group-sm mb-3">                          
                          <input type="text" class="form-control" id="f_price">
                          <div class="input-group-append">
                            <span class="input-group-text">MYR</span>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">Distance Makkah Hotel</div>
                      <div class="col-sm-12">
                        <div class="input-group input-group-sm mb-3">                          
                          <input type="text" class="form-control" id="f_distance_Makkah">
                          <div class="input-group-append">
                            <span class="input-group-text">m</span>
                          </div>
                        </div>
                      </div>                  
                    </div>
                    <div class="row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">Distance Madinah Hotel</div>
                      <div class="col-sm-12 input-group input-group-sm mb-3">                    
                          <input type="text" class="form-control" id="f_distance_madinah">
                          <div class="input-group-append">
                            <span class="input-group-text">m</span>
                          </div>
                      </div>                  
                    </div>
                    <div class="form-group row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">Agency</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_agency">
                      </div>                  
                    </div>
                    <div class="form-group row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">Promotion</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_promo">
                      </div>                  
                    </div>
                    <div class="form-group row" style="font-size: 13px;">
                      <div class="col-sm-12 mb-3 mb-sm-0">City</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_city">
                      </div>                  
                    </div>
                    <a href="packages.php" class="btn btn-outline-primary btn-user btn-block btn-sm">
                      <i class="fas fa-filter fa-sm"></i> Filter
                    </a>
                  </form>
                </div>
              </div>

              <!-- Advertisment -->
              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Ash-Har Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer bg-white"">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Andalusia Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer bg-white">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Andalusia Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer bg-white"">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

            </div>

            <div class="col-lg-10 col-md-12">              
              <div class="card shadow mb-4">
                <a href="#agency_1" class="d-block card-header py-3 bg-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_1" >
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary text-md">Al-Nile Tour & Travel Sdn Bhd</h6> 
                      <div style="font-size: 13px;">
                        Puchong (LKU No : 6043) <br>
                        Package Gold <br>
                        Departure Date From 31 Mac 2020 to 11 April 2020
                      </div>                      
                    </div>
                    <div class="col-lg-3" style="font-size: 12px;">
                      Customer Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                      <br>
                      Company Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3.0 stars
                      <br>
                      56 Reviews
                    </div>
                  </div>                  
                </a>
                <div class="collapse show" id="agency_1">
                  <div class="card-body text-md">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card mb-4">
                          <div class="card-body">
                            <img class="d-block w-100" src="img/elaf4.jpg">
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td width="35%"></td>
                                <td class="text-primary"><strong>Makkah</strong></td>
                                <td class="text-primary"><strong>Madinah</strong></td>
                              </tr>
                              <tr>
                                <td><strong>Hotel</strong></td>
                                <td>Elaf Al Mashaer</td>
                                <td>Ramada Al Qibla</td>
                              </tr>
                              <tr>
                                <td><strong>Days</strong></td>
                                <td>7 days</td>
                                <td>7 days</td>
                              </tr>
                              <tr>
                                <td><strong>Night</strong></td>
                                <td>7 night</td>
                                <td>7 night</td>
                              </tr>
                              <tr class="border-bottom">
                                <td><strong>Distance to Mosque</strong></td>
                                <td>250 m</td>
                                <td>250 m</td>
                              </tr>
                              <tr>
                                <td><strong>Meal</strong></td>
                                <td colspan="2">Provided</td>
                              </tr>
                              <tr class="border-bottom">
                                <td><strong>Flight</strong></td>
                                <td colspan="2">Direct</td>
                              </tr>
                              <tr>
                                <td><strong>1st Destinator</strong></td>
                                <td colspan="2">Makkah</td>
                              </tr>
                              <tr>
                                <td><strong>Ziarah</strong></td>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <td><strong>Mutawif</strong></td>
                                <td colspan="2">Celebrity Mutawif</td>
                              </tr>
                            </table>
                          </div>
                        </div>     
                      </div>
                      <div class="col-lg-6">      
                        <div class="card mb-4">
                          <div class="card-body">
                            <?php //include('view/modal/malert_booking.php'); ?>
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td class="text-primary"><strong>Room</strong></td>
                                <td class="text-primary"><strong>Price</strong></td>
                                <td></td>
                              </tr>                              
                              <tr>
                                <td><strong>Double Bed</strong><br/><small>(4 pax left)</small></td>
                                <td><strong>MYR 6,200.00</strong></td>
                                <td>
                                  <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                    Book Now
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td><strong>Triple Bed</strong><br/><small>(4 pax left)</small></td>
                                <td><strong>MYR 7,200.00</strong></td>
                                <td>
                                  <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                    Book Now
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td><strong>Quadriple Bed</strong><br/><small>(2 pax left)</small></td>
                                <td><strong>MYR 8,200.00</strong></td>
                                <td>
                                  <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                    Book Now
                                  </a>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>  
                        <div class="card mb-4">
                          <div class="card-body">
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <!-- <tr class="border-bottom">
                                <td class="text-primary" colspan="2"><strong>Promotion</strong></td>
                              </tr>     -->                          
                              <tr class="border-bottom">
                                <td class="text-primary"><strong>Promo Code</strong></td>
                                <td class="text-primary"><strong>Promo Description</strong></td>
                              </tr>
                              <tr>
                                <td>UMRAH4ALL</td>
                                <td>Get 40% Discount. Maximum amount of RM4,000.00</td>
                              </tr>
                              <tr>
                                <td>ALNILE10</td>
                                <td>Get RM10 Discount</td>
                              </tr>
                            </table>
                          </div>
                        </div>                
                        <div class="card mb-4">
                          <div class="card-header" style="background-color: white;">
                            <strong class="m-0 text-primary">Reviews (3 review)</strong> <button style="float:right" class="btn btn-sm btn-outline-success text-xs" data-toggle="modal" data-target="#reviewModal">Leave a Review</button>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars </small>
                                <br/><br/>
                                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non!</p>
                                <small class="text-muted">Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3.0 stars </small>
                                <br/><br/>
                                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                                <hr>
                                <!-- <a class="btn btn-sm btn-outline-success" href="#" data-toggle="modal" data-target="#reviewModal">
                                  Leave a Review
                                </a> -->
                                <div>
                                  <nav>
                                    <ul class="pagination pagination-sm justify-content-center">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                          <span aria-hidden="true">&laquo;</span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </nav>
                                </div>                                
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#agency_2" class="d-block card-header py-3 bg-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_2">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary text-md">Andalusia Travel & Tours Sdn Bhd</h6> 
                      <div style="font-size: 13px;">
                        Klang (LKU No : 6043) <br>
                        Package Gold <br>
                        Departure Date From 31 Mac 2020 to 11 April 2020
                      </div> 
                    </div>
                    <div class="col-lg-3" style="font-size: 12px;">
                      Customer Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                      <br>
                      Company Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3.0 stars
                      <br>
                      56 Reviews
                    </div>
                  </div>                   
                </a>
                <div class="collapse hide" id="agency_2">
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#agency_3" class="d-block card-header py-3 bg-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_3">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary text-md">Ash-Har Travel & Tours Sdn Bhd</h6> 
                      <div style="font-size: 13px;">
                        Damansara (LKU No : 6043) <br>
                        Package Gold <br>
                        Departure Date From 31 Mac 2020 to 11 April 2020
                      </div> 
                    </div>
                    <div class="col-lg-3" style="font-size: 12px;">
                      Customer Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                      <br>
                      Company Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3.0 stars
                      <br>
                      56 Reviews
                    </div>
                  </div>                   
                </a>
                <div class="collapse hide" id="agency_3">
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
              <div class="alert alert-light text-center text-md" role="alert">
                No packages has been found. 
              </div>
              <div>
                <nav>
                  <ul class="pagination pagination-sm justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UmrahClicks.my 2020</span>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Review Modal-->
  

  <!-- Include Modal-->
  <?php
    include('view/modal/mbooking0.php');
    include('view/modal/mbooking1.php');
    include('view/modal/mbooking2.php');
    include('view/modal/mreview.php');
  ?>

  <!-- <script>
    $(document).on('hidden.bs.modal', function (event) {
      if ($('.modal:visible').length) {
        $('body').addClass('modal-open');
      }
    });
  </script> -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/main.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>

  <script type="text/javascript">

    function showAlert(from, result, type) {

      /* 
        result = 1 - Success
        result = 2 - Unsuccesful 

        type = 1 - Register
        type = 2 - Update 
        type = 3 - Remove 
        type = 4 - Added
      */

      var typeText = '';
      if (type == 1) {
        var typeText = 'registered.';
      } else if (type == 2) {
        var typeText = 'updated.';
      } else if (type == 3) {
        var typeText = 'removed.';
      } else {
        var typeText = 'added.';
      }

      if (result == 1) {

        document.getElementById("textAlertSuccess").innerHTML = from+" succesfully "+typeText;
        $('#success-alert').show('fade');

        setTimeout(function () {
          $('#success-alert').hide('fade');
        }, 3000);

      } else if (result == 2) {

        document.getElementById("textAlertDanger").innerHTML = from+" unsuccesfully "+typeText;
        $('#danger-alert').show('fade');

        setTimeout(function () {
          $('#danger-alert').hide('fade');
        }, 3000);

      } else {
        alert('x');
      }
      
    }

    function closeAlert(id) {
      $('#'+id).hide('fade');
    }

    $(document).ready(function() {

      $('.modal').on('hidden.bs.modal', function () {
        if($(".modal:visible").length > 0) {
          // setTimeout(function() {
            $('body').addClass('modal-open');
          // },10)
        }
      });

    });
      
  </script>

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
