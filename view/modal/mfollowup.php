<div class="modal fade" data-backdrop="static" id="followUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Update Follow Up</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formFollowUp" enctype="multipart/form-data">
        <div class="modal-body" style="height: 495px; overflow-y: auto;">
          <div class="row text-md">
            <div class="form-group col-md-6">
              <label class="col-form-label" >Name</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="guest_name" name="guest_name" disabled>

              <label class="col-form-label" >Mobile No.</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="guest_phoneNo" name="guest_phoneNo" disabled>

              <label class="col-form-label" >Email</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="guest_email" name="guest_email" disabled>

              <label class="col-form-label" >Confirmation Date</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="confirm_date" name="confirm_date" disabled>

              <label class="col-form-label" >Agency</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="agency_name" name="agency_name" disabled>

              <label class="col-form-label" >Package</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="package_name" name="package_name" disabled>

              <label class="col-form-label" >Pax</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="pax" name="pax" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="col-form-label" >Call Date Customer</label>
              <input class="form-control form-control-sm mb-2" id="cust_callDate" name="cust_callDate">

              <label class="col-form-label" >Customer Remarks</label>
              <input class="form-control form-control-sm mb-2" id="cust_remarks" name="cust_remarks">
              
              <label class="col-form-label" >Call Date Agency</label>
              <input class="form-control form-control-sm mb-2" id="agency_callDate" name="agency_callDate">            

              <label class="col-form-label" >Agency Remarks</label>
              <input class="form-control form-control-sm mb-2" id="agency_remarks" name="agency_remarks">

              <label class="col-form-label" >Follow Up Status</label>
              <select class="form-control form-control-sm mb-2 bg-white text-dark" id="fp_status" name="fp_status" disabled>
                <option value=""></option>
                <option value="1">Complete</option>
                <option value="0">Not Complete</option>
              </select>

              <label class="col-form-label" >Operator</label>
              <input class="form-control form-control-sm mb-2 bg-white text-dark" id="operator" name="operator" disabled value="<?php echo $_SESSION['userName']; ?>">

              <label class="col-form-label" >Completed Date</label>
              <input class="form-control form-control-sm mb-2 bg-white text-dark" id="complete_date" name="complete_date" disabled>
            </div>
          </div>
          <hr id="createdUpdatedHR">
          <div class="row text-md" id="createdUpdated">
            <div class="form-group col-md-6">    
              <div class="row">
                <label class="col-form-label col-sm-4" >Created By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="createdBy" name="createdBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Created Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="createdDate" name="createdDate" disabled>
                </div>
              </div>   
            </div>
            <div class="form-group col-md-6">
              <div class="row">
                <label class="col-form-label col-sm-4" >Updated By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="updatedBy" name="updatedBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Updated Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white" id="updatedDate" name="updatedDate" disabled>
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
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Add" />
        </div>
      </form>
    </div>
  </div>
</div>