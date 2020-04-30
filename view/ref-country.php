<?php
  include('view/modal/mcountry.php');
?>

<h1 class="h4 mb-2 text-gray-800">Country</h1> 

<hr>

<div class="row">
  <div class="col-md-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-md">List of Country <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addCountry();">Add Country</button></h6> 
      </div>
      <div class="card-body">        
        <div class="table-responsive text-md">
          <table class="table table-bordered" id="dt_ListCountry" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th></th>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>Currency Code</th>
                <th>Currency Name</th>
                <th style="width: 65px;">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

