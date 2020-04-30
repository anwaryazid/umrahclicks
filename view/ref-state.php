<?php
  include('view/modal/mstate.php');  
?>

<h1 class="h4 mb-2 text-gray-800">State</h1> 

<hr>

<div class="row">
  <div class="col-md-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-md">List of State <button style="float:right" class="btn btn-sm btn-primary text-xs" onclick="addState();">Add State</button></h6> 
      </div>
      <div class="card-body">        
        <div class="table-responsive text-md">
          <table class="table table-bordered" id="dt_ListState" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th></th>
                <th>State Code</th>
                <th>State Name</th>
                <th>State Abbr</th>
                <th>Country</th>
                <th style="width: 65px;">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

