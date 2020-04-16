<div class="modal" data-backdrop="static" id="addPackage2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register Package</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-4">
              <label for="" class="">Room Type</label>
              <input type="text" class="form-control form-control-sm" >
            </div>
            <div class="col-md-3">
              <label for="" class="">Actual Cost (RM)</label>
              <input type="text" class="form-control form-control-sm" >
            </div>
            <div class="col-md-3">
              <label for="" class="">Actual Cost (RM)</label>
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
                      <th width="40%">Room Type</th>
                      <th width="25%">Price (RM)</th>
                      <th width="25%">Price (RM)</th>
                      <!-- <th width="15%">Pax</th> -->
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Double Bed</td>
                      <td class="text-right">6,200.00</td>
                      <td class="text-right">6,000.00</td>
                      <td class="text-center">
                        <button class="btn btn-outline-danger btn-xs" type="button" title="Remove" onClick="showAlert('Room',2,3);"><i class="fas fa-trash fa-sm"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Triple Bed</td>
                      <td class="text-right">7,200.00</td>
                      <td class="text-right">7,000.00</td>
                      <td class="text-center">
                        <button class="btn btn-outline-danger btn-xs" type="button" title="Remove" onClick="showAlert('Room',2,3);"><i class="fas fa-trash fa-sm"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> 
            </div>            
          </div>
          <!-- <div class="form-group row">
            <div class="col-md-12">
              <button class="btn btn-outline-primary btn-sm" type="button" onClick="showAlert('Room',1,1);" >Add</button>
            </div>
          </div> -->
        </form>
                 
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-secondary btn-sm" href="#" data-toggle="modal" data-dismiss="modal" >
          Close
        </a>
      </div>
    </div>
  </div>
</div>