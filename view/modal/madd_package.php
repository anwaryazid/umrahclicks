<div class="modal" data-backdrop="static" id="addPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register Package</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="height: 480px; overflow-y: auto;">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-6">

              <label for="" class="col-form-label">Agency</label>
              <select class="form-control form-control-sm" >
                <option value="">Please Select</option>
                <option value="">Al-Nile Tour & Travel Sdn Bhd</option>
                <option value="">Andalusia Travel & Tours Sdn Bhd</option>
                <option value="">Ash-Har Travel & Tours Sdn Bhd</option>
                <option value="">Batuta Travel & Tours Sdn Bhd</option>
              </select>

              <label for="" class="col-form-label">Package ID</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Package Name</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Package Status</label>
              <select class="form-control form-control-sm" >
                <option value="">Open</option>
                <option value="">Close</option>
              </select>

              <label for="" class="col-form-label">Remarks</label>
              <textarea type="text" class="form-control form-control-sm" rows="3"></textarea>

              <label for="" class="col-form-label">Date From</label>
              <input type="text" class="form-control form-control-sm" name="pck_date_from" id="pck_date_from" >
              
              <label for="" class="col-form-label">Date To</label>
              <input type="text" class="form-control form-control-sm" name="pck_date_to" id="pck_date_to" >

              <label for="" class="col-form-label">Actual Cost</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Umrah Cost</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
              </div>          

            </div>   
            <div class="col-md-6">

              <label for="" class="col-form-label">Makkah Hotel</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Distance Makkah Hotel</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Days in Makkah</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Madinah Hotel</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Distance Madinah Hotel</label>
              <input type="text" class="form-control form-control-sm" >              

              <label for="" class="col-form-label">Days in Madinah</label>
              <input type="text" class="form-control form-control-sm" >              

              <label for="" class="col-form-label">Flight Direct / Transit</label>
              <select class="form-control form-control-sm" >
                <option value="">Direct</option>
                <option value="">Transit</option>
              </select>

              <label for="" class="col-form-label">Meal</label>
              <select class="form-control form-control-sm" >
                <option value="">Provided</option>
                <option value="">Not Provided</option>
              </select>  
              
              <label for="" class="col-form-label">Mutawwif</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">1st Destination</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Ziarah</label>
              <textarea type="text" class="form-control form-control-sm" rows="4"></textarea>             
              
            </div>           
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#addPackage2Modal" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Package',1,1);" >
          Add Package
        </a>        
      </div>
    </div>
  </div>
</div>