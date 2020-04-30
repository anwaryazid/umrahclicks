<div class="modal fade" data-backdrop="static" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Profile</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formProfile">
        <div class="modal-body text-md">  
          <div class="row">      
            <div class="form-group col-md-12">
              <label for="message-text" class="col-form-label">Full Name</label>
              <input class="form-control form-control-sm bg-white" id="puserFullName" name="puserFullName" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="message-text" class="col-form-label">User Name</label>
              <input class="form-control form-control-sm bg-white" id="puserName" name="puserName" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="message-text" class="col-form-label">Email Address</label>
              <input class="form-control form-control-sm bg-white" id="puserEmail" name="puserEmail" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="message-text" class="col-form-label">User Status</label>
              <select  class="form-control form-control-sm bg-white" id="puserStatus" name="puserStatus" disabled>
                <option value=""></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="message-text" class="col-form-label">User Type</label>
              <select  class="form-control form-control-sm bg-white" id="puserType" name="puserType" disabled>
                <option value=""></option>
                <option value="1">Administrator</option>
                <option value="2">Superuser</option>
                <option value="3">User</option>
              </select>
            </div>
          </div>      
        </div>
        <div class="modal-footer">
          <small><span id="error_text_profile" class="text-danger"></span></small>
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
          <input type="hidden" name="userid" id="userid" />
          <input type="hidden" name="operation_profile" id="operation_profile" />
          <!-- <input type="submit" name="action_profile" id="action_profile" class="btn btn-outline-primary btn-sm" value="Update" /> -->
        </div>
      </form>
    </div>
  </div>
</div>