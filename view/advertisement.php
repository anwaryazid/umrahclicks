<?php
  include('view/modal/madvertisement.php');
?>

<h1 class="h4 mb-2 text-gray-800">Advertisement </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Advertisement <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addAdvert();">Add Advertisement</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListAdvert" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th></th>
            <th style="max-width: 150px;">Company Reg. No.</th>
            <th>Company Name</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Remarks</th>
            <th>Status</th>
            <th style="max-width: 55px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>