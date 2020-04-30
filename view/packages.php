<?php include('view/modal/malert.php'); ?>

<?php
  include('view/modal/mpackage.php');
  include('view/modal/mroom.php');
  include('view/modal/mimage.php');
?>

<h1 class="h4 mb-2 text-gray-800">Packages </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Packages <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addPackage();">Add Package</button></h6> 
  </div>
  <div class="card-body">
    <!-- <button class="btn btn-sm btn-primary text-xs" type="button" onclick="addRoom(1);">Test</button> -->
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListPackage" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th></th>
            <th>Packages Name</th>
            <th style="width: 350px;">Agency</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Status</th>
            <th style="width: 55px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>