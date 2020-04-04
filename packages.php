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

    .sinput {
      /* outline: 0;
      border-width: 0 0 2px;
      border-color: blue */
      border:none; border-bottom: 1px solid white; color: white;
    }
    .sinput:focus {
      border-color: blue
    }
    
    /* #content {
      margin-top: 55px;
    }

    .fix-top {
      overflow: hidden;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 99;
    } */

  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"> 
      
      <?php
        include('top-menu.php');
      ?> 

      <div id="content">  

        <div class="container-fluid ">

          <!-- <h1 class="h3 mb-4 text-gray-800">Packages</h1> -->

          <div class="row">

            <div class="col-lg-2 d-none d-xl-block">

              <div class="card mb-4">
                <div class="card-header">
                  Filter By:
                </div>
                <div class="card-body">
                  <form class="">
                    <div class="row text-md">
                      <div class="col-sm-12 mb-3 mb-sm-0">Price</div>
                      <div class="col-sm-12">
                        <div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RM</span>
                          </div>
                          <input type="text" class="form-control" id="f_price">
                        </div>
                      </div>                  
                    </div>
                    <div class="row text-md">
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
                    <div class="row text-md">
                      <div class="col-sm-12 mb-3 mb-sm-0">Distance Madinah Hotel</div>
                      <div class="col-sm-12 input-group input-group-sm mb-3">                    
                          <input type="text" class="form-control" id="f_distance_madinah">
                          <div class="input-group-append">
                            <span class="input-group-text">m</span>
                          </div>
                      </div>                  
                    </div>
                    <div class="form-group row text-md">
                      <div class="col-sm-12 mb-3 mb-sm-0">Agency</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_agency">
                      </div>                  
                    </div>
                    <div class="form-group row text-md">
                      <div class="col-sm-12 mb-3 mb-sm-0">Promotion</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_promo">
                      </div>                  
                    </div>
                    <div class="form-group row text-md">
                      <div class="col-sm-12 mb-3 mb-sm-0">City</div>
                      <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" id="f_city">
                      </div>                  
                    </div>
                    <a href="package.html" class="btn btn-outline-primary btn-user btn-block btn-sm">
                      <i class="fas fa-filter fa-sm"></i> Filter
                    </a>
                  </form>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Ash-Har Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Andalusia Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body" style="font-size: 0.7rem;">
                  <img class="d-block w-100" src="img/elaf2.jpg" height="">
                  <br>
                  Andalusia Travel & Tours Sdn Bhd
                </div>
                <div class="card-footer">
                  <a rel="nofollow" href="packages.php" style="font-size: 0.8rem;">View Packages &rarr;</a>
                </div>
              </div>

            </div>

            <div class="col-lg-10 col-md-12">

              <div class="card shadow mb-4">
                <a href="#agency_1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_1">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary">Al-Nile Tour & Travel Sdn Bhd</h6> 
                      Puchong (LKU No : 6043) <br>
                      Package Gold <br>
                      Departure Date From 31 Mac 2020 to 11 April 2020
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
                            <div class="row">
                              <div class="col-md-4">
                                
                              </div>
                              <div class="col-md-4 text-primary">
                                <strong>Makkah</strong>
                              </div>
                              <div class="col-md-4 text-primary">
                                <strong>Madinah</strong>                                
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Hotel</strong>
                              </div>
                              <div class="col-md-4">
                                Elaf Al Mashaer
                              </div>
                              <div class="col-md-4">
                                Ramada Al Qibla
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Days</strong>                                
                              </div>
                              <div class="col-md-4">
                                7 days
                              </div>
                              <div class="col-md-4">
                                7 days
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Night</strong> 
                              </div>
                              <div class="col-md-4">
                                7 night
                              </div>
                              <div class="col-md-4">
                                7 night
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Distance to Mosque</strong> 
                              </div>
                              <div class="col-md-4">
                                250 m
                              </div>
                              <div class="col-md-4">
                                250 m
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Meal</strong> 
                              </div>
                              <div class="col-md-4">
                                Provided
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Flight</strong> 
                              </div>
                              <div class="col-md-4">
                                Direct
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>1st Destinatior</strong> 
                              </div>
                              <div class="col-md-4">
                                Makkah
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Ziarah</strong>                                 
                              </div>
                              <div class="col-md-4">
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Mutawif</strong> 
                              </div>
                              <div class="col-md-4">
                                Celebrity Mutawif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4 text-primary">
                                <strong>Room</strong>
                              </div>
                              <div class="col-md-4 text-primary">
                                <strong>Price</strong>
                              </div>
                              <div class="col-md-4">
                                                              
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Double Bed</strong><br>
                                (4 pax left)
                              </div>
                              <div class="col-md-4">
                                <strong>RM 6,200.00</strong>
                              </div>
                              <div class="col-md-4">
                                <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                  <!-- <i class="fas fa-lock fa-sm"></i> --> Book Now
                                </a>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Triple Bed</strong><br>
                                (1 pax left)
                              </div>
                              <div class="col-md-4">
                                <strong>RM 7,200.00</strong>
                              </div>
                              <div class="col-md-4">
                                <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                  Book Now
                                </a>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Quadriple Bed</strong><br>
                                (2 pax left)
                              </div>
                              <div class="col-md-4">
                                <strong>RM 8,200.00</strong>
                              </div>
                              <div class="col-md-4">
                                <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal" data-target="#bookingModal">
                                  Book Now
                                </a>
                              </div>
                            </div>                       
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 text-primary">
                                <strong><i class="fas fa-certificate fa-sm"></i> Promotion</strong>
                              </div>
                            </div> 
                            <hr>
                            <div class="row">
                              <div class="col-md-4">
                                <strong>Promo Code</strong>
                              </div>
                              <div class="col-md-8">
                                <strong>Promo Description</strong>
                              </div>                              
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                UMRAH4ALL
                              </div>
                              <div class="col-md-8">
                                Get 40% Discount. Maximum amount of RM4,000.00
                              </div>                              
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                ALNILE10
                              </div>
                              <div class="col-md-8">
                                Get RM10 Discount
                              </div>                              
                            </div>  
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                ALNILE15
                              </div>
                              <div class="col-md-8">
                                Get 15% Discount
                              </div>                              
                            </div> 
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card mb-4">
                          <div class="card-body">
                            <img class="d-block w-100" src="img/elaf4.jpg" height="350px">
                            <!-- <div id="imgIndicator" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator" data-slide-to="1"></li>
                                <li data-target="#imgIndicator" data-slide-to="2"></li>
                                <li data-target="#imgIndicator" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="img/elaf4.jpg" height="350px">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Makkah</h5>
                                    <p>Elaf Al Mashaer Hotel</p>
                                  </div>
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="img/elaf2.jpg" height="350px">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Makkah</h5>
                                    <p>Elaf Al Mashaer Hotel</p>
                                  </div>
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="img/elaf3.jpg" height="350px">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Makkah</h5>
                                    <p>Elaf Al Mashaer Hotel</p>
                                  </div>
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="img/elaf1.jpg" height="350px">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Makkah</h5>
                                    <p>Elaf Al Mashaer Hotel</p>
                                  </div>
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
                            </div> -->
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-header">
                            <strong class="m-0 text-primary">Reviews (3 review)</strong>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars </small>
                                <br/><br/>
                                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3.0 stars </small>
                                <br/><br/>
                                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span> 5.0 stars </small>
                                <br/><br/>
                                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                                <hr>
                                <a class="btn btn-sm btn-outline-success" href="#" data-toggle="modal" data-target="#reviewModal">
                                  Leave a Review
                                </a>
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
                <a href="#agency_2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_2">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary">Andalusia Travel & Tours Sdn Bhd</h6> 
                      Klang (LKU No : 6044) <br>
                      Package Gold <br>
                      Departure Date From 31 Mac 2020 to 11 April 2020
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
                <a href="#agency_3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_3">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary">Ash-Har Travel & Tours Sdn Bhd</h6> 
                      Damansara (LKU No : 6045) <br>
                      Package Gold <br>
                      Departure Date From 31 Mac 2020 to 11 April 2020
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
              <div class="card shadow mb-4">
                <a href="#agency_4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_4">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary">Batuta Travel & Tours Sdn Bhd</h6> 
                      Cheras (LKU No : 6046) <br>
                      Package Gold <br>
                      Departure Date From 31 Mac 2020 to 11 April 2020
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
                <div class="collapse hide" id="agency_4">
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#agency_5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_5">
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary">Beststar Travel Centre Sdn Bhd</h6> 
                      Cyberjaya (LKU No : 6047) <br>
                      Package Gold <br>
                      Departure Date From 31 Mac 2020 to 11 April 2020
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
                <div class="collapse hide" id="agency_5">
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UmrahClicks.my 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Review Modal-->
  <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Review</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Review:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
          <form>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Rating</label>
              <select class="form-control" id="rating">
                <option value="">Please Select</option>
                <option value="1">1 star</option>
                <option value="2">2 star</option>
                <option value="3">3 star</option>
                <option value="4">4 star</option>
                <option value="5">5 star</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="#">Submit</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Modal-->
  <?php
    include('view/modal/mbooking.php');
    include('view/modal/madd_person.php');
    include('view/modal/mpayment.php');
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
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
