<?php
  
  date_default_timezone_set("Asia/Kuala_Lumpur");

  /* Search */
  $dateDepart = (isset($_GET['dateDepart'])) ?  $_GET['dateDepart'] : '';
  $noAdult = (isset($_GET['noAdult'])) ?  $_GET['noAdult'] : '';
  $noChild = (isset($_GET['noChild'])) ?  $_GET['noChild'] : '';
 
  /* Filter */
  $priceMin = (isset($_GET['priceMin'])) ?  $_GET['priceMin'] : '';
  $priceMax = (isset($_GET['priceMax'])) ?  $_GET['priceMax'] : '';
  $distMakkah = (isset($_GET['distMakkah'])) ?  $_GET['distMakkah'] : '';
  $distMadinah = (isset($_GET['distMadinah'])) ?  $_GET['distMadinah'] : '';
  $agency = (isset($_GET['agency'])) ?  $_GET['agency'] : '';
  $promotion = (isset($_GET['promotion'])) ?  $_GET['promotion'] : '';
  $state = (isset($_GET['state'])) ?  $_GET['state'] : '';
  $city = (isset($_GET['city'])) ?  $_GET['city'] : '';  
  
  $dateFrom = date('j F Y', strtotime($dateDepart. ' - 3 days'));
  $dateTo = date('j F Y', strtotime($dateDepart. ' + 3 days'));

  $sort = (isset($_GET['sort'])) ?  $_GET['sort'] : '';  

  $country = (isset($_GET['country'])) ?  $_GET['country'] : 'MY';  

  if ($country == 'MY') {
    $currency = 'RM';
    $currencyCode = 'MYR';
  } else if ($country == 'ID') {
    $currency = 'Rp';
    $currencyCode = 'IDR';
  } else if ($country == 'SG') {
    $currency = 'SGD';
    $currencyCode = 'SGD';
  } else if ($country == 'BN') {
    $currency = 'BND';
    $currencyCode = 'BND';
  } else {
    $currency = 'RM';
    $currencyCode = 'MYR';
  }

  function convert_currency($from,$to) {

    $from = urlencode($from);
    $to = urlencode($to);
    $url = "https://free.currconv.com/api/v7/convert?q=$from"."_"."$to&compact=ultra&apiKey=a59d7c336eddd151acdb";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:10.0) Gecko/20100101 Firefox/10.0');
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('"', $rawdata);
    $data = explode(' ', $data['1']);
    $var = $data['0'];

    $obj = json_decode($rawdata);

    return $obj->{$from.'_'.$to};
  }

  $rates = convert_currency('MYR', $currencyCode);

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
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    #content {
      margin-top: 75px;
    }

    .caros {
        max-width: 100%;
        min-height: 100%;
        display: block; /* remove extra space below image */
        object-fit: cover;
    }
    .box{
        height: 350px;        
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
            <div class="col-xl-2 col-lg-3 col-md-4">  
              <!-- Sort -->
              <div class="card mb-3">
                <a href="#sort" class="d-block card-header py-3 bg-white collapse" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sort">
                  <h6 class="m-0 text-primary" style="font-size: .8rem;"><i class="fas fa-sort-amount-down-alt fa-sm"></i>&nbsp;Sort by</h6>
                </a>
                <div class="collapse show" id="sort">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-12">
                        <button class="btn btn-sm btn-outline-primary btn-block" type="button" onClick="sorting('departureDate');">Departure Date</button>
                        <div class="btn-group btn-block" role="group">
                          <a href="#" class="btn btn-outline-primary btn-block btn-sm dropdown-toggle <?php if ($sort == 'priceLowToHigh' || $sort == 'priceHighToLow'){ ?>active<?php } ?>" data-toggle="dropdown">Price<?php if ($sort == 'priceLowToHigh'){ ?>: Low to High<?php } else if ($sort == 'priceHighToLow') { ?>: High to Low<?php } ?></a>
                          <div class="dropdown-menu" aria-labelledby="btn_price">
                            <a class="dropdown-item" href="#" onClick="sorting('priceLowToHigh');">Price: Low to High</a>
                            <a class="dropdown-item" href="#" onClick="sorting('priceHighToLow');">Price: High to Low</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
              <!-- Filter -->
              <div class="card mb-3">
                <a href="#filter" class="d-block card-header py-3 bg-white collapse" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="filter">
                  <h6 class="m-0 text-primary" style="font-size: .8rem;"><i class="fas fa-filter fa-sm"></i>&nbsp;Filter by</h6>
                </a>
                <div class="collapse show" id="filter">
                  <div class="card-body">
                    <form class="">
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Price Range (<?php echo $currency; ?>)</div>
                        <div class="col-sm-12 mb-2">
                          <div class="input-group input-group-xs">
                            <div class="input-group-prepend">
                              <button class="btn btn-outline-secondary btn-number" type="button" id="button-minus-min" data-type="minus" data-field="quant[1]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                            </div>
                            <input type="text" value="<?php echo $priceMin; ?>" name="quant[1]" class="form-control text-center input-number border-secondary" id="f_price_min" placeholder="Min" min="1" max="100000">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary btn-number" type="button" id="button-plus-min" data-type="plus" data-field="quant[1]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="input-group input-group-xs">   
                            <div class="input-group-prepend">
                              <button class="btn btn-outline-secondary btn-number" type="button" id="button-minus-max" data-type="minus" data-field="quant[2]">&nbsp;<i class="fas fa-minus fa-sm"></i>&nbsp;</button>
                            </div>
                            <input type="text" value="<?php echo $priceMax; ?>" name="quant[2]" class="form-control text-center input-number border-secondary" id="f_price_max" placeholder="Max" min="1" max="100000">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary btn-number" type="button" id="button-plus-max" data-type="plus" data-field="quant[2]">&nbsp;<i class="fas fa-plus fa-sm"></i>&nbsp;</button>
                            </div>
                          </div>
                        </div>            
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Makkah Hotel</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $distMakkah; ?>" class="form-control form-control-xs border-secondary text-center" id="f_distance_makkah">
                        </div>                 
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Madinah Hotel</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $distMadinah; ?>" class="form-control form-control-xs border-secondary text-center" id="f_distance_madinah">
                        </div>                  
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Agency</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $agency; ?>" class="form-control form-control-xs border-secondary text-center" id="f_agency">
                        </div>                  
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Promotion</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $promotion; ?>" class="form-control form-control-xs border-secondary text-center" id="f_promo">
                        </div>                  
                      </div>                    
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">State</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $city; ?>" class="form-control form-control-xs border-secondary text-center" id="f_state" onkeyup="this.value = this.value.toUpperCase();">
                        </div>                  
                      </div>
                      <div class="form-group row" style="font-size: 13px;">
                        <div class="col-sm-12">City</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $city; ?>" class="form-control form-control-xs border-secondary text-center" id="f_city" onkeyup="this.value = this.value.toUpperCase();">
                        </div>                  
                      </div>
                      <button class="btn btn-sm btn-outline-primary btn-block" type="button" onClick="filtering();"><i class="fas fa-filter fa-sm"></i> Filter</button>
                      <hr>
                      <button class="btn btn-outline-danger btn-sm btn-block" type="button" onClick="clearFilter();"><i class="fas fa-eraser fa-sm"></i> Clear All</button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Advertisment -->
              <div class="d-none d-md-block">
                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/smart1.jpg" height="" alt="Smart Umrah4all">
                    <br>
                    Smart Umrah4all Dot Com Travel & Services Sdn Bhd
                  </div>
                  <div class="card-footer bg-white">
                    <a rel="nofollow" href="http://umrahclicks.com/" target="_blank" style="font-size: 0.8rem;">Go to Page &rarr;</a>
                  </div>
                </div>

                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/epl1.JPG" height="">
                    <br>
                    EPL Travel & Tours Sdn Bhd
                  </div>
                  <div class="card-footer bg-white">
                    <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">Go to Page &rarr;</a>
                  </div>
                </div>

                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/epl2.JPG" height="">
                    <br>
                    EPL Travel & Tours Sdn Bhd
                  </div>
                  <div class="card-footer bg-white">
                    <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">Go to Page &rarr;</a>
                  </div>
                </div>
              </div>              

            </div>

            <!-- Packages -->
            <div class="col-xl-10 col-lg-9 col-md-8">  

              <!-- Search Info -->
              <div class="alert alert-light bg-white text-primary" style="font-size: .7rem;">
                Search result for Departure Date <br class="d-block d-sm-none"><?php echo $dateFrom; ?> - <?php echo $dateTo; ?> <!-- (+- 3 days) -->
              </div>                
                   
              <!-- Package 1 -->
              <div class="card mb-3">
                <a href="#agency_1" class="d-block card-header py-3 bg-white text-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_1" >
                  <div class="row">
                    <div class="col-xl-9 col-lg-8">
                      <h6 class="m-0 font-weight-bold text-primary text-md">Smart Umrah4all Dot Com Travel & Services Sdn Bhd</h6> 
                      <div class="text-primary" style="font-size: 13px;">
                        Cyberjaya (LKU No: KPK/LN 9774) <br>
                        Package Gold <br>
                        Departure Date from 2 April 2020 to 10 April 2020
                      </div>                      
                    </div>
                    <div class="col-xl-3 col-lg-4" style="font-size: 12px;">
                      Customer Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4 stars
                      <br>
                      Company Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3 stars
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
                            <!-- <img class="d-block w-100" src="img/kaabah.jpg"> -->
                            <div id="imgIndicator" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator" data-slide-to="1"></li>
                                <li data-target="#imgIndicator" data-slide-to="2"></li>
                                <li data-target="#imgIndicator" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block w-100 caros" src="img/elaf/elaf1.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Elaf Al Mashaer Hotel, Makkah</h5>
                                    <p></p>
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/standard.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Standard Single Room</h5>
                                    <p>Elaf Al Mashaer Hotel, Makkah</p>
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/junior.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Junior Suite Room</h5>
                                    <p>Elaf Al Mashaer Hotel, Makkah</p>
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/quadruple.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Quadruple Room</h5>
                                    <p>Elaf Al Mashaer Hotel, Makkah</p>
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
                            </div>
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td></td>
                                <td class="text-gray-900 d-none d-sm-block"></td>
                                <td class="text-primary"><strong>Makkah</strong></td>
                                <td class="text-primary"><strong>Madinah</strong></td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-bed"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Hotel</span></td>
                                <td>Elaf Al Mashaer</td>
                                <td>Ramada Al Qibla</td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-sun"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Days</span></td>
                                <td>7 days</td>
                                <td>7 days</td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-moon"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Night</span></td>
                                <td>7 night</td>
                                <td>7 night</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="text-primary"><i class="fas fa-fw fa-mosque"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Distance to Mosque</span></td>
                                <td>250 m</td>
                                <td>250 m</td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-utensils"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Meal</span></td>
                                <td colspan="2">Provided</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="text-primary"><i class="fas fa-fw fa-plane"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Flight</span></td>
                                <td colspan="2">Direct</td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-map-marker-alt"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">1st Destination</span></td>
                                <td colspan="2">Makkah</td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-walking"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Ziarah</span></td>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <td class="text-primary"><i class="fas fa-fw fa-male"></i></td>
                                <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Mutawif</span></td>
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
                                <td>Double Bed<br/><small>(4 pax left)</small></td>
                                <td>
                                  <?php echo $currency; ?>
                                  <?php 
                                    $amount = 6200 * $rates; 
                                    echo number_format($amount, 2);
                                  ?>
                                </td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Triple Bed<br/><small>(4 pax left)</small></td>
                                <td>
                                  <?php echo $currency; ?>
                                  <?php 
                                    $amount = 7200 * $rates; 
                                    echo number_format($amount, 2);
                                  ?>
                                </td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Quadruple Bed<br/><small>(0 pax left)</small></td>
                                <td>
                                  <?php echo $currency; ?>
                                  <?php 
                                    $amount = 8200 * $rates; 
                                    echo number_format($amount, 2);
                                  ?>
                                </td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal" disabled>Book Now</button>
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
                                <td>Get 40% Discount. Maximum amount of <?php echo $currency; ?>4,000.00</td>
                              </tr>
                              <tr>
                                <td>SMART10</td>
                                <td>Get <?php echo $currency; ?>10 Discount</td>
                              </tr>
                            </table>
                          </div>
                        </div>                
                        <div class="card mb-4">
                          <div class="card-header" style="background-color: white;">
                            <strong class="m-0 text-primary">Reviews (3 review)</strong> <button style="float:right" class="btn btn-sm btn-outline-primary text-xs" data-toggle="modal" data-target="#reviewModal">Leave a Review</button>
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

              <!-- Package 2 -->
              <div class="card mb-3">
                <a href="#agency_2" class="d-block card-header py-3 bg-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_2" >
                  <div class="row">
                    <div class="col-lg-9">
                      <h6 class="m-0 font-weight-bold text-primary text-md">EPL Travel and Tours Sdn Bhd</h6> 
                      <div class="text-primary" style="font-size: 13px;">
                        Kajang (LKU No: KP/LN 6441) <br>
                        Package Gold <br>
                        Departure Date from 1 April 2020 to 10 April 2020
                      </div>                      
                    </div>
                    <div class="col-lg-3" style="font-size: 12px;">
                      Customer Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4 stars
                      <br>
                      Company Rating : <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span> 3 stars
                      <br>
                      56 Reviews
                    </div>
                  </div>                  
                </a>
                <div class="collapse show" id="agency_2">
                  <div class="card-body text-md">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card mb-4">
                          <div class="card-body">
                            <!-- <img class="d-block w-100 caros" src="img/epl3.jpg"> -->
                            <div id="imgIndicator2" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator2" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator2" data-slide-to="1"></li>
                                <li data-target="#imgIndicator2" data-slide-to="2"></li>
                                <li data-target="#imgIndicator2" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block w-100 caros" src="img/ramada/ramada1.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Ramada Al Qibla, Madinah</h5>
                                    <!-- <p>Lobby</p> -->
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/standard.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Standard Single Room</h5>
                                    <p>Ramada Al Qibla, Madinah</p>
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/junior.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Junior Suite Room</h5>
                                    <p>Ramada Al Qibla, Madinah</p>
                                  </div>
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/quadruple.jpg">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>Quadruple Room</h5>
                                    <p>Ramada Al Qibla, Madinah</p>
                                  </div>
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#imgIndicator2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#imgIndicator2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td></td>
                                <td class="text-gray-900 d-none d-sm-block"></td>
                                <td class="text-primary"><strong>Makkah</strong></td>
                                <td class="text-primary"><strong>Madinah</strong></td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-bed"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Hotel</span></td>
                                <td>Elaf Al Mashaer</td>
                                <td>Ramada Al Qibla</td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-sun"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Days</span></td>
                                <td>7 days</td>
                                <td>7 days</td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-moon"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Night</span></td>
                                <td>7 night</td>
                                <td>7 night</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="text-gray-900"><i class="fas fa-fw fa-mosque"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Distance to Mosque</span></td>
                                <td>250 m</td>
                                <td>250 m</td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-utensils"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Meal</span></td>
                                <td colspan="2">Provided</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="text-gray-900"><i class="fas fa-fw fa-plane"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Flight</span></td>
                                <td colspan="2">Direct</td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-map-marker-alt"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">1st Destination</span></td>
                                <td colspan="2">Makkah</td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-walking"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Ziarah</span></td>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <td class="text-gray-900"><i class="fas fa-fw fa-male"></i></td>
                                <td class="text-gray-900 d-none d-sm-block"><span class="d-none d-sm-block">Mutawif</span></td>
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
                                <td>Double Bed<br/><small>(4 pax left)</small></td>
                                <td>
                                  <?php echo $currency; ?>
                                  <?php 
                                    $amount = 6200 * $rates; 
                                    echo number_format($amount, 2);
                                  ?>
                                </td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Triple Bed<br/><small>(4 pax left)</small></td>
                                <td><?php echo $currency; ?> 7,200.00</td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Quadruple Bed<br/><small>(2 pax left)</small></td>
                                <td><?php echo $currency; ?> 8,200.00</td>
                                <td>
                                  <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book Now</button>
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
                                <td>Get 40% Discount. Maximum amount of <?php echo $currency; ?>4,000.00</td>
                              </tr>
                              <tr>
                                <td>SMART10</td>
                                <td>Get <?php echo $currency; ?>10 Discount</td>
                              </tr>
                            </table>
                          </div>
                        </div>                
                        <div class="card mb-4">
                          <div class="card-header" style="background-color: white;">
                            <strong class="m-0 text-primary">Reviews (3 review)</strong> <button style="float:right" class="btn btn-sm btn-outline-primary text-xs" data-toggle="modal" data-target="#reviewModal">Leave a Review</button>
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

              <!-- If Not Found -->
              <div class="alert alert-light bg-white text-primary text-center" style="font-size: .9rem;">
              <!-- <div class="alert alert-light text-center text-md" role="alert"> -->
                No package has been found. 
              </div>

              <!-- Pagination -->
              <div>
                <nav>
                  <ul class="pagination pagination-sm justify-content-center">
                    <li class="page-item disabled">                      
                      <a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">                      
                      <a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/main.js"></script>
  <script src="js/search.js"></script>

</body>

</html>
