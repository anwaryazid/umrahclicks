<div class="modal fade" data-backdrop="static" id="agencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Agency</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formAgency" enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 480px; overflow-y: auto;"> 
          <div id="logo">
            <div class="row">
              <div class="col-sm-12 text-center">
                <span id="agency_uploaded_image"></span>
              </div>            
            </div>    
          </div>  
          
          <div class="row text-md">
            <div class="form-group col-md-6">            

              <label class="col-form-label">Agency Name <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="agency_name" name="agency_name">

              <label class="col-form-label">Address 1 </label>
              <input class="form-control form-control-sm mb-2" id="agency_address1" name="agency_address1">

              <label class="col-form-label">Address 2 </label>
              <input class="form-control form-control-sm mb-2" id="agency_address2" name="agency_address2">

              <label class="col-form-label">Postcode </label>
              <input class="form-control form-control-sm mb-2 input-number" id="agency_postcode" name="agency_postcode">

              <label class="col-form-label">City </label>
              <input class="form-control form-control-sm mb-2" id="agency_city" name="agency_city">

              <?php 
              require_once('lib/conn.php');  
              $countryList = $conn->query("SELECT * FROM ref_country ORDER BY id");
              $stateList = $conn->query("SELECT * FROM ref_state WHERE kod NOT IN ('15','98','99') ORDER BY keterangan");
              ?> 

              <label class="col-form-label">State </label>
              <select class="form-control form-control-sm mb-2" id="agency_state" name="agency_state">
                <option value="" selected></option>
                <?php
                while($rows = $stateList->fetch_assoc())
                {
                  $stateName = $rows['keterangan'];
                  $stateID = $rows['id'];
                  ($state == $stateID) ? $selected = "selected" : $selected = " ";
                  echo "<option value='$stateID' $selected>$stateName</option>";
                }
                ?>
              </select>

              <label class="col-form-label">Country </label>              
              <select class="form-control form-control-sm mb-2" id="agency_country" name="agency_country">
                <option value="" selected></option>
                <?php
                while($rows = $countryList->fetch_assoc())
                {
                  $countryName = $rows['keterangan'];
                  $countryID = $rows['id'];
                  ($country == $countryID) ? $selected = "selected" : $selected = " ";
                  echo "<option value='$countryID' $selected>$countryName</option>";
                }
                ?>
              </select>

              <label class="col-form-label">Contact No. <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2 input-number" id="agency_contactNo" name="agency_contactNo">

              <label class="col-form-label">Email Address <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="agency_email" name="agency_email">           

            </div>           
            <div class="form-group col-md-6">

              <label class="col-form-label">Agency ID (Company Register No.) <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="agency_regNo" name="agency_regNo">

              <label class="col-form-label <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>">Agency Status <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2 <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>" id="agency_status" name="agency_status">
                <option value=" "></option>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
                <option value="2">Block</option>
                <option value="3">Full</option>
              </select>

              <label class="col-form-label">Agency Logo </label>
              <input type="file" class="form-control-file form-control-sm mb-2 mb-2" id="agency_image" name="agency_image" aria-describedby="agency_image">              
              <span id="agency_image_input"></span>

              <label class="col-form-label">LKU No. <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="agency_LKUNo" name="agency_LKUNo">

              <label class="col-form-label">LKU Expiry Date <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="agency_LKUExpiryDate" name="agency_LKUExpiryDate">

              <label class="col-form-label">Agency Info </label>
              <input class="form-control form-control-sm mb-2" id="agency_info" name="agency_info">

              <label class="col-form-label <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>">Company Rating </label>
              <select class="form-control form-control-sm mb-2 <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>" id="agency_rating" name="agency_rating">
                <option value=" " selected></option>
                <option value="1">1 star</option>
                <option value="2">2 star</option>
                <option value="3">3 star</option>
                <option value="4">4 star</option>
                <option value="5">5 star</option>
              </select>

              <label class="col-form-label">Contact Person</label>
              <input class="form-control form-control-sm mb-2" id="agency_contactPerson" name="agency_contactPerson">

              <label class="col-form-label">Contact Person No.</label>
              <input class="form-control form-control-sm mb-2 input-number" id="agency_contactPersonNo" name="agency_contactPersonNo">         

            </div> 
            
          </div> 
          <hr id="createdUpdatedHR">
          <div class="row text-md <?php if($_SESSION['userType'] == 4) { ?>d-none<?php } ?>" id="createdUpdated">
            <div class="form-group col-md-6">    
              <div class="row">
                <label class="col-form-label col-sm-4" >Created By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdBy" name="createdBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Created Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdDate" name="createdDate" disabled>
                </div>
              </div>   
            </div>
            <div class="form-group col-md-6">
              <div class="row">
                <label class="col-form-label col-sm-4" >Updated By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedBy" name="updatedBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Updated Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedDate" name="updatedDate" disabled>
                </div>
              </div>
            </div>
          </div>         
        </div>
        <div class="modal-footer">
          <small><span id="error_text" class="text-danger"></span></small>
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm " value="Add" />
        </div>
      </form>
    </div>
  </div>
</div>