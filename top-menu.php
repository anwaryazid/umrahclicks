<nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm" style="background-color: white;">
  <a class="navbar-brand text-primary mb-0 h1" href="search.php">UmrahClicks.my</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse float-right" id="navbarNavAltMarkup">
    <?php 
      $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    ?>
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="search.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#agenciesModal">Agencies</a>
      <a class="nav-item nav-link <?php if ($page == 'packages') { ?>active<?php } ?>" href="packages.php">Packages</a>
      <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>           
    </div>    
  </div>
  <div class="float-right" style="font-size: .8rem;">
    <form class="form-inline">
      Date Depart From&nbsp;
      <input type="text" class="form-control form-control-sm" id="date_Depart" value="28/03/2020" size="10">&nbsp;
      Adult&nbsp;
      <input type="text" class="form-control form-control-sm" id="no_adult" value="3" size="1">&nbsp;
      Children&nbsp;
      <input type="text" class="form-control form-control-sm" id="no_children"  value="3" size="1">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search fa-sm"></i>&nbsp;Search</button>
    </form>
  </div> 
</nav>

<?php
  include('view/modal/mcontact.php');
  include('view/modal/magencies.php');
?>