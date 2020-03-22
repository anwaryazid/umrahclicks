<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <!-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div> -->
    <div class="sidebar-brand-text mx-3">UmrahClicks.my</div>
  </a>

  <!-- Divider -->
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
      <i class="fa fa-fw fa-star"></i>
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

  <!-- <hr class="sidebar-divider my-0">

  <li class="nav-item <?php if ($page == 'user-management'){ ?>active<?php } ?>">
    <a class="nav-link" href="index.php?page=user-management">
      <i class="fa fa-fw fa-user"></i>
      <span>User Management</span></a>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>