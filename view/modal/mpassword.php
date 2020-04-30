<div class="modal fade" data-backdrop="static" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Profile</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formPassword">
        <div class="modal-body text-md">  
          <div class="row">      
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">Full Name</label>
              <input class="form-control form-control-sm bg-white" id="cpuserFullName" name="cpuserFullName" disabled>
            </div>
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">User Name</label>
              <input class="form-control form-control-sm bg-white" id="cpuserName" name="cpuserName" disabled>
            </div>
          </div>
          <hr>
          <div class="row"> 
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">Current Password <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" type="password" id="cpuserPassword" name="cpuserPassword">
            </div>
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">New Password <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" type="password" id="cpuserNewPassword" name="cpuserNewPassword">
            </div>
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">Confirm Password <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" type="password" id="cpuserConfirmPassword" name="cpuserConfirmPassword">
              <small><span id="error_password_password" class="text-danger"></span></small>
            </div>  
          </div>      
        </div>
        <div class="modal-footer">
          <small><span id="error_text_password" class="text-danger"></span></small>
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input type="hidden" name="cpuserid" id="cpuserid" />
          <input type="hidden" name="operation_password" id="operation_password" />
          <input type="submit" name="action_password" id="action_password" class="btn btn-outline-primary btn-sm" value="Update" />
        </div>
      </form>
    </div>
  </div>
</div>