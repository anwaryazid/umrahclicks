<div class="modal fade" data-backdrop="static" id="advertModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Advertisement</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formAdvert" enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 495px; overflow-y: auto;">        
          <div class="row text-md">
            <div class="form-group col-md-6">
              <label class="col-form-label">Company Register No. <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_companyRegNo" name="ad_companyRegNo">              

              <label class="col-form-label">Company Name <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_companyName" name="ad_companyName">              

              <label class="col-form-label">Tel. No.</label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_companyTelNo" name="ad_companyTelNo">   
              
              <label class="col-form-label">Email Address</label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_companyEmail" name="ad_companyEmail">

              <label class="col-form-label">Contact Person <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_contactPerson" name="ad_contactPerson">

              <label class="col-form-label">Contact Person No. <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_contactPersonNo" name="ad_contactPersonNo">

              <label class="col-form-label">Website <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_website" name="ad_website">

              <label class="col-form-label">Operator</label>
              <input type="text" class="form-control form-control-sm mb-2 bg-white text-dark" id="ad_operator" name="ad_operator" disabled value="<?php echo $_SESSION['userName']; ?>">
            </div>   
            <div class="form-group col-md-6">
              <label class="col-form-label">Advertisement Status <small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="ad_status" name="ad_status">
                <option value=" "></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>          
              
              <label class="col-form-label">Company Status <small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="ad_companyStatus" name="ad_companyStatus">
                <option value=" "></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>    

              <label class="col-form-label">Remark</label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_remark" name="ad_remark">              

              <label class="col-form-label">Date From <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_dateFrom" name="ad_dateFrom">

              <label class="col-form-label">Date To <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" name="ad_dateTo" id="ad_dateTo" >

              <label class="col-form-label">Price (RM) <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="ad_price" name="ad_price">  

              <label class="col-form-label">Image Advertisement <small><span class="text-danger">*</span></small></label>
              <input type="file" class="form-control form-control-sm mb-2" id="ad_image" name="ad_image" aria-describedby="ad_image">              
              <span id="ad_image_input"></span>
              <span id="ad_uploaded_image"></span>
            </div>           
          </div>
          <hr id="createdUpdatedHR">
          <div class="row text-md" id="createdUpdated">
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
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Add" />
        </div>
      </form>
    </div>
  </div>
</div>