<?php
  include('view/modal/madd_country.php');
  include('view/modal/medit_country.php');
?>

<h1 class="h3 mb-2 text-gray-800">Country</h1> 

<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-md">List of Country <button style="float:right" class="btn btn-sm btn-primary text-xs" data-toggle="modal" data-target="#addCountryModal">Add Country</button></h6> 
      </div>
      <div class="card-body">        
        <div class="table-responsive text-md">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>Currency Code</th>
                <th>Currency Name</th>
                <th style="width: 65px;">Action</th>
              </tr>
            </thead>
            <tbody>    
              <tr>
                <td>MY</td>
                <td>Malaysia</td>
                <td>MYR</td>
                <td>Malaysian Ringgit</td>
                <td class="text-center">
                  <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editCountryModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
                  <button class="btn btn-outline-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
                </td>
              </tr>         
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

