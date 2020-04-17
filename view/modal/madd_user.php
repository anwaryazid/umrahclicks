<div class="modal fade" data-backdrop="static" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-md">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-12">
              <label for="" class="col-form-label">Full Name</label>
              <input class="form-control form-control-sm" id="rev_name">
              
              <label for="" class="col-form-label">User Name</label>
              <input class="form-control form-control-sm" id="rev_name">
              
              <label for="" class="col-form-label">Email Address</label>
              <input class="form-control form-control-sm" id="rev_email">
              
              <label for="" class="col-form-label">User Type</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exampleRadios" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                  Administrator
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exampleRadios" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                  Superuser
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exampleRadios" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                  User
                  </label>
                </div>
              </div>              
              
              <label for="" class="col-form-label">User Access</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck1">
                Dashboard
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck2">
                Agency
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck1">
                Packages
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck2">
                Advertisment
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck1">
                Promotion
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="defaultCheck2">
                Follow Up
                </label>
              </div>              
            </div>            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary btn-sm" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('User',1,1);">Add User</a>
      </div>
    </div>
  </div>
</div>