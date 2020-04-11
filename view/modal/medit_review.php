<div class="modal fade" data-backdrop="static" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View Review</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="text-md">
          <div class="form-group row">
            <label for="posted_by" class="col-sm-4 col-form-label">Posted By</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="posted_by" value="Anwar" disabled>
            </div>

            <label for="rating" class="col-sm-4 col-form-label">Review</label>
            <div class="col-sm-8">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.
            </div>

            <label for="rating" class="col-sm-4 col-form-label">Rating</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="rating" value="5 star" disabled>
            </div>

            <label for="agency_review" class="col-sm-4 col-form-label">Agency</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="agency_review" value="Andalusia Travel & Tours Sdn Bhd" disabled>
            </div>

            <label for="package_review" class="col-sm-4 col-form-label">Package</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="package_review" value="Package Gold" disabled>
            </div>

            <label for="date_review" class="col-sm-4 col-form-label">Date</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="date_review" value="2020/01/14" disabled>
            </div>

            <label for="status" class="col-sm-4 col-form-label">Review Status</label>
            <div class="col-sm-8">
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Show</option>
                <option value="">Hide</option>
              </select>
            </div>
          </div>   
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Review',1,2);" >
          Save
        </a>
      </div>
    </div>
  </div>
</div>