<nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm bg-white">
  <a class="navbar-brand text-primary mb-0" href="home.php"><i class="fas fa-fw fa-kaaba text-gray-900"></i>&nbsp;UmrahClicks.my</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div style="font-size: .9rem; ">
      <?php 
        $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
      ?>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a>
        <a class="nav-item nav-link <?php if ($page == 'packages') { ?>active<?php } ?>" href="packages.php">Packages</a>
        <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>           
      </div>    
    </div>
    <hr>
    <div class="float-lg-right" style="font-size: .8rem; float: right;">
      <form class="form-inline">
        Date Depart From&nbsp;
        <input type="text" class="form-control form-control-sm" id="date_Depart" value="28/03/2020" size="10">&nbsp;
        Adult&nbsp;
        <input type="text" class="form-control form-control-sm" id="no_adult" value="3" size="1">&nbsp;
        Children&nbsp;
        <input type="text" class="form-control form-control-sm" id="no_children"  value="3" size="1">
        <span class="d-none d-sm-block">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search fa-sm"></i>&nbsp;Search</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <img src="img/flag/MY.png" height="20" alt="">
        &nbsp;
        <span class="font-weight-bold text-primary">MYR</span>
      </form>
  </div>  
  </div>   
</nav>

<?php
  include('view/modal/mcontact.php');
  include('view/modal/magencies.php');
?>