<div class="modal fade" data-backdrop="static" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register Country</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-md">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Country Code</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Country Name</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Currency Code</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Currency Name</label>
            <input class="form-control form-control-sm" id="rev_name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Country',1,1);">Add</a>
      </div>
    </div>
  </div>
</div>