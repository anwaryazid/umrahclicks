<?php
  include('view/modal/mupdate_followup.php');
?>

<h1 class="h3 mb-2 text-gray-800">Follow Up </h1> 

<hr>

<?php include('view/modal/malert.php'); ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Follow Up</h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Mobile No.</th>
            <th>Email Address</th>
            <th>Package</th>
            <th>Agency</th>
            <th>Confirm Date</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>     
          <tr>
            <td>Abu Bin Bakar</td>
            <td>0172345678</td>
            <td>abu@gmail.com</td>
            <td>Package Gold</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>2020/03/02</td>
            <td>
              <h6><span class="badge badge-danger" style="display: block;">Not Complete</span></h6>              
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#updateFollowUpModal" title="Update"><i class="fas fa-pencil-alt fa-sm"></i></button>
            </td>
          </tr>     
          <tr>
            <td>Ahmad Bin Samad</td>
            <td>0172345678</td>
            <td>ahmad@gmail.com</td>
            <td>Package Gold</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>2020/03/02</td>
            <td>
              <h6><span class="badge badge-primary" style="display: block;">Complete</span></h6>              
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#updateFollowUpModal" title="Update"><i class="fas fa-pencil-alt fa-sm"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>