<?php
  include('view/modal/madd_package.php');
  include('view/modal/medit_package.php');
?>

<h1 class="h3 mb-2 text-gray-800">Packages </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Packages <button style="float:right" class="btn btn-sm btn-primary text-xs" data-toggle="modal" data-target="#addPackageModal">Add Packages</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Packages ID</th>
            <th>Packages Name</th>
            <th>Agency</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>          
          <tr>
            <td>Gold</td>
            <td>Package Gold</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>2020/03/24</td>
            <td>2020/04/24</td>
            <td class="text-center">
              <h6><span class="badge badge-primary" style="display: block;">Open</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editPackageModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>Gold</td>
            <td>Package Gold</td>
            <td>Andalusia Travel & Tours Sdn Bhd</td>
            <td>2020/03/24</td>
            <td>2020/04/24</td>
            <td class="text-center">
              <h6><span class="badge badge-primary" style="display: block;">Open</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editPackageModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>Gold</td>
            <td>Package Gold</td>
            <td>Ash-Har Travel & Tours Sdn Bhd</td>
            <td>2020/03/24</td>
            <td>2020/04/24</td>
            <td class="text-center">
              <h6><span class="badge badge-primary" style="display: block;">Open</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editPackageModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>Gold</td>
            <td>Package Gold</td>
            <td>Batuta Travel & Tours Sdn Bhd</td>
            <td>2020/03/24</td>
            <td>2020/04/24</td>
            <td class="text-center">
              <h6><span class="badge badge-secondary" style="display: block;">Close</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editPackageModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-outline-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>