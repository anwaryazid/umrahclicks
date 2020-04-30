<?php
  include('view/modal/magency.php');
?>

<h1 class="h4 mb-2 text-gray-800">Agency </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Agency <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addAgency();">Add Agency</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListAgency" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th></th>
            <th>Agency Reg. No.</th>
            <th style="width: 350px;">Agency Name</th>
            <th>LKU Number</th>
            <th>LKU Expiry Date</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

