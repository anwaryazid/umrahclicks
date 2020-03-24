<?php
  include('view/modal/madd_promo.php');
  include('view/modal/medit_promo.php');
?>

<h1 class="h3 mb-2 text-gray-800">Promotion </h1> 

<hr>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Promotion <button class="btn btn-sm btn-success text-xs" data-toggle="modal" data-target="#addPromoModal">Add Promotion</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Promotion Code</th>
            <th>Promotion Description</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Promo From</th>
            <th>Agency</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>          
          <tr>
            <td>ALNILE10</td>
            <td>Get 10% discount</td>
            <td>2020/05/09</td>
            <td>2020/05/15</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>Agency</td>
            <td>
              <h6><span class="badge badge-primary" style="display: block;">Active</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editPromoModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>ALNILE15</td>
            <td>Get RM15 discount</td>
            <td>2020/05/09</td>
            <td>2020/05/15</td>
            <td>Al-Nile Tour & Travel Sdn Bhd</td>
            <td>Agency</td>
            <td>
              <h6><span class="badge badge-secondary" style="display: block;">Inactive</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editPromoModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>UMRAH4ALL</td>
            <td>Promotion 40% discount</td>
            <td>2020/05/09</td>
            <td>2020/05/15</td>
            <td></td>
            <td>Company</td>
            <td>
              <h6><span class="badge badge-primary" style="display: block;">Active</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editPromoModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
              <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>