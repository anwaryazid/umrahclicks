<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

require("lib/conn.php"); 

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
$promo = (isset($_GET['promo'])) ?  $_GET['promo'] : '';  
$rating = (isset($_GET['rating'])) ?  $_GET['rating'] : '';  

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
  <link href="css/search.css" rel="stylesheet">

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
                            
              <!-- Filter -->
              <div class="card mb-3 d-sm-none d-md-block">
                <a href="#filter" class="d-block card-header py-3 bg-white collapse" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="filter">
                  <h6 class="m-0 text-primary" style="font-size: .8rem;"><i class="fas fa-filter fa-sm"></i>&nbsp;Filter by</h6>
                </a>
                <div class="collapse show" id="filter">
                  <div class="card-body">
                    <form class="">
                      <!-- <div class="form-row form-group" style="font-size: 13px;">
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
                      </div> -->
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Price</div>
                        <div class="col-sm-12">
                          <div class="input-group input-group-xs">  
                            <div class="input-group-prepend">
                              <span class="input-group-text input-group-addon bg-white text-primary border-secondary">&nbsp;<strong><?php echo $currency; ?></strong>&nbsp;</span>
                            </div>  
                            <input type="text" value="<?php echo $priceMax; ?>" class="form-control form-control-xs border-secondary text-center input-number text-primary" id="f_price_max">
                          </div>
                        </div>                 
                        </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Makkah Hotel</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs border-secondary text-center text-primary" id="f_distance_makkah">
                            <option value=""></option>
                            <option value="1" <?php if($distMakkah == 1) {?> selected <?php } ?>>< 50m</option>
                            <option value="2" <?php if($distMakkah == 2) {?> selected <?php } ?>>50 - 100m</option>
                            <option value="3" <?php if($distMakkah == 3) {?> selected <?php } ?>>100 - 400m</option>
                            <option value="4" <?php if($distMakkah == 4) {?> selected <?php } ?>>400m ></option>
                          </select>
                        </div>                 
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Madinah Hotel</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs border-secondary text-center text-primary" id="f_distance_madinah">
                            <option value=""></option>
                            <option value="1" <?php if($distMadinah == 1) {?> selected <?php } ?>>< 50m</option>
                            <option value="2" <?php if($distMadinah == 2) {?> selected <?php } ?>>50 - 100m</option>
                            <option value="3" <?php if($distMadinah == 3) {?> selected <?php } ?>>100 - 400m</option>
                            <option value="4" <?php if($distMadinah == 4) {?> selected <?php } ?>>400m ></option>
                          </select>
                        </div>                 
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Agency</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $agency; ?>" class="form-control form-control-xs border-secondary text-center text-primary" id="f_agency" onkeyup="this.value = this.value.toUpperCase();">
                        </div>                  
                      </div>                   
                      <?php $stateList = $conn->query("SELECT * FROM ref_state WHERE kod NOT IN ('15','98','99') ORDER BY keterangan")?>  
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">State</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs text-center border-secondary text-primary" id="f_state" name="f_state">
                            <option value="" selected></option>
                            <?php
                            while($rows = $stateList->fetch_assoc())
                            {
                              $stateName = $rows['keterangan'];
                              $stateKod = $rows['kod'];
                              ($state == $stateKod) ? $selected = "selected" : $selected = "";
                              echo "<option value='$stateKod' $selected>$stateName</option>";
                            }
                            ?>
                          </select>
                        </div>                  
                      </div>
                      <div class="form-group row" style="font-size: 13px;">
                        <div class="col-sm-12">City</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $city; ?>" class="form-control form-control-xs border-secondary text-center text-primary" id="f_city" onkeyup="this.value = this.value.toUpperCase();">
                        </div>                  
                      </div>
                      <hr>
                      <button class="btn btn-sm btn-outline-primary btn-block" type="button" onClick="filtering();"><i class="fas fa-filter fa-sm"></i> Filter</button>
                      <hr>
                      <button class="btn btn-outline-danger btn-sm btn-block" type="button" onClick="clearFilter();"><i class="fas fa-eraser fa-sm"></i> Clear All</button>
                      <hr>
                      <div class="mb-1" style="font-size: 13px;">
                        <span>Promotion</span>
                      </div>
                      <div>
                        <button class="btn btn-sm btn-outline-primary btn-block <?php if (strpos($promo, 'umrah4all') !== false){ ?>active<?php } ?>" type="button" onClick="filterPromo('umrah4all');" style="font-size: 12px;">Umrah4All</button>
                        <button class="btn btn-sm btn-outline-primary btn-block <?php if (strpos($promo, 'smart10') !== false){ ?>active<?php } ?>" type="button" onClick="filterPromo('smart10');" style="font-size: 12px;">Smart10</button>
                      </div>
                      <hr>
                      <div class="mb-1" style="font-size: 13px;">
                        <span>Rating</span>
                      </div>
                      <button class="btn btn-sm btn-outline-primary btn-block text-left border-0 <?php if ($rating=='5') { ?>active<?php } ?>" type="button" style="font-size: 12px;" onClick="filterRating(5);" id="f_5star">
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-primary btn-block text-left border-0 <?php if ($rating=='4') { ?>active<?php } ?>" type="button" style="font-size: 12px;" onClick="filterRating(4);" id="f_4star">
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <span>++</span>
                      </button>
                      <button class="btn btn-sm btn-outline-primary btn-block text-left border-0 <?php if ($rating=='3') { ?>active<?php } ?>" type="button" style="font-size: 12px;" onClick="filterRating(3);" id="f_3star">
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <span>++</span>
                      </button>
                      <button class="btn btn-sm btn-outline-primary btn-block text-left border-0 <?php if ($rating=='2') { ?>active<?php } ?>" type="button" style="font-size: 12px;" onClick="filterRating(2);" id="f_2star">
                        <i class="fas fa-star fa-sm"></i>
                        <i class="fas fa-star fa-sm"></i>
                        <span>++</span>
                      </button>
                      <button class="btn btn-sm btn-outline-primary btn-block text-left border-0 <?php if ($rating=='1') { ?>active<?php } ?>" type="button" style="font-size: 12px;" onClick="filterRating(1);" id="f_1star">
                        <i class="fas fa-star fa-sm"></i>
                        <span>++</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Advertisment -->
              <div class="d-none d-md-block">
                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/smart1-min.jpg" height="" alt="Smart Umrah4all">
                    <br>
                    Smart Umrah4all Dot Com Travel & Services Sdn Bhd
                  </div>
                  <div class="card-footer bg-white">
                    <a rel="nofollow" href="http://umrahclicks.com/" target="_blank" style="font-size: 0.8rem;">Go to Page &rarr;</a>
                  </div>
                </div>

                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/epl1-min.JPG" height="">
                    <br>
                    EPL Travel & Tours Sdn Bhd
                  </div>
                  <div class="card-footer bg-white">
                    <a rel="nofollow" href="http://epltravel.blogspot.com/" target="_blank" style="font-size: 0.8rem;">Go to Page &rarr;</a>
                  </div>
                </div>

                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <img class="d-block w-100" src="img/epl2-min.JPG" height="">
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
                Search result for Departure Date <br class="d-block d-sm-none"><span class="font-weight-bolder"><?php echo $dateFrom; ?> - <?php echo $dateTo; ?></span>
              </div>  

              <!-- Sort -->
              <div class="alert alert-light bg-white text-primary" style="font-size: .8rem;">
                <div class="row">
                  <div class="col-auto">              
                    <span class="align-middle"><i class="fas fa-sort-amount-down-alt fa-sm"></i>&nbsp;Sort by</span>&nbsp; &nbsp;
                    <!-- <br class="d-block d-xs-block d-md-block d-lg-none"> -->
                    <!-- <button class="btn btn-sm text-primary" type="button" style="font-size: 12px;"><i class="fas fa-sort-amount-down-alt fa-sm"></i>&nbsp;Sort by</button> -->
                    <!-- <button class="btn btn-sm btn-outline-primary mt-1 <?php if ($sort == 'departureDate'){ ?>active<?php } ?>" type="button" onClick="sorting('departureDate');" style="font-size: 12px;"><span class="d-none d-sm-block">Departure</span> Date</button> -->
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'priceLowToHigh'){ ?>active<?php } ?>" type="button" onClick="sorting('priceLowToHigh');" style="font-size: 12px;">Lowest Price</span></button>
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'latest'){ ?>active<?php } ?>" type="button" onClick="sorting('latest');" style="font-size: 12px;">Latest</span></button>
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'popular'){ ?>active<?php } ?>" type="button" onClick="sorting('popular');" style="font-size: 12px;">Popular</button>
                  </div>
                </div>
              </div>              
                   
              <!-- Package 1 -->
              <?php
                $minAmount = 6000 * $rates;
                $maxAmount = 8500 * $rates;
                $hasDiscount = true;
                if ($hasDiscount) {
                  $discount = 0.2;                                     
                  $amountMinDiscount = $minAmount * $discount;
                  $amountMinAfterDiscount = $minAmount - $amountMinDiscount;
                  $amountMaxDiscount = $maxAmount * $discount;
                  $amountMaxAfterDiscount = $maxAmount - $amountMaxDiscount;
                }
              ?>
              <div class="card mb-3">
                <div class="thumb-xs d-block d-sm-none">
                  <img class="thumb-img-xs float-left" src="img/kaabah-min.jpg" >
                </div>
                <a href="#agency_1" class="d-block card-header py-3 bg-white text-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_1" >
                  <div class="row">
                    <div class="col-auto d-none d-lg-block d-xl-block thumb float-lg-left">
                      <img class="thumb-img" src="img/kaabah-min.jpg" >
                    </div>
                    <div class="col-xl-7 col-lg-8">
                      <h6 class="m-0 font-weight-bold text-primary text-md">Smart Umrah4all Dot Com Travel & Services Sdn Bhd</h6> 
                      <div class="text-primary" style="font-size: 13px;">
                        Cyberjaya (LKU No: KPK/LN 9774) <br>
                        Package Gold <span class="badge badge-info align-text-middle">New!</span><br>
                        Departure Date from 2 April 2020 to 10 April 2020<br>
                        <div class="row">
                          <div class="col-md-12">
                            <?php if ($hasDiscount) { ?>
                              <span class="text-secondary"><small><del><?php echo $currency . '' .number_format($minAmount, 2) ?>-<?php echo $currency . '' .number_format($maxAmount, 2) ?></del></small></span>&nbsp;<br class="d-block d-sm-none">
                              <span class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($amountMinAfterDiscount, 2) ?>-<?php echo $currency . '' .number_format($amountMaxAfterDiscount, 2) ?></span>&nbsp;<br class="d-block d-sm-none">
                              <span class="badge badge-danger align-text-top">20% OFF</span>
                            <?php } else { ?>
                              <h6 class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($minAmount, 2) ?> - <?php echo $currency . '' .number_format($maxAmount, 2) ?></h6> 
                            <?php } ?>  
                            <span class="badge badge-primary align-text-top">UMRAH4ALL</span>                        
                          </div>                        
                        </div>                        
                      </div>   
                      <table class="d-none d-lg-block d-xl-none" cellpadding="1" cellspacing="3" style="font-size: 11px;">
                        <tr>
                          <td>Customer Rating</td>
                          <td class="text-center">:&nbsp;&nbsp;</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></td>
                          <td>3 ratings</td>
                        </tr>
                        <tr>
                          <td>Company Rating</td>
                          <td>:</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          <td></td>
                        </tr>
                      </table>                 
                    </div>
                    <div class="col-xl-3 d-lg-none d-xl-block" style="font-size: 11px;">
                      <table cellpadding="1" cellspacing="3">
                        <tr>
                          <td>Customer Rating</td>
                          <td class="text-center">:&nbsp;&nbsp;</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></td>
                          <td>3 ratings</td>
                        </tr>
                        <tr>
                          <td>Company Rating</td>
                          <td>:</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          <td></td>
                        </tr>
                      </table>           
                    </div>
                  </div>                  
                </a>
                <div class="collapse hide" id="agency_1">
                  <div class="card-body text-md">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <!-- Package Details -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Package Detail</strong>
                          </div>
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
                        <!-- Rating -->
                        <div class="card mb-4 d-none d-xl-block">
                          <div class="card-header" style="background-color: white;">
                            <strong class="m-0 text-primary">Ratings (3 ratings)</strong> <!-- <button style="float:right" class="btn btn-sm btn-outline-primary text-xs" data-toggle="modal" data-target="#ratingModal">Leave a Rating</button> -->
                          </div>
                          <div class="card-body">
                            <div class="row h-100">
                              <div class="col-auto text-center my-auto">
                                <span class="text-primary">4.5 out of 5</span><br/>
                                <small><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></small>
                              </div>  
                              <div class="col-auto my-auto">  
                                <button class="btn btn-sm btn-outline-primary active" type="button" style="font-size: 12px;" onClick="viewRating(1,0);" id="v_allStar">&nbsp;All&nbsp;</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,5);" id="v_5star">5 Star (3)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,4);" id="v_4star">4 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,3);" id="v_3star">3 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,2);" id="v_2star">2 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,1);" id="v_1star">1 Star (0)</button>                
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 4 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Abu on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non!</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 5 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Bakar on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non!</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 5 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Ela on 3/1/17</small>
                                <hr>
                                <!-- <a class="btn btn-sm btn-outline-success" href="#" data-toggle="modal" data-target="#ratingModal">
                                  Leave a Rating
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
                      <div class="col-xl-6 col-lg-12">  
                        <!-- Room and Price Information -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Room & Price Information</strong>
                          </div>
                          <div class="card-body">                            
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td class="text-primary"><strong>Room</strong></td>
                                <td class="text-primary"><strong>Price</strong></td>
                                <td></td>
                              </tr>                              
                              <tr class="border-bottom">
                                <td class="align-middle">Double Bed <br><small>(4 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = true;
                                    $amount = 6000 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-secondary"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle" width="120px">
                                  <!-- <div class="input-group input-group-sm">
                                    <div class="input-group-prepend" id="button-addon4">
                                      <button class="btn btn-outline-secondary" type="button"><i class="fas fa-minus fa-sm"></i></button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" size="2">
                                    <div class="input-group-append" id="button-addon4">
                                      <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus fa-sm"></i></button>
                                    </div>
                                  </div> -->
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                </td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="align-middle">Triple Bed <br><small>(4 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = true;
                                    $amount = 7200 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-secondary"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle">
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                </td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="align-middle">Quadruple Bed <br><small class="text-danger">(0 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = true;
                                    $amount = 8500 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-secondary"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle">
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;" disabled>Book Now</button>
                                </td>
                              </tr>
                            </table>
                            <?php if ($hasDiscount) { ?>
                            <div class="alert text-center text-danger border-danger mt-3" style="font-size: .8rem;" role="alert">
                              <strong>UMRAH4ALL : 20% off today only!</strong>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                        <!-- Image Hotel Makkah -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Hotel Elaf Al Mashaer, Makkah</strong>
                          </div>
                          <div class="card-body">                                     
                            <div id="imgIndicator" class="carousel slide mb-3" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator" data-slide-to="1"></li>
                                <li data-target="#imgIndicator" data-slide-to="2"></li>
                                <li data-target="#imgIndicator" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block caros" src="img/elaf/elaf1-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/standard-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/junior-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/quadruple-min.jpg">
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
                        <!-- Image Hotel Madinah -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Hotel Ramada Al Qibla, Madinah</strong>
                          </div>
                          <div class="card-body">                                     
                            <div id="imgIndicator2" class="carousel slide mb-3" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator2" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator2" data-slide-to="1"></li>
                                <li data-target="#imgIndicator2" data-slide-to="2"></li>
                                <li data-target="#imgIndicator2" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block caros" src="img/ramada/ramada1-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/standard-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/junior-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/quadruple-min.jpg">
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
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>

              <?php
                $minAmount = 5500 * $rates;
                $maxAmount = 7500 * $rates;
                $hasDiscount = false;
                if ($hasDiscount) {
                  $discount = 0.2;                                     
                  $amountMinDiscount = $minAmount * $discount;
                  $amountMinAfterDiscount = $minAmount - $amountMinDiscount;
                  $amountMaxDiscount = $maxAmount * $discount;
                  $amountMaxAfterDiscount = $maxAmount - $amountMaxDiscount;
                }
              ?>
              <!-- Package 2 -->
              <div class="card mb-3">
                <div class="thumb-xs d-block d-sm-none">
                  <img class="card-img-top thumb-img-xs" src="img/epl3-min.jpg" >
                </div>
                <a href="#agency_2" class="d-block card-header py-3 bg-white" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agency_2" >
                  <div class="row">
                    <div class="col-auto d-none d-lg-block d-xl-block thumb float-lg-left">
                      <img class="thumb-img" src="img/epl3-min.jpg" >
                    </div>
                    <div class="col-xl-7 col-lg-8">
                      <h6 class="m-0 font-weight-bold text-primary text-md">EPL Travel and Tours Sdn Bhd</h6> 
                      <div class="text-primary" style="font-size: 13px;">
                        Kajang (LKU No: KP/LN 6441) <br>
                        Package Gold <br>
                        Departure Date from 1 April 2020 to 10 April 2020<br>
                        <div class="row">
                          <div class="col-md-12">
                            <?php if ($hasDiscount) { ?>
                              <span class="text-secondary"><small><del><?php echo $currency . '' .number_format($minAmount, 2) ?>-<?php echo $currency . '' .number_format($maxAmount, 2) ?></del></small></span>&nbsp; 
                              <span class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($amountMinAfterDiscount, 2) ?>-<?php echo $currency . '' .number_format($amountMaxAfterDiscount, 2) ?></span>&nbsp;
                              <span class="badge badge-danger align-text-top">20% OFF</span></small>
                            <?php } else { ?>
                              <h6 class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($minAmount, 2) ?> - <?php echo $currency . '' .number_format($maxAmount, 2) ?></h6> 
                            <?php } ?>                          
                          </div>                        
                        </div> 
                      </div>   
                      <table class="d-none d-lg-block d-xl-none" cellpadding="1" cellspacing="3" style="font-size: 11px;">
                        <tr>
                          <td>Customer Rating</td>
                          <td class="text-center">:&nbsp;&nbsp;</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></td>
                          <td>3 ratings</td>
                        </tr>
                        <tr>
                          <td>Company Rating</td>
                          <td>:</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          <td></td>
                        </tr>
                      </table>                 
                    </div>
                    <div class="col-xl-3 d-lg-none d-xl-block" style="font-size: 11px;">
                      <table cellpadding="1" cellspacing="3">
                        <tr>
                          <td>Customer Rating</td>
                          <td class="text-center">:&nbsp;&nbsp;</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></td>
                          <td>3 ratings</td>
                        </tr>
                        <tr>
                          <td>Company Rating</td>
                          <td>:</td>
                          <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          <td></td>
                        </tr>
                      </table>           
                    </div>
                  </div>               
                </a>
                <div class="collapse hide" id="agency_2">
                  <div class="card-body text-md">
                  <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <!-- Package Details -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Package Detail</strong>
                          </div>
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
                        <!-- Rating -->
                        <div class="card mb-4 d-none d-xl-block">
                          <div class="card-header" style="background-color: white;">
                            <strong class="m-0 text-primary">Ratings (3 ratings)</strong> <!-- <button style="float:right" class="btn btn-sm btn-outline-primary text-xs" data-toggle="modal" data-target="#ratingModal">Leave a Rating</button> -->
                          </div>
                          <div class="card-body">
                            <div class="row h-100">
                              <div class="col-auto text-center my-auto">
                                <span class="text-primary">4.5 out of 5</span><br/>
                                <small><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></small>
                              </div>  
                              <div class="col-auto my-auto">  
                                <button class="btn btn-sm btn-outline-primary active" type="button" style="font-size: 12px;" onClick="viewRating(1,0);" id="v_allStar">&nbsp;All&nbsp;</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,5);" id="v_5star">5 Star (3)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,4);" id="v_4star">4 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,3);" id="v_3star">3 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,2);" id="v_2star">2 Star (0)</button>                
                                <button class="btn btn-sm btn-outline-primary" type="button" style="font-size: 12px;" onClick="viewRating(1,1);" id="v_1star">1 Star (0)</button>                
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 4 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Abu on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non!</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 5 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Bakar on 3/1/17</small>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non!</p>
                                <small class="text-muted">Rating : <span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span> 5 stars</small>
                                <br/><br/>
                                <small class="text-muted">Posted by Ela on 3/1/17</small>
                                <hr>
                                <!-- <a class="btn btn-sm btn-outline-success" href="#" data-toggle="modal" data-target="#ratingModal">
                                  Leave a Rating
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
                      <div class="col-xl-6 col-lg-12">  
                        <!-- Room and Price Information -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Room & Price Information</strong>
                          </div>
                          <div class="card-body">                            
                            <table class="table table-borderless"  width="100%" cellspacing="0">
                              <tr class="border-bottom">
                                <td class="text-primary"><strong>Room</strong></td>
                                <td class="text-primary"><strong>Price</strong></td>
                                <td></td>
                              </tr>                              
                              <tr class="border-bottom">
                                <td class="align-middle">Double Bed <small>(4 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = false;
                                    $amount = 5500 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-danger font-weight-bold"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle">
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                </td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="align-middle">Triple Bed <small>(4 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = false;
                                    $amount = 6500 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-danger font-weight-bold"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle">
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                </td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="align-middle">Quadruple Bed <small class="text-danger">(0 pax left)</small></td>
                                <td class="align-middle font-weight-bold text-primary">  
                                  <?php 
                                    $hasDiscount = false;
                                    $amount = 7500 * $rates;
                                    if ($hasDiscount) {
                                      $discount = 0.2;                                     
                                      $amountDiscount = $amount * $discount;
                                      $amountAfterDiscount = $amount - $amountDiscount;
                                      echo $currency.''.number_format($amountAfterDiscount, 2);
                                    } else {
                                      echo $currency.''.number_format($amount, 2);
                                    }          
                                  ?>
                                  <?php
                                  if ($hasDiscount) {
                                  ?>
                                  <br/>
                                  <small class="text-danger font-weight-bold"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger badge-pill">20% OFF</span></small>
                                  <?php
                                  }
                                  ?>
                                </td>
                                <td class="align-middle">
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;" disabled>Book Now</button>
                                </td>
                              </tr>
                            </table>                            
                            <?php if ($hasDiscount) { ?>
                            <div class="alert alert-danger text-center mt-3" style="font-size: .8rem;" role="alert">
                              <strong>UMRAH4ALL : 20% off today only!</strong>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                        <!-- Image Hotel Makkah -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Hotel Elaf Al Mashaer, Makkah</strong>
                          </div>
                          <div class="card-body">                                     
                            <div id="imgIndicator3" class="carousel slide mb-3" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator3" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator3" data-slide-to="1"></li>
                                <li data-target="#imgIndicator3" data-slide-to="2"></li>
                                <li data-target="#imgIndicator3" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block caros" src="img/elaf/elaf1-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/standard-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/junior-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/elaf/quadruple-min.jpg">
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#imgIndicator3" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#imgIndicator3" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                          </div>
                        </div>
                        <!-- Image Hotel Madinah -->
                        <div class="card mb-4">
                          <div class="card-header text-center" style="background-color: white;">
                            <strong class="m-0 text-primary">Hotel Ramada Al Qibla, Madinah</strong>
                          </div>
                          <div class="card-body">                                     
                            <div id="imgIndicator4" class="carousel slide mb-3" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#imgIndicator4" data-slide-to="0" class="active"></li>
                                <li data-target="#imgIndicator4" data-slide-to="1"></li>
                                <li data-target="#imgIndicator4" data-slide-to="2"></li>
                                <li data-target="#imgIndicator4" data-slide-to="3"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item box active">
                                  <img class="d-block caros" src="img/ramada/ramada1-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/standard-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/junior-min.jpg">
                                </div>
                                <div class="carousel-item box">
                                  <img class="d-block w-100 caros" src="img/ramada/quadruple-min.jpg">
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#imgIndicator4" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#imgIndicator4" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
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
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item ">
                      <a class="page-link" href="#">2</a>
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

  <!-- Rating Modal-->
  

  <!-- Include Modal-->
  <?php
    include('view/modal/mbooking0.php');
    include('view/modal/mbooking1.php');
    include('view/modal/mbooking2.php');
    include('view/modal/mrating.php');
    
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
