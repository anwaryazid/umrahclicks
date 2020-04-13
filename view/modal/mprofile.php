<div class="modal fade" data-backdrop="static" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Profile</h5>
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
            <label for="message-text" class="col-form-label">Email Address</label>
            <input class="form-control form-control-sm" id="rev_email">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <input class="form-control form-control-sm" id="rev_password" type="password">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Confirm Password</label>
            <input class="form-control form-control-sm" id="rev_cpassword" type="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-success" href="#">Update</a>
      </div>
    </div>
  </div>
</div>