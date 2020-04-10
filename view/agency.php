<?php
  include('view/modal/madd_agency.php');
  include('view/modal/medit_agency.php');
?>

<h1 class="h3 mb-2 text-gray-800">Agency </h1> 

<hr>

<?php include('view/modal/malert.php'); ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Agency <button style="float:right" class="btn btn-sm btn-primary text-xs" data-toggle="modal" data-target="#addAgencyModal">Add Agency</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Agency ID</th>
            <th>Agency Name</th>
            <th>LKU Number</th>
            <th>LKU Expiry Date</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>          
          <tr>
            <td>616455-K</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>6043</td>
            <td>2020/03/28</td>
            <td class="text-center">
              <h6><span class="badge badge-secondary" style="display: block;">Inactive</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editAgencyModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>616435-K</td>
            <td>Andalusia Travel & Tours Sdn Bhd</td>
            <td>6044</td>
            <td>2020/03/28</td>
            <td class="text-center">
              <h6><span class="badge badge-danger" style="display: block;">Block</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editAgencyModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>612455-K</td>
            <td>Ash-Har Travel & Tours Sdn Bhd</td>
            <td>6042</td>
            <td>2020/03/28</td>
            <td class="text-center">
              <h6><span class="badge badge-info" style="display: block;">Full</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editAgencyModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>616445-K</td>
            <td>Batuta Travel & Tours Sdn Bhd</td>
            <td>6041</td>
            <td>2020/03/28</td>
            <td class="text-center">
              <h6><span class="badge badge-primary" style="display: block;">Active</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editAgencyModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>          
        </tbody>
      </table>
    </div>
  </div>
</div>

