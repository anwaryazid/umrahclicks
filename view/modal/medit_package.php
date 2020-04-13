<div class="modal fade" data-backdrop="static" id="editPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View Package</h5>
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
              <input type="text" class="form-control form-control-sm" name="u_pck_date_from" id="u_pck_date_from" >
              
              <label for="" class="col-form-label">Date To</label>
              <input type="text" class="form-control form-control-sm" name="u_pck_date_to" id="u_pck_date_to" >

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

              <label for="" class="col-form-label">Created Date</label>
              <input type="text" class="form-control form-control-sm" value="2020/04/01" disabled style="background-color: white;">

              <label for="" class="col-form-label">Updated Date</label>
              <input type="text" class="form-control form-control-sm" value="2020/04/01" disabled style="background-color: white;">

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

              <label for="" class="col-form-label">Flight</label>
              <input type="text" class="form-control form-control-sm" >

              <label for="" class="col-form-label">Direct / Transit</label>
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
          <hr>
          <div class="form-group row text-md">
            <div class="col-md-5">
              <label for="" class="">Room Type</label>
              <input type="text" class="form-control form-control-sm" >
            </div>
            <div class="col-md-3">
              <label for="" class="">Price (RM)</label>
              <input type="text" class="form-control form-control-sm" >
            </div>
            <div class="col-md-2">
              <label for="" class="">Pax</label>
              <input type="text" class="form-control form-control-sm" >   
            </div>
            <div class="col-md-2">
              <label for="" class="">&nbsp;</label>
              <button class="btn btn-outline-primary btn-sm form-control form-control-sm" type="button" onClick="showAlert('Room',1,4);" >Add Room</button>
            </div>
          </div>
          <div class="row text-md">
            <div class="col-md-12">
              <div class="text-md">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="45%">Room Type</th>
                      <th width="30%">Price (RM)</th>
                      <th width="15%">Pax</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Double Bed</td>
                      <td class="text-right">6,200.00</td>
                      <td class="text-center">10</td>
                      <td class="text-center">
                        <button class="btn btn-danger btn-xs" type="button" title="Remove" onClick="showAlert('Room',2,3);"><i class="fas fa-trash fa-sm"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Triple Bed</td>
                      <td class="text-right">7,200.00</td>
                      <td class="text-center">10</td>
                      <td class="text-center">
                        <button class="btn btn-danger btn-xs" type="button" title="Remove" onClick="showAlert('Room',2,3);"><i class="fas fa-trash fa-sm"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> 
            </div>            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Package',1,2);" >
          Save
        </a>
      </div>
    </div>
  </div>
</div>