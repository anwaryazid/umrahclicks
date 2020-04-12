<div class="modal fade" data-backdrop="static" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Review</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-md">
          <form>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Name</label>
              <input class="form-control form-control-sm" id="rev_name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Review</label>
              <textarea class="form-control form-control-sm" id="message-text"></textarea>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Rating</label>
              <select class="form-control form-control-sm" id="rating">
                <option value="">Please Select</option>
                <option value="1">1 star</option>
                <option value="2">2 star</option>
                <option value="3">3 star</option>
                <option value="4">4 star</option>
                <option value="5">5 star</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-outline-primary" href="#">Submit</a>
        </div>
      </div>
    </div>
  </div>