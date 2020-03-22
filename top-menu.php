<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="search.php">UmrahClicks.my</a>
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
</nav>

<?php
  include('view/modal/mcontact.php');
  include('view/modal/magencies.php');
?>