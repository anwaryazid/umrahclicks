<?php
  include('view/modal/mpromo.php');
?>

<h1 class="h4 mb-2 text-gray-800">Promotion </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Promotion <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addPromo();">Add Promotion</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListPromo" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th></th>
            <th>Promo Code</th>
            <th>Promo Description</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Promo From</th>
            <th style="max-width: 200px;">Agency</th>
            <th>Status</th>
            <th style="max-width: 55px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>