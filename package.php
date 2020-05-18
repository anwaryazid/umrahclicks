<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

if(!isset($_GET['country']) && !isset($_GET['package'])) {
  header("Location: home.php");
}

require("lib/conn.php"); 
require("lib/function.php"); 
require("lib/SqlFormatter.php"); 

$country = (isset($_GET['country'])) ? $_GET['country'] : 'MY'; 
$id = (isset($_GET['id'])) ? $_GET['id'] : '0'; 

$dateDepart = (isset($_GET['dateDepart'])) ?  $_GET['dateDepart'] : '';
$noAdult = (isset($_GET['noAdult'])) ?  $_GET['noAdult'] : '';
$noChild = (isset($_GET['noChild'])) ?  $_GET['noChild'] : '';
$package = (isset($_GET['package'])) ?  $_GET['package'] : '';

$result = $conn->query("SELECT * FROM ref_country WHERE kod = '$country'") or die(mysqli_error($conn));
foreach($result as $row) {
  $currency = $row["currency_symbol"];
  $currencyCode = $row["currency_code"];
}

if ($currencyCode == 'MYR') {
  $rates = 1;
} else {
  $rates = convert_currency('MYR', $currencyCode);
}

$qPackage = "SELECT
b.agency_name,
b.agency_city,
b.agency_state,
LCASE( c.keterangan ) AS state,
b.agency_LKUNo,
DATE_FORMAT( package_dateFrom, '%e %M %Y' ) AS dateFrom,
DATE_FORMAT( package_dateTo, '%e %M %Y' ) AS dateTo,
b.agency_rating,
e.price_min AS price_min,
d.price_max AS price_max,	
f.promo_code,
f.promo_variable,
f.promo_variableAmount,
a.* 
FROM
package a
LEFT JOIN agency b ON b.id = a.agency_id
LEFT JOIN ref_state c ON c.id = b.agency_state
INNER JOIN (
  SELECT MAX( room_umrahCost ) AS price_max, package_id
  FROM package_room
  GROUP BY package_id
) d ON a.id = d.package_id
INNER JOIN (
  SELECT MIN( room_umrahCost ) AS price_min, package_id
  FROM package_room
  GROUP BY package_id
) e ON a.id = e.package_id
LEFT JOIN promo f ON f.id = a.package_promo
WHERE 1=1
AND a.id = '$package'";
$packageList = $conn->query($qPackage) or die(mysqli_error($conn));
$numPackages = mysqli_num_rows($packageList);
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

            <!-- Packages -->
            <div class="col-xl-10 col-lg-10 col-md-10">   
              
              <small class="d-none"><?= SqlFormatter::format($qPackage); ?></small>
                   
              <!-- Package 1 -->
              <?php
              if ($numPackages > 0) {
              while($rows = $packageList->fetch_assoc())
              {
                $minAmount = $rows['price_min'] * $rates;
                $maxAmount = $rows['price_max'] * $rates;
                if (strlen($rows['package_promo']) > 0) {
                  $hasDiscount = true;
                } else {
                  $hasDiscount = false;
                }                
                if ($hasDiscount) {
                  // Percent
                  if($rows['promo_variable'] == 1) {
                    $discount = $rows['promo_variableAmount'] / 100;                                     
                    $amountMinDiscount = $minAmount * $discount;
                    $amountMinAfterDiscount = $minAmount - $amountMinDiscount;
                    $amountMaxDiscount = $maxAmount * $discount;
                    $amountMaxAfterDiscount = $maxAmount - $amountMaxDiscount;
                  } 
                  // Amount
                  else {
                    $discount = $rows['promo_variableAmount'];                                     
                    // $amountMinDiscount = $minAmount - $discount;
                    $amountMinAfterDiscount = $minAmount - $discount;
                    // $amountMaxDiscount = $maxAmount - $discount;
                    $amountMaxAfterDiscount = $maxAmount - $discount;
                  }                  
                }
                $now = time(); // or your date as well
                $dateCreated = strtotime($rows['createdDate']);
                $datediff = $now - $dateCreated;
                $new = round($datediff / (60 * 60 * 24));
              ?> 
              <div class="card mb-3">
                <div class="card-body text-md">
                  <div class="thumb-xs d-block d-sm-none">
                    <img class="thumb-img-xs float-left" src="upload/package/<?= $rows['package_thumbnail'] ?>" >
                  </div>
                  <div class="d-block bg-white text-primary">
                    <div class="row">
                      <div class="col-auto d-none d-lg-block d-xl-block thumb float-lg-left">
                        <img class="thumb-img" src="upload/package/<?= $rows['package_thumbnail'] ?>" >
                      </div>
                      <div class="col-lg-7">
                        <h6 class="m-0 font-weight-bold text-primary text-md"><?= $rows['agency_name'] ?></h6> 
                        <div class="text-primary" style="font-size: 13px;">
                          <?= $rows['agency_city'] ?>, <?= ucfirst($rows['state']) ?> (LKU No: KPK/LN <?= $rows['agency_LKUNo'] ?>) <br>
                          <?= $rows['package_name'] ?> <?php if($new <= 30) { ?><span class="badge badge-success align-text-middle">NEW!</span> <?php } ?> <?php if($hasDiscount) { ?><span class="badge badge-info align-text-middle"><?= $rows['promo_code'] ?></span> <?php } ?> <br>
                          Departure Date from <?= $rows['dateFrom'] ?> to <?= $rows['dateTo'] ?><br>                        
                          <?php if ($hasDiscount) { ?>
                            <span class="text-secondary"><small><del><?php echo $currency . '' .number_format($minAmount, 2) ?>-<?php echo $currency . '' .number_format($maxAmount, 2) ?></del></small></span>&nbsp;<br class="d-block d-sm-none">
                            <span class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($amountMinAfterDiscount, 2) ?>-<?php echo $currency . '' .number_format($amountMaxAfterDiscount, 2) ?></span>&nbsp;<br class="d-block d-sm-none">
                            <span class="badge badge-danger align-text-top"><?php if($rows['promo_variable'] == 2) { ?>RM<?php } ?><?= number_format($rows['promo_variableAmount']); ?><?php if($rows['promo_variable'] == 1) { ?>%<?php } ?> OFF</span>
                          <?php } else { ?>
                            <h6 class="m-0 font-weight-bold text-primary text-md"><?php echo $currency . '' .number_format($minAmount, 2) ?> - <?php echo $currency . '' .number_format($maxAmount, 2) ?></h6> 
                          <?php } ?>                                                        
                        </div>
                      </div>
                      <div class="col-auto justify-content-end">  
                        <table cellpadding="1" cellspacing="3" style="font-size: 11px;">
                          <tr>
                            <td>Company Rating</td>
                            <td class="text-center">:&nbsp;&nbsp;</td>
                            <td>
                              <span class="text-warning">
                              <?php
                              for ($x = 1; $x <= $rows['agency_rating']; $x++) {
                                echo "<i class='fas fa-star fa-sm'></i>";
                              }
                              ?>
                              </span>
                            </td>
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
                  </div>
                  <hr>
                  <div class="row" >
                    <div class="col-xl-6 col-lg-12">
                      <!-- Room and Price Information -->
                      <div class="card mb-4">
                        <div class="card-header text-center" style="background-color: white;">
                          <strong class="m-0 text-primary">Room & Price Information</strong>
                        </div>
                        <div class="card-body text-md"> 
                          <div class="row">
                            <div class="col-sm-12">
                              <table class="table table-borderless" width="100%" cellspacing="0">
                                <tr class="border-bottom">
                                  <td class="text-primary"><strong>Room</strong></td>
                                  <td class="text-primary"><strong>Price</strong></td>
                                  <td class="text-primary text-center" style="font-size: .8rem"><strong><?= $rows['package_pax'] - $rows['package_pax_book'] ?> pax left</strong></td>
                                </tr>             
                                <?php $rooms = $conn->query("SELECT * FROM package_room WHERE package_id = '".$package."'")?> 
                                <?php
                                while($room = $rooms->fetch_assoc())
                                {
                                ?>
                                <tr class="border-bottom">
                                  <td class="align-middle">
                                    <span class="d-none d-sm-block"><?= ucfirst($room['room_type']) ?></span>
                                    <span class="d-block d-sm-none" style="font-size: .8rem"><?= ucfirst($room['room_type']) ?></span>
                                  </td>
                                  <td class="align-middle font-weight-bold text-primary">  
                                    <?php 
                                    $amount = $room['room_umrahCost'] * $rates;
                                    if (strlen($rows['package_promo']) > 0) {
                                      $hasDiscount = true;
                                    } else {
                                      $hasDiscount = false;
                                    }                
                                    if ($hasDiscount) {
                                      // Percent
                                      if($rows['promo_variable'] == 1) {
                                        $discount = $rows['promo_variableAmount'] / 100;                                     
                                        // $discount = 0.2;                                     
                                        $amountDiscount = $amount * $discount;
                                        $amountAfterDiscount = $amount - $amountDiscount;
                                        $finalAmount = $currency.''.number_format($amountAfterDiscount, 2);
                                      } 
                                      // Amount
                                      else {
                                        $discount = $rows['promo_variableAmount'];  
                                        $amountAfterDiscount = $amount - $discount;
                                        $finalAmount = $currency.''.number_format($amountAfterDiscount, 2);
                                      }                  
                                    } else {
                                      $finalAmount = $currency.''.number_format($amount, 2);
                                    }          
                                    ?>
                                    <span class="d-none d-sm-block"><?= $finalAmount ?></span>
                                    <span class="d-block d-sm-none" style="font-size: .8rem"><?= $finalAmount ?></span>
                                    <?php
                                    if ($hasDiscount) {
                                    ?>
                                    <small class="text-secondary"><del><?php echo $currency.''.number_format($amount, 2); ?></del> &nbsp;<span class="badge badge-danger align-text-middle"><?php if($rows['promo_variable'] == 2) { ?>RM<?php } ?><?= number_format($rows['promo_variableAmount']); ?><?php if($rows['promo_variable'] == 1) { ?>%<?php } ?> OFF</span></small>
                                    <?php
                                    }
                                    ?>
                                  </td>
                                  <td class="align-middle text-center" width="120px">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                  </td>
                                </tr>
                                <!-- <tr>
                                  <td colspan="2" class="align-middle text-center">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookingModal" style="font-size: 12px;">Book Now</button>
                                  </td>
                                </tr> -->
                                <?php                            
                                }
                                ?>       
                                <!-- <tr class="border-bottom" style="font-size: .8rem;">
                                  <td colspan="3">
                                    <div class="alert alert-primary" role="alert" style="font-size: .8rem">
                                      <?php if ($hasDiscount) { ?>Promo : <strong class="text-primary">20% off today only! (Code: UMRAH4ALL)</strong> <?php } ?>
                                    </div>
                                  </td> 
                                </tr> -->
                              </table>
                            </div>
                          </div>   
                        </div>
                      </div>
                      <!-- Package Details -->
                      <div class="card mb-4">
                        <div class="card-header text-center" style="background-color: white;">
                          <strong class="m-0 text-primary">Package Detail</strong>
                        </div>
                        <div class="card-body">
                          <table class="table table-borderless"  width="100%" cellspacing="0">
                            <tr class="border-bottom">
                              <td></td>
                              <td class="text-primary d-none d-sm-block"></td>
                              <td class="text-primary"><strong>Makkah</strong></td>
                              <td class="text-primary"><strong>Madinah</strong></td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-bed"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Hotel</span></td>
                              <td><?= ucfirst($rows['makkah_hotel']) ?></td>
                              <td><?= ucfirst($rows['madinah_hotel']) ?></td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-sun"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Days</span></td>
                              <td><?= $rows['makkah_days'] ?> days</td>
                              <td><?= $rows['madinah_days'] ?> days</td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-moon"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Night</span></td>
                              <td><?= $rows['makkah_night'] ?> night</td>
                              <td><?= $rows['madinah_night'] ?> night</td>
                            </tr>
                            <tr class="border-bottom">
                              <td class="text-primary"><i class="fas fa-fw fa-mosque"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Distance to Mosque</span></td>
                              <td>
                                <?php $distanceMakkah = $conn->query("SELECT * FROM ref_distance WHERE id = '".$rows['makkah_distance']."' LIMIT 1")?> 
                                <?php
                                while($row = $distanceMakkah->fetch_assoc())
                                {
                                  echo $row['desc'];
                                }
                                ?>
                              </td>
                              <td>
                                <?php $distanceMadinah = $conn->query("SELECT * FROM ref_distance WHERE id = '".$rows['madinah_distance']."' LIMIT 1")?> 
                                <?php
                                while($row = $distanceMadinah->fetch_assoc())
                                {
                                  echo $row['desc'];
                                }
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-utensils"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Meal</span></td>
                              <td colspan="2">
                                <?php $meal = $conn->query("SELECT * FROM ref_package_meal WHERE id = '".$rows['package_meal_id']."' LIMIT 1")?> 
                                <?php
                                while($row = $meal->fetch_assoc())
                                {
                                  echo $row['desc'];
                                }
                                ?>
                              </td>
                            </tr>
                            <tr class="border-bottom">
                              <td class="text-primary"><i class="fas fa-fw fa-plane"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Flight</span></td>
                              <td colspan="2">
                                <?php $flight = $conn->query("SELECT * FROM ref_package_flight WHERE id = '".$rows['package_flight_id']."' LIMIT 1")?> 
                                <?php
                                while($row = $flight->fetch_assoc())
                                {
                                  echo $row['desc'];
                                }
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-map-marker-alt"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">1st Destination</span></td>
                              <td colspan="2"><?= ucfirst($rows['package_1stDestination']) ?></td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-walking"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Ziarah</span></td>
                              <td colspan="2"><?= $rows['package_ziarah'] ?></td>
                            </tr>
                            <tr>
                              <td class="text-primary"><i class="fas fa-fw fa-male"></i></td>
                              <td class="text-primary d-none d-sm-block"><span class="d-none d-sm-block">Mutawwif</span></td>
                              <td colspan="2"><?= ucfirst($rows['package_mutawwif']) ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>                        
                      <!-- Rating -->
                      <!-- <div class="card mb-4 d-none d-xl-block">
                        <div class="card-header" style="background-color: white;">
                          <strong class="m-0 text-primary">Ratings (3 ratings)</strong>
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
                          <div class="row" style="font-size: .8rem">
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
                      </div> -->
                    </div>
                    <div class="col-xl-6 col-lg-12">                          
                      <!-- Image Hotel Makkah -->
                      <?php 
                      $imageMakkah = $conn->query("SELECT * FROM package_image WHERE package_id = '".$package."' AND img_for = '1' ORDER BY createdDate DESC");
                      $numimageMakkah = mysqli_num_rows($imageMakkah);
                      ?> 
                      <?php
                      if ($numimageMakkah > 0) {
                      ?>
                      <div class="card mb-4">
                        <div class="card-header text-center" style="background-color: white;">
                          <strong class="m-0 text-primary"><?= ucfirst($rows['makkah_hotel']) ?>, Makkah</strong>
                        </div>
                        <div class="card-body">                                  
                          <div id="imgIndicator" class="carousel slide mb-3" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                              $j = 0;
                              while($row = $imageMakkah->fetch_assoc())
                              {
                              ?>
                              <div class="carousel-item box <?php if ($j == 0) { ?>active<?php } ?>">
                                <img class="d-block caros" src="upload/hotel/<?= $row['hotel_img'] ?>">
                              </div>
                              <?php
                              $j++;
                              }
                              ?>
                            </div>
                            <?php
                            if ($numimageMakkah <= 2) {
                            ?>
                            <a class="carousel-control-prev" href="#imgIndicator" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imgIndicator" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                      
                      <!-- Image Hotel Madinah -->
                      <?php 
                      $imageMadinah = $conn->query("SELECT * FROM package_image WHERE package_id = '".$package."' AND img_for = '2' ORDER BY createdDate DESC");
                      $numimageMadinah = mysqli_num_rows($imageMadinah);
                      ?> 
                      <?php
                      if ($numimageMadinah > 0) {
                      ?>
                      <div class="card mb-4">
                        <div class="card-header text-center" style="background-color: white;">
                          <strong class="m-0 text-primary"><?= ucfirst($rows['madinah_hotel']) ?>, Madinah</strong>
                        </div>
                        <div class="card-body">                                  
                          <div id="imgIndicator2" class="carousel slide mb-3" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                              $j = 0;
                              while($row = $imageMadinah->fetch_assoc())
                              {
                              ?>
                              <div class="carousel-item box <?php if ($j == 0) { ?>active<?php } ?>">
                                <img class="d-block caros" src="upload/hotel/<?= $row['hotel_img'] ?>">
                              </div>
                              <?php
                              $j++;
                              }
                              ?>
                            </div>
                            <?php
                            if ($numimageMadinah <= 2) {
                            ?>
                            <a class="carousel-control-prev" href="#imgIndicator2" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imgIndicator2" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                      <!-- <div class="card mb-4">
                        <div class="card-header text-center" style="background-color: white;">
                          <strong class="m-0 text-primary"><?= ucfirst($rows['madinah_hotel']) ?>, Madinah</strong>
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
                      </div> -->
                    </div>
                  </div>                    
                </div>
              </div>
              <?php
              }
              }
              else {
              ?>              
              <!-- If Not Found -->
              <div class="alert alert-light bg-white text-primary text-center" style="font-size: .8rem;">
                No package has been found. 
              </div>
              <?php
              }
              ?>

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
