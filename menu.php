<ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

  <a href="home.php" target="_blank">
  <div class="sidebar-brand d-flex align-items-center justify-content-center">    
    <div class="sidebar-brand-text mx-3"><img class="d-block rounded-lg" src="img/umrahclicks-logo.JPG" height="40px" alt="UmrahClicks"></div>
    <div class="sidebar-brand-icon d-block d-sm-block d-md-none"><i class="fas fa-fw fa-kaaba"></i><span style="font-size:0.7rem;">UmrahClicks</span></div>
  </div>
  </a>

  <hr class="sidebar-divider my-0"> 

  <?php

  require("lib/conn.php");
  require("lib/SqlFormatter.php");
  $where = '';
  /* if ($_SESSION['userType'] == '3' || $_SESSION['userType'] == '4') {
    $where = "WHERE menu.mid IN (".$_SESSION['userAccess'].")";
  } */
  $menu = '';
  $qMenu = "SELECT GROUP_CONCAT(groupMenuAccess SEPARATOR ',') AS groupMenuAccess FROM group_access WHERE groupID = '".$_SESSION['groupType']."' ";
  // echo SqlFormatter::format($qMenu);
  $menuAccess = $conn->query($qMenu) or die(mysqli_error($conn));
  foreach($menuAccess as $menu) {
    $menu = $menu['groupMenuAccess'];
  }
  // echo $menu;
  $where = "WHERE menu.mid IN (".$menu.")";
  $query = "SELECT menu.*, COUNT(menu2nd.m2id) AS sub_menu
  FROM menu
  LEFT JOIN menu2nd ON menu2nd.mid = menu.mid
  $where
  GROUP BY menu.mid
  ORDER BY menuOrder";
  $result = $conn->query($query) or die(mysqli_error($conn));
  foreach($result as $row) {
    if ($row['menuOrder'] == 20) {
  ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading d-none d-sm-block">
      Administrator
    </div>
  <?php
    }
    if ($row['sub_menu']  > 0) {
  ?>
    <li class="nav-item <?php if ($mid == $row['mid']){ ?>active<?php } ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#refData" aria-expanded="true" aria-controls="refData">
        <i class="fa fa-fw <?= $row['menuIcon'] ?>"></i>
        <span><?= $row['menuName'] ?></span></a>
      </a>
      <div id="refData" class="collapse <?php if ($mid == $row['mid']){ ?>show<?php } else { ?>hide<?php } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded" style="z-index: 99999;" >
          <?php
            $resultm2 = $conn->query("SELECT * FROM menu2nd WHERE mid = '".$row['mid']."'") or die(mysqli_error($conn));
            foreach($resultm2 as $row2) {
          ?>
          <a class="collapse-item <?php if ($m2id == $row2['m2id']){ ?>active<?php } ?>" href="#" onclick="f_menu_redirect('<?= $row['mid'] ?>','<?= $row2['m2id'] ?>')"><?= $row2['menu2ndName'] ?></a>
          <?php } ?>
        </div>
      </div>
    </li>
  <?php
    } else {
  ?>
  <li class="nav-item <?php if ($mid == $row['mid']){ ?>active<?php } ?>">
      <a class="nav-link" href="#" onclick="f_menu_redirect('<?= $row['mid'] ?>','0')">
        <i class="fa fa-fw <?= $row['menuIcon'] ?>"></i>
        <span><?= $row['menuName'] ?></span></a>
    </li>
  <?php
    }
  }
  ?>

</ul>

