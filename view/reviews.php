<?php
  include('view/modal/medit_review.php');
?>

<h1 class="h4 mb-2 text-gray-800">Reviews</h1> 

<hr>

<?php include('view/modal/malert.php'); ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Reviews</h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListReview" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Posted By</th>
            <th width="30%">Reviews</th>
            <th>Rating</th>
            <th>Agency / Package</th>
            <th>Date</th>
            <th>Status</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
        <tbody>     
          <tr>
            <td>Anwar</td>
            <td>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.
            </td>
            <td class="text-center">5 star</td>
            <td>EPL Travel & Tours Sdn Bhd / Package Gold</td>
            <td>2020/01/14</td>
            <td class="text-center">
              <h6><span class="badge badge-success" style="display: block;">Show</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editReviewModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
            </td>
          </tr>
          <tr>
            <td>Anwar</td>
            <td>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.
            </td>
            <td class="text-center">1 star</td>
            <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
            <td>2020/01/14</td>
            <td class="text-center">
              <h6><span class="badge badge-danger" style="display: block;">Hide</span></h6>
            </td>
            <td class="text-center">
              <button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editReviewModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>
            </td>
          </tr>    
        </tbody>
      </table>
    </div>
  </div>
</div>