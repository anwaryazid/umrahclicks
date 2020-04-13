<div class="modal fade" data-backdrop="static" id="editAdvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View Advertisment</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="height: 495px; overflow-y: auto;">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-6">

              <label for="" class="col-form-label">Company Register No.</label>
              <input type="text" class="form-control form-control-sm" >              

              <label for="" class="col-form-label">Company Name</label>
              <input type="text" class="form-control form-control-sm" >              

              <label for="" class="col-form-label">Contact No.</label>
              <input type="text" class="form-control form-control-sm" >   
              
              <label for="" class="col-form-label">Email Address</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Contact Person</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Website</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Operator</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Created Date</label>
              <input type="text" class="form-control form-control-sm" value="2020/04/01" disabled style="background-color: white;">

            </div>   
            <div class="col-md-6">

              <label for="" class="col-form-label">Advertisment Status</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="status" checked>&nbsp;Active</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="status">&nbsp;Inactive</label>
              </div>      
              
              <!-- <label for="" class="col-form-label">Company Status</label>
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Active</option>
                <option value="">Inactive</option>
              </select>     -->

              <label for="" class="col-form-label">Remarks</label>
              <input type="text" class="form-control form-control-sm" >
              <!-- <textarea type="text" class="form-control form-control-sm"  rows="5"></textarea> -->

              <label for="" class="col-form-label">Image Advertisment</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>

              <label for="" class="col-form-label">Date From</label>
              <input type="text" class="form-control form-control-sm" name="u_adv_date_from" id="u_adv_date_from" >

              <label for="" class="col-form-label">Date To</label>
              <input type="text" class="form-control form-control-sm" name="u_adv_date_to" id="u_adv_date_to" >

              <label for="" class="col-form-label">Remark</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Price</label>
              <input type="text" class="form-control form-control-sm" >               
              

              <label for="" class="col-form-label">Updated Date</label>
              <input type="text" class="form-control form-control-sm" value="2020/04/01" disabled style="background-color: white;">
              
            </div>           
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Advertisment',1,2);" >
          Save
        </a>
      </div>
    </div>
  </div>
</div>