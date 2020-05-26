<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

if(!isset($_GET['country'])) {
  header("Location: home.php");
}

require("lib/conn.php"); 
require("lib/function.php"); 
require("lib/SqlFormatter.php"); 

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
$promo = (isset($_GET['promo'])) ?  $_GET['promo'] : '';
$state = (isset($_GET['state'])) ?  $_GET['state'] : '';
$city = (isset($_GET['city'])) ?  $_GET['city'] : '';  

$dateFrom = date('j F Y', strtotime($dateDepart. ' - 3 days'));
$dateTo = date('j F Y', strtotime($dateDepart. ' + 3 days'));

$sort = (isset($_GET['sort'])) ?  $_GET['sort'] : '';  
$promo = (isset($_GET['promo'])) ?  $_GET['promo'] : '';  
$rating = (isset($_GET['rating'])) ?  $_GET['rating'] : ''; 

$where = '';
$where .= (isset($_GET['priceMax'])) ? " AND price_max <= ".$_GET['priceMax'] : "";
$where .= (isset($_GET['distMakkah'])) ?  " AND makkah_distance = '".$_GET['distMakkah']."'" : "";
$where .= (isset($_GET['distMadinah'])) ?  " AND madinah_distance = '".$_GET['distMadinah']."'" : "";
$where .= (isset($_GET['agency'])) ?  " AND agency_name LIKE '%".$_GET['agency']."%'" : "";
$where .= (isset($_GET['state'])) ?  " AND agency_state = '".$_GET['state']."'" : "";
$where .= (isset($_GET['city'])) ?  " AND agency_city LIKE '%".$_GET['city']."%'" : "";
$where .= (isset($_GET['rating'])) ?  " AND agency_rating >= ".$_GET['rating']."" : "";

if (isset($_GET['promo'])) {
  $qGetPromo = "SELECT * FROM promo WHERE promo_code = '".$_GET['promo']."' LIMIT 1";
  $result = $conn->query($qGetPromo) or die(mysqli_error($conn));
  foreach($result as $row) {
    $promo_id = $row["id"];
  }
  $where .= " AND package_promo = '".$promo_id."'";
}

$orderBy = 'ORDER BY ';
if ($sort == 'price') {
  $orderBy .= 'price_min ASC';
} else if ($sort == 'latest') {
  $orderBy .= 'createdDate DESC';
} else  {
  $orderBy .= 'price_min ASC';
}

/* Pagination */
$record_per_page = 10;
$paging = '';
// $page = (isset($_GET['page'])) ?  $_GET['page'] : 1;
if(isset($_GET["page"])) {
 $paging = $_GET["page"];
} else {
 $paging = 1;
}
$start_from = ($paging-1)*$record_per_page;

