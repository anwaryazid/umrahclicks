<?php
  include('view/modal/madd_user.php');
  include('view/modal/medit_user.php');
?>

<h1 class="h3 mb-2 text-gray-800">User Management </h1> 

<hr>

<?php include('view/modal/malert.php'); ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of User <button style="float:right" class="btn btn-sm btn-primary text-xs" data-toggle="modal" data-target="#addUserModal">Add User</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>User Type</th>
            <th>Group Type</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>    
          <tr>
            <td>Muhammad Anwar Bin Mohd Yazid</td>
            <td>anwar</td>
            <td>m.anwaryazid@gmail.com</td>
            <td>Administrator</td>
            <td>Administrator</td>
            <td class="text-center">
              <h6><span class="badge badge-secondary" style="display: block;">Inactive</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editUserModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove" onClick="showAlert('User',1,3);"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>         
        </tbody>
      </table>
    </div>
  </div>
</div>