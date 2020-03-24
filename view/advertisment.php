<?php
  include('view/modal/madd_adv.php');
  include('view/modal/medit_adv.php');
?>

<h1 class="h3 mb-2 text-gray-800">Advertisment </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Advertisment <button class="btn btn-sm btn-success text-xs" data-toggle="modal" data-target="#addAdvModal">Add Advertisment</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Company Reg. No.</th>
            <th>Company Name</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Remarks</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>          
          <tr>
            <td>616455-K</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>2020/03/28</td>
            <td>2020/03/28</td>
            <td></td>
            <td class="text-center">
              <h6><span class="badge badge-primary" style="display: block;">Active</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editAdvModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>