<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

if(!isset($_GET['country'])) {
  header("Location: home.php");
}

require("lib/conn.php"); 

$country = (isset($_GET['country'])) ? $_GET['country'] : 'MY'; 

$result = $conn->query("SELECT * FROM ref_country WHERE kod = '$country'") or die(mysqli_error($conn));
foreach($result as $row) {
  $currency = $row["currency_symbol"];
  $currencyCode = $row["currency_code"];
}

/* Search */
$dateDepart = (isset($_GET['dateDepart'])) ?  $_GET['dateDepart'] : '';
$noAdult = (isset($_GET['noAdult'])) ?  $_GET['noAdult'] : '';
$noChild = (isset($_GET['noChild'])) ?  $_GET['noChild'] : '';
$pax = $noAdult + $noChild;

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

if ($currencyCode == 'MYR') {
  $rates = 1;
} else {
  $rates = convert_currency('MYR', $currencyCode);
}

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
  <link href="css/search.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column"><!-- style="background-color: #c5e3f6" -->       
      
      <div id="content">    
      <?php
        include('top-menu.php');
      ?> 
        <div class="container-fluid">
          <div class="row justify-content-md-center">

            <div class="col-xl-2 col-lg-3 col-md-4">                            
              <!-- Filter -->
              <div class="card mb-3 d-sm-none d-md-block">
                <a href="#filter" class="d-block card-header py-3 bg-white collapse" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="filter">
                  <h6 class="m-0 text-primary" style="font-size: .8rem;"><i class="fas fa-filter fa-sm"></i>&nbsp;Filter by</h6>
                </a>
                <div class="collapse show" id="filter">
                  <div class="card-body">
                    <form class="">
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Price</div>
                        <div class="col-sm-12">
                          <div class="input-group input-group-xs">  
                            <div class="input-group-prepend">
                              <span class="input-group-text input-group-addon bg-white text-primary border-secondary border-right-0">&nbsp;<strong><?php echo $currency; ?></strong>&nbsp;</span>
                            </div>  
                            <input type="text" value="<?php echo $priceMax; ?>" class="form-control form-control-xs border-secondary border-left-0 input-number text-primary" id="f_price_max">
                          </div>
                        </div>                 
                      </div>
                      <?php $distanceMakkahList = $conn->query("SELECT * FROM ref_distance")?>  
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Makkah Hotel</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs border-secondary text-primary" id="f_distance_makkah" name="f_distance_makkah">
                            <option value="" selected></option>
                            <?php
                            while($rows = $distanceMakkahList->fetch_assoc())
                            {
                              $desc = $rows['desc'];
                              $id = $rows['id'];
                              ($distMakkah == $id) ? $selected = "selected" : $selected = "";
                              echo "<option value='$id' $selected>$desc</option>";
                            }
                            ?>
                          </select>
                        </div>                 
                      </div>
                      <?php $distanceMadinahList = $conn->query("SELECT * FROM ref_distance")?>  
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Distance Madinah Hotel</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs border-secondary text-primary" id="f_distance_madinah">
                            <option value="" selected></option>
                            <?php
                            while($rows = $distanceMadinahList->fetch_assoc())
                            {
                              $desc = $rows['desc'];
                              $id = $rows['id'];
                              ($distMadinah == $id) ? $selected = "selected" : $selected = "";
                              echo "<option value='$id' $selected>$desc</option>";
                            }
                            ?>
                          </select>
                        </div>                 
                      </div>
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">Agency</div>
                        <div class="col-sm-12">
                          <input type="text" value="<?php echo $agency; ?>" class="form-control form-control-xs border-secondary text-primary" id="f_agency" onkeyup="this.value = this.value.toUpperCase();">
                        </div>                  
                      </div>                   
                      <?php $stateList = $conn->query("SELECT * FROM ref_state WHERE kod NOT IN ('15','98','99') ORDER BY keterangan")?>  
                      <div class="form-row form-group" style="font-size: 13px;">
                        <div class="col-sm-12">State</div>
                        <div class="col-sm-12">
                          <select class="form-control form-control-xs border-secondary text-primary" id="f_state" name="f_state">
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
                          <input type="text" value="<?php echo $city; ?>" class="form-control form-control-xs border-secondary text-primary" id="f_city" onkeyup="this.value = this.value.toUpperCase();">
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
              <?php
              require_once('lib/conn.php');  
              $query = "SELECT * FROM advertisement
              WHERE 
              ad_status = '1' AND ad_companyStatus = '1'
              AND CURDATE() >= ad_dateFrom AND CURDATE() <= ad_dateTo
              ORDER BY RAND()
              LIMIT 3";
              $advertList = $conn->query($query) or die(mysqli_error($conn));
              $numrows = mysqli_num_rows($advertList);
              if ($numrows > 0) {
              ?>
              <!-- Advertisement -->
              <div class="d-none d-md-block">
                <div class="card mb-4">
                  <div class="card-body" style="font-size: 0.7rem;">
                    <div class="text-center">
                      Advertisement
                    </div>
                    <hr>
                    <?php                    
                    foreach($advertList as $row) {
                    ?>                    
                    <div class="text-center">
                      <a rel="nofollow" href="<?= $row['ad_website']; ?>" target="_blank" style="font-size: 0.8rem;">
                        <img class="d-block w-100" src="upload/advertisement/<?= $row['ad_image']; ?>"" height="" alt="<?= $row['ad_companyName']; ?>">
                      </a>
                      <br>
                      <?= $row['ad_companyName']; ?>
                    </div>                    
                    <hr>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>             
            </div>

            <!-- Content -->
            <div class="col-xl-8 col-lg-9 col-md-8">  
              <!-- Search Info -->
              <div class="alert alert-light bg-white text-primary border" style="font-size: .7rem;">
                Search result for <span class="font-weight-bolder"><?php echo $pax; ?> pax</span>, Departure Date <br class="d-block d-sm-none"><span class="font-weight-bolder"><?php echo $dateFrom; ?> - <?php echo $dateTo; ?></span>
              </div>  
              <!-- Sort -->
              <div class="alert alert-light bg-white text-primary border" style="font-size: .8rem;">
                <div class="row">
                  <div class="col-auto">              
                    <Sort class="align-middle"><i class="fas fa-sort-amount-down-alt fa-sm"></i>&nbsp;Sort by</span>&nbsp;
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'priceLowToHigh'){ ?>active<?php } ?>" type="button" onClick="sorting('priceLowToHigh');" style="font-size: 12px;">Lowest Price</span></button>
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'latest'){ ?>active<?php } ?>" type="button" onClick="sorting('latest');" style="font-size: 12px;">Latest</span></button>
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'popular'){ ?>active<?php } ?>" type="button" onClick="sorting('popular');" style="font-size: 12px;">Popular</button>
                  </div>
                </div>
              </div>    
                   
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

              <!-- Packages -->
              <div class="card mb-3 text-md">
                <div class="card-body">
                  <div class="thumb-xs d-block d-sm-none">
                    <img class="thumb-img-xs float-left" src="img/kaabah-min.jpg" >
                  </div>
                  <a href="#" onclick="viewPackage(1);" class="d-block bg-white text-primary" role="button">
                    <div class="row">
                      <div class="col-auto d-none d-lg-block d-xl-block thumb float-lg-left">
                        <img class="thumb-img" src="img/kaabah-min.jpg" >
                      </div>
                      <div class="col-lg-7">
                        <h6 class="m-0 font-weight-bold text-primary text-md">Smart Umrah4all Dot Com Travel & Services Sdn Bhd</h6> 
                        <div class="text-primary" style="font-size: 13px;">
                          Cyberjaya, Selangor (LKU No: KPK/LN 9774) <br>
                          Package Gold <span class="badge badge-info align-text-middle">New!</span><br>
                          Departure Date from 2 April 2020 to 10 April 2020<br>                        
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
                      <div class="col-auto justify-content-end">  
                        <table cellpadding="1" cellspacing="3" style="font-size: 11px;">
                          <tr>
                            <td>Company Rating</td>
                            <td class="text-center">:&nbsp;&nbsp;</td>
                            <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star-half fa-sm"></i></span></td>
                          </tr>
                          <tr>
                            <td>Customer Rating</td>
                            <td>:</td>
                            <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          </tr>
                          <tr>
                            <td colspan="3">3 ratings</td>
                          </tr>
                        </table>                                       
                      </div>
                    </div>                  
                  </a>
                </div>
              </div>
              
              <!-- If Not Found -->
              <div class="alert alert-light bg-white text-primary text-center" style="font-size: .8rem;">
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
            <span>Copyright &copy; UmrahClicks.my <?php echo date('Y'); ?></span>
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
