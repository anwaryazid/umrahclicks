<div class="modal fade" data-backdrop="static" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-md">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Full Name</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">User Name</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email Address</label>
            <input class="form-control form-control-sm" id="rev_email">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">User Type</label>
            <select class="form-control form-control-sm" id="user_type">
              <option value="">Please Select</option>
              <option value="Administrator">Administrator</option>
              <option value="Superuser">Superuser</option>
              <option value="User">User</option>
            </select>
          </div>
          <!-- <div class="form-group" style="display: none;"> -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">User Access</label>
            <select class="form-control form-control-sm" multiple>
              <option>Dashboard</option>
              <option>Agency</option>
              <option>Packages</option>
              <option>Advertisment</option>
              <option>Promotion</option>
              <option>Follow Up</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('User',1,2);">Save</a>
      </div>
    </div>
  </div>
</div>