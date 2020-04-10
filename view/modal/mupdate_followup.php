<div class="modal fade" data-backdrop="static" id="updateFollowUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Follow Up</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="height: 495px; overflow-y: auto;">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-6">

              <label for="" class="col-form-label">Name</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Mobile No.</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Email</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Agency Name</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Package</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Pax</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Confirmation Date</label>
              <input type="text" class="form-control form-control-sm" >

            </div>   
            <div class="col-md-6">
              
              <label for="" class="col-form-label">Call Date Customer</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Customer Remarks</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Call Date Agency</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Agency Remarks</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Operator</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Follow Up Status</label>
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Complete</option>
                <option value="">Not Complete</option>
              </select>

            </div>           
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Follow Up',1,2);" >
          Update
        </a>
      </div>
    </div>
  </div>
</div>