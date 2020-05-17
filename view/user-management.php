<?php
  include('view/modal/muser.php');
?>

<h1 class="h4 mb-2 text-gray-800">User Management </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Users <button style="float:right" class="btn btn-sm btn-primary text-xs <?= $create ?>" onclick="addUser();">Add User</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListUser" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th></th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>User Type</th>
            <th>Group Type</th>
            <th style="width: 75px;">Status</th>
            <th style="min-width: 85px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>