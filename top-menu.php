<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <a class="navbar-brand mb-0" href="home.php"><i class="fas fa-fw fa-kaaba"></i>&nbsp;UmrahClicks.my</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div style="font-size: .9rem; ">
      <?php 
        $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
      ?>
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a>
        <!-- <a class="nav-item nav-link <?php if ($page == 'search') { ?>active<?php } ?>" href="search.php">Packages</a> -->
        <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>           
      </div>    
    </div>
    <hr>
    <div class="float-lg-right text-white" style="font-size: .8rem; float: right;">
      <form class="form-inline">
        Departure Date&nbsp;
        <input type="text" class="form-control form-control-xs bg-primary text-white text-center" id="t_dateDepart" value="<?php echo $dateDepart; ?>" size="10">&nbsp;
        Adult&nbsp;
        <input type="text" class="form-control form-control-xs bg-primary text-white text-center" id="t_noAdult" value="<?php echo $noAdult; ?>" size="2">&nbsp;
        Children&nbsp;
        <input type="text" class="form-control form-control-xs bg-primary text-white text-center" id="t_noChild"  value="<?php echo $noChild; ?>" size="2">
        <span class="d-none d-sm-block">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <button class="btn btn-outline-light my-2 my-sm-0 btn-sm" type="button" onClick="searchingT()">&nbsp;<i class="fas fa-search fa-sm"></i>&nbsp;Search&nbsp;</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <img src="img/flag/<?php echo $country; ?>.png" height="20" alt="">
        &nbsp;
        <span class="font-weight-bold"><?php echo $currency; ?></span>
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