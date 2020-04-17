<nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-sm" style="background-color: #417dc1">
  <!-- <a class="navbar-brand mb-0" href="home.php"><i class="fas fa-fw fa-kaaba"></i>&nbsp;UmrahClicks.my</a> -->
  <a class="navbar-brand" href="home.php"><img class="d-block rounded-lg" src="img/umrahclicks-logo.JPG" height="40px" alt="UmrahClicks"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <!-- <span class="navbar-toggler-icon"></span> -->
    <i class="fas fa-search fa-sm fa-1x"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div style="font-size: .9rem; " class="d-none d-xl-block">
      <?php 
        $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
      ?>
      <div class="navbar-nav" style="text-transform: capitalize;">
        <a class="nav-item nav-link active" href="home.php">Home</a>
        <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a>
        <!-- <a class="nav-item nav-link <?php if ($page == 'search') { ?>active<?php } ?>" href="search.php">Packages</a> -->
        <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>           
      </div>    
    </div>
    <hr>
    <div class="float-lg-right text-white" style="font-size: .8rem; float: right;">
      <form class="form-inline">
        <i class="fas fa-plane-departure fa-sm mb-1 mt-1" style="font-size: 1.2rem;"></i>&nbsp;
        <span class="">Departure Date&nbsp;&nbsp;</span>
        <input type="text" class="form-control mb-1 mt-1 form-control-sm border-white text-white text-center" style="background-color:#417dc1" id="t_dateDepart" value="<?php echo $dateDepart; ?>" size="10">&nbsp;&nbsp;
        <i class="fas fa-male fa-sm mb-1 mt-1" style="font-size: 1.2rem;"></i>
        <i class="fas fa-female fa-sm mb-1 mt-1" style="font-size: 1.2rem;"></i>&nbsp;
        <span class="">Adult&nbsp;&nbsp;</span>
        <input type="text" class="form-control mb-1 mt-1 form-control-sm border-white text-white text-center input-number" style="background-color:#417dc1" id="t_noAdult" value="<?php echo $noAdult; ?>" size="2">&nbsp;&nbsp;
        <i class="fas fa-child fa-sm mb-1 mt-1" style="font-size: 1.2rem;"></i>&nbsp;
        <span class="">Children&nbsp;&nbsp;</span>
        <input type="text" class="form-control mb-1 mt-1 form-control-sm border-white text-white text-center input-number" style="background-color:#417dc1" id="t_noChild"  value="<?php echo $noChild; ?>" size="2">
        <span class="d-none d-sm-block">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <button class="btn btn-outline-light mb-1 mt-1 btn-sm" type="button" onClick="searchingT()">&nbsp;<i class="fas fa-search fa-sm"></i>&nbsp;Search&nbsp;</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <img src="img/flag/<?php echo $country; ?>-sq-32.png" height="23" alt="">
        &nbsp;
        <span class="font-weight-bold text-md"><?php echo $currency; ?></span>
      </form>
    </div>  
  </div>   
</nav>

<div class="alert alert-danger collapse" id="searchT-alert" style="font-size: 0.8rem;">
  <span id="textAlertSearch"></span>&nbsp;&nbsp;&nbsp;
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
  include('view/modal/mcontact.php');
  include('view/modal/magencies.php');
?>