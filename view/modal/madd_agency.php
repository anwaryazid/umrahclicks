<div class="modal fade" data-backdrop="static" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register Agency</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="height: 480px; overflow-y: auto;">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-6">
              <label for="" class="col-form-label">Agency ID</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Agency Name</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Agency Logo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
              </div>

              <label for="" class="col-form-label">Address</label>
              <textarea type="text" class="form-control form-control-sm"  rows="2"></textarea>

              <label for="" class="col-form-label">Postcode</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">City</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Country</label>
              <select class="form-control form-control-sm" id="country1">
                <option value="">Please Select</option>
                <option value="Malaysia">Malaysia</option>
              </select>

              <label for="" class="col-form-label">Contact No.</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Email Address</label>
              <input type="text" class="form-control form-control-sm" >
            </div>   
            <div class="col-md-6">
              <label for="" class="col-form-label">Agency Status</label>
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Active</option>
                <option value="">Inactive</option>
                <option value="">Block</option>
                <option value="">Full</option>
              </select>

              <label for="" class="col-form-label">Register Date</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Updated Date</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">LKU No.</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">LKU Expiry Date</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Agency Info</label>
              <textarea type="text" class="form-control form-control-sm"  rows="3"></textarea>              

              <label for="" class="col-form-label">Contact Person</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Contact Person No.</label>
              <input type="text" class="form-control form-control-sm" >

            </div>           
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" >
          Add
        </a>
      </div>
    </div>
  </div>
</div>