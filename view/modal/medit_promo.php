<div class="modal fade" data-backdrop="static" id="editPromoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View Promotion</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="height: 495px; overflow-y: auto;">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-6">

              <label for="" class="col-form-label">Promo From</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="optradio" checked>&nbsp;Company</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="optradio">&nbsp;Agency</label>
              </div>
              <!-- <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Company</option>
                <option value="">Agency</option>
              </select> -->

              <label for="" class="col-form-label">Agency</label>
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Al-Nile Tour & Travel Sdn Bhd</option>
                <option value="">Andalusia Travel & Tours Sdn Bhd</option>
                <option value="">Ash-Har Travel & Tours Sdn Bhd</option>
                <option value="">Batuta Travel & Tours Sdn Bhd</option>
              </select>

              <label for="" class="col-form-label">Promo Code</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Promo Description</label>
              <textarea type="text" class="form-control form-control-sm"  rows="1"></textarea>

              <label for="" class="col-form-label">Date From</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Date To</label>
              <input type="text" class="form-control form-control-sm" > 

            </div>   
            <div class="col-md-6">
              <label for="" class="col-form-label">Promo Status</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="status" checked>&nbsp;Active</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="status">&nbsp;Inactive</label>
              </div>

              <label for="" class="col-form-label">Pax (Quantity)</label>
              <input type="text" class="form-control form-control-sm" >              

              <label for="" class="col-form-label">Promo Variable</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="variable" checked>&nbsp;Percentage</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="variable">&nbsp;Amount</label>
              </div>
              <!-- <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Percentage</option>
                <option value="">Amount</option>
              </select> -->
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Promo Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>

              <label for="" class="col-form-label">Created Date</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Operator</label>
              <input type="text" class="form-control form-control-sm" >

            </div>           
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Promo',1,2);" >
          Save
        </a>
      </div>
    </div>
  </div>
</div>