$dateFromSearch = date('Y-m-d', strtotime($dateDepart. ' - 3 days'));
$dateToSearch = date('Y-m-d', strtotime($dateDepart. ' + 3 days'));
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
  SELECT MAX( room_actualCost ) AS price_max, package_id
  FROM package_room
  GROUP BY package_id
) d ON a.id = d.package_id
INNER JOIN (
  SELECT MIN( room_actualCost ) AS price_min, package_id
  FROM package_room
  GROUP BY package_id
) e ON a.id = e.package_id
LEFT JOIN promo f ON f.id = a.package_promo
WHERE 1=1
AND a.package_pax - a.package_pax_book  >= '$pax'
AND ('$dateFromSearch' >= DATE_FORMAT(package_dateFrom, '%Y-%m-%d') OR '$dateToSearch' >= DATE_FORMAT(package_dateFrom, '%Y-%m-%d'))
AND ('$dateToSearch' <= DATE_FORMAT(package_dateTo, '%Y-%m-%d'))
$where
GROUP BY a.id
$orderBy
LIMIT $start_from, $record_per_page";
$packageList = $conn->query($qPackage) or die(mysqli_error($conn));
$numPackages = mysqli_num_rows($packageList);

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
                      <?php
                      $qPromo = "SELECT *
                      FROM promo
                      WHERE 
                      promo_status = '1'
                      AND CURDATE() >= promo_dateFrom AND CURDATE() <= promo_dateTo
                      ORDER BY promo_dateTo ASC ";
                      $promoList = $conn->query($qPromo) or die(mysqli_error($conn));
                      ?>
                      <div>
                        <?php
                        while($rows = $promoList->fetch_assoc())
                        {
                        ?>
                        <button class="btn btn-sm btn-outline-primary btn-block <?php if (strpos($promo, $rows["promo_code"]) !== false){ ?>active<?php } ?>" type="button" onClick="filterPromo('<?= $rows["promo_code"] ?>');" style="font-size: 12px;"><?= $rows["promo_code"] ?></button>
                        <?php
                        }
                        ?>
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
                <?php 
                // echo SqlFormatter::format($qPackage); 
                ?>
                Search result for <span class="font-weight-bolder"><?php echo $pax; ?> pax</span>, Departure Date <br class="d-block d-sm-none"><span class="font-weight-bolder"><?php echo $dateFrom; ?> - <?php echo $dateTo; ?></span>
              </div>  
              <!-- Sort -->
              <div class="alert alert-light bg-white text-primary border" style="font-size: .8rem;">
                <div class="row">
                  <div class="col-auto">              
                    <Sort class="align-middle"><i class="fas fa-sort-amount-down-alt fa-sm"></i>&nbsp;Sort by</span>&nbsp;
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'price'){ ?>active<?php } ?>" type="button" onClick="sorting('price');" style="font-size: 12px;">Lowest Price</span></button>
                    <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'latest'){ ?>active<?php } ?>" type="button" onClick="sorting('latest');" style="font-size: 12px;">Latest</span></button>
                    <!-- <button class="btn btn-sm btn-outline-primary <?php if ($sort == 'popular'){ ?>active<?php } ?>" type="button" onClick="sorting('popular');" style="font-size: 12px;">Popular</button> -->
                  </div>
                </div>
              </div>    

              <?php
              if ($numPackages > 0) {
              while($rows = $packageList->fetch_assoc())
              {
                $minAmount = $rows['price_min'] * $rates;
                $maxAmount = $rows['price_max'] * $rates;
                if ($rows['package_promo'] != 0) {
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

              <!-- Packages -->
              <a href="" onclick="viewPackage(<?= $rows['id'] ?>);" class="d-block bg-white text-primary" role="button">
                <div class="card mb-3 text-md">
                  <div class="card-body">
                    <div class="thumb-xs d-block d-sm-none">
                      <img class="thumb-img-xs float-left" src="upload/package/<?= $rows['package_thumbnail'] ?>" >
                    </div>                  
                    <div class="row">
                      <div class="col-auto d-none d-lg-block d-xl-block thumb float-lg-left">
                        <img class="thumb-img" src="upload/package/<?= $rows['package_thumbnail'] ?>" >
                      </div>
                      <div class="col-lg-6">
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
                              </span> (<?= $rows['agency_rating'] ?>/5 stars)
                            </td>
                          </tr>
                          <!-- <tr>
                            <td>Customer Rating</td>
                            <td>:</td>
                            <td><span class="text-warning"><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i><i class="fas fa-star fa-sm"></i></span></td>
                          </tr>
                          <tr>
                            <td colspan="3">3 ratings</td>
                          </tr> -->
                        </table>                                       
                      </div>
                    </div>
                  </div>
                </div>
              </a>

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

              <?php
              if ($numPackages > 0) {
              $qAllPackage = "SELECT
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
              WHERE 1=1
              AND a.package_pax >= '$pax'
              AND ('$dateFromSearch' >= DATE_FORMAT(package_dateFrom, '%Y-%m-%d') OR '$dateToSearch' >= DATE_FORMAT(package_dateFrom, '%Y-%m-%d'))
              AND ('$dateToSearch' <= DATE_FORMAT(package_dateTo, '%Y-%m-%d'))
              GROUP BY a.id
              $orderBy";
              $allPackageList = $conn->query($qAllPackage) or die(mysqli_error($conn));
              $total_records = mysqli_num_rows($allPackageList);
              $total_pages = ceil($total_records/$record_per_page);
              ?>

              <!-- Pagination -->
              <div>
                <nav>
                  <ul class="pagination pagination-sm justify-content-center">
                    <li class="page-item <?php if ($paging == 1) { ?>disabled<?php } ?>">                      
                      <a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <?php
                    for($i=1; $i<=$total_pages; $i++) {
                    ?>     
                    <li class="page-item <?php if ($paging == $i) { ?>active<?php } ?>"><a class="page-link" href="#" onClick="paging('<?= $i ?>');"><?= $i ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item <?php if ($paging == $total_pages) { ?>disabled<?php } ?>">                      
                      <a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a>
                    </li>
                  </ul>
                </nav>
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
