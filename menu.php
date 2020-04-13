<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="border-right: solid 1px lightgrey;">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <!-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div> -->
    <div class="sidebar-brand-text mx-3"><i class="fas fa-fw fa-kaaba"></i>&nbsp;UmrahClicks.my</div>
    <div class="sidebar-brand-icon d-none d-sm-block d-md-none"><i class="fas fa-fw fa-kaaba"></i><span style="font-size:0.7rem;">UmrahClicks</span></div>
  </a>

  <hr class="sidebar-divider my-0"> 

  <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 'dashboard';
    }          
  ?>

  <li class="nav-item <?php if ($page == 'dashboard'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=dashboard">
      <i class="fa fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'agency'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=agency">
      <i class="fa fa-fw fa-building"></i>
      <span>Agency</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'packages'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=packages">
      <i class="fa fa-fw fa-archive"></i>
      <span>Packages</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'promo'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=promo">
      <i class="fa fa-fw fa-thumbs-up"></i>
      <span>Promotion</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'advertisment'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=advertisment">
      <i class="fa fa-fw fa-bullhorn"></i>
      <span>Advertisment</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'follow-up'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=follow-up">
      <i class="fa fa-fw fa-exclamation"></i>
      <span>Follow Up</span></a>
  </li>

  <li class="nav-item <?php if ($page == 'reviews'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=reviews" title="Reviews">
      <i class="fa fa-fw fa-star"></i>
      <span>Reviews</span></a>
  </li>

  <hr class="sidebar-divider d-none d-sm-block">

  <div class="sidebar-heading d-none d-sm-block">
    Administrator
  </div>

  <li class="nav-item <?php if ($page == 'user-management'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=user-management">
      <i class="fa fa-fw fa-users"></i>
      <span>User Management</span></a>
  </li>

  <li class="nav-item <?php if (strpos($page, 'ref') !== false){ ?>active<?php } ?> d-none d-sm-block">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#refData" aria-expanded="true" aria-controls="refData">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Reference</span>
    </a>
    <div id="refData" class="collapse <?php if (strpos($page, 'ref') !== false){ ?>show<?php } else { ?>hide<?php } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item <?php if ($page == 'ref-country'){ ?>active<?php } ?>" href="index.php?page=ref-country">
          Country</a>
      </div>
    </div>
  </li>

  <!-- <hr class="sidebar-divider my-0"> -->

  <!-- <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#profileModal">
      <i class="fa fa-fw fa-user"></i>
      <span>Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fa fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li> -->

  <!-- Sidebar Toggler (Sidebar) -->
  <!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> -->

</ul>