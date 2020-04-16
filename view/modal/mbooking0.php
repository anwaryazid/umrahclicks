<div class="modal" data-backdrop="static" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Booking Information</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- <small class="text-primary">Please enter information person in charge</small> -->
          <div class="alert alert-primary" role="alert" style="font-size: .8rem">
            Please enter information person in charge
          </div>
          <hr>
          <div class="form-group row text-md">
            <div class="col-md-12">
              <label for="" class="col-form-label">Full Name</label>
              <input type="text" class="form-control form-control-sm" >
            </div>              
          </div>
          <div class="form-group row text-md">
            <div class="col-md-12">
              <label for="" class="col-form-label">Email Address</label>
              <input type="text" class="form-control form-control-sm" >
              
            </div>              
          </div>
          <div class="form-group row text-md">
            <div class="col-md-6">
              <label for="" class="col-form-label">Mobile Number</label>
              <input type="text" class="form-control form-control-sm" >
            </div>   
            <div class="col-md-6">
              <label for="" class="col-form-label">Country</label>
              <select class="form-control form-control-sm" id="country">
                <option value="">Please Select</option>
                <option value="Malaysia" selected>Malaysia</option>
              </select>
            </div>            
          </div>
          <small class="text-primary">Please make sure your email and mobile number is correct</small>
          <!-- <div class="form-group row text-md">
            <div class="col-md-12">
                <label for="" class="col-form-label">Full Name:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm">
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">Add Person</button>
                </div>
              </div>
            </div>          
          </div>
          <div class="table-responsive text-md">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 65px;">No.</th>
                  <th>Full Name</th>
                  <th style="width: 75px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1</td>
                  <td>Muhammad Anwar Bin Mohd Yazid</td>
                  <td class="text-center">
                    <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> -->          
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-primary btn-sm" href="#addPersonModal" data-toggle="modal" data-dismiss="modal" >
          Continue
        </a>
      </div>
    </div>
  </div>
</div>