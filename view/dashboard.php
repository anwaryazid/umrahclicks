<?php
  include('view/modal/mcustomer_details.php');

  function getCount($t) {
    require("lib/conn.php"); 

    $where = "";

    if($_SESSION['userType'] == 4) {
      if ($t == 'agency') {
        $where = "WHERE id = '".$_SESSION['userAgency']."'";
      } else if ($t == 'promo') {
        $where = "WHERE promo_agency = '".$_SESSION['userAgency']."'";
      } else if ($t == 'package')  {
        $where = "WHERE agency_id = '".$_SESSION['userAgency']."'";
      }
    }
    
    $result = $conn->query("SELECT COUNT(*) AS count FROM ".$t." ".$where."") or die(mysqli_error($conn));

    while($row = mysqli_fetch_array($result)) {
      $count = $row['count'];
    }

    echo $count;
  }

?>

<h1 class="h4 mb-2 text-gray-800">Dashboard</h1>

<hr>

<?php

$menu = '';
$qMenu = "SELECT GROUP_CONCAT(groupMenuAccess SEPARATOR ',') AS groupMenuAccess FROM group_access WHERE groupID = '".$_SESSION['groupType']."' ";
$menuAccess = $conn->query($qMenu) or die(mysqli_error($conn));
foreach($menuAccess as $menu) {
  $menu = $menu['groupMenuAccess'];
}

// echo SqlFormatter::format($qMenu);

// echo $menu;

?>

<div class="row">      

    <?php if (strpos($menu, '7')) { ?>
    <!-- Users -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(7,0)"><?= getCount('user'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-users fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (strpos($menu, '2')) { ?>
    <!-- Agency -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Agency</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(2,0)"><?= getCount('agency'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-building fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (strpos($menu, '3')) { ?>
    <!-- Packages -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Packages</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(3,0)"><?= getCount('package'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-archive fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (strpos($menu, '4')) { ?>
    <!-- Promotion -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Promotion</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(4,0)"><?= getCount('promo'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-thumbs-up fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (strpos($menu, '5')) { ?>
    <!-- Advertisement -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Advertisement</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(5,0)"><?= getCount('advertisement'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-bullhorn fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (strpos($menu, '6')) { ?>
    <!-- Follow Up -->
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Follow Up</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" onclick="f_menu_redirect(6,0)"><?= getCount('follow_up'); ?></a></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-exclamation fa-2x text-gray-300 d-md-none d-lg-block"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>

<div class="row <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>">
  <div class="col-xl-6">
    <div class="card shadow mb-4">
      <a href="#d1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d1">
        <h6 class="m-0 font-weight-bold text-primary text-md">List of Agency with Follow Up Outstanding</h6>
      </a>
      <div class="collapse show" id="d1">
        <div class="card-body">
          <div class="table-responsive" style="font-size: 13px;">
            <table class="table table-bordered table-sm" id="dt_FollowUp" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Agency</th>
                  <th>Country</th>
                  <th>Quantity</th>
              </thead>
            </table>
          </div>
          <span class="small">* Click row to view customer details</span>
        </div>
      </div>
    </div>

    <div class="card shadow mb-4">
      <a href="#d3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d3">
        <h6 class="m-0 font-weight-bold text-primary text-md">Active Promo</h6>
      </a>
      <div class="collapse show" id="d3">
        <div class="card-body">
          <div class="table-responsive" style="font-size: 13px;">
            <table class="table table-bordered table-sm" id="dt_ActivePromo"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Promo Code</th>
                  <th>Promo Description</th>
                  <th>Promo End Date</th>
                  <th>Amount</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card shadow mb-4">
      <a href="#d4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d4">
        <h6 class="m-0 font-weight-bold text-primary text-md">Active Advertisement</h6>
      </a>
      <div class="collapse show" id="d4">
        <div class="card-body">
          <div class="table-responsive" style="font-size: 13px;">
            <table class="table table-bordered table-sm" id="dt_ActiveAdvert" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 220px;">Company</th>
                  <th>End Date</th>
                  <th>Remarks</th>
                  <th>Price</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-xl-6">
  <div class="card shadow mb-4">
      <a href="#d2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d2">
        <h6 class="m-0 font-weight-bold text-primary text-md">Below 10 Agency of The Month</h6>
      </a>
      <div class="collapse show" id="d2">
        <div class="card-body">
          <div class="table-responsive" style="font-size: 13px;">
            <table class="table table-bordered table-sm" id="dt_AgencyBelow10" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Country</th>
                  <th style="width: 220px;">Agency</th>
                  <th>Customer<br>Qty</th>
                  <th>Rating</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <a href="#d5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d5">
        <h6 class="m-0 font-weight-bold text-primary text-md">Payment Summary</h6>
      </a>
      <div class="collapse show" id="d5">
        <div class="card-body" style="font-size: 13px;">
          <form class="">
            <div class="form-group row">
              <div class="col-md-5">
                <div class="input-group">
                  <?php 
                  require_once('lib/conn.php');  
                  $countryList = $conn->query("SELECT * FROM ref_country ORDER BY id")
                  ?> 
                  <select class="form-control form-control-sm" id="filterCountry" name="filterCountry">
                    <!-- <option value="" selected></option> -->
                    <?php
                    while($rows = $countryList->fetch_assoc())
                    {
                      $countryName = $rows['keterangan'];
                      $countryID = $rows['id'];
                      ($country == $countryID) ? $selected = "selected" : $selected = "";
                      echo "<option value='$countryID' $selected>$countryName</option>";
                    }
                    ?>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="button">
                      <i class="fas fa-filter fa-sm"></i>
                    </button>
                  </div>
                </div>                
              </div>
            </div>
          </form>
          <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Month</th>
                  <th>Agency</th>
                  <th>Total Payment</th>
              </thead>
              <tbody>                
                <tr>
                  <td rowspan="2">January</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">3,000</td>
                </tr>
                <tr>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-right">4,000</td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Total January</strong></td>
                  <td class="text-right"><strong>12,000</strong></td>
                </tr>
                <tr>
                  <td rowspan="2">February</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">3,000</td>
                </tr>
                <tr>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-right">4,000</td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Total February</strong></td>
                  <td class="text-right"><strong>12,000</strong></td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Grand Total</strong></td>
                  <td class="text-right"><strong>24,000</strong></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>    
  </div>
</div>
