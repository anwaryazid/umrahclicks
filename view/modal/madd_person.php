<div class="modal fade" id="addPersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Summary of Booking Selection</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row text-md">
            <div class="col-md-12">
                <label for="" class="col-form-label">Full Name:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button">Add Person</button>
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
                    <!-- <a class="" href="#" onClick="alert('Remove');">
                      <i class="fa fa-trash"></i>
                    </a> -->
                    <button class="btn btn-danger btn-xs" title="Remove"><i class="fas fa-trash fa-sm"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>          
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="#bookingModal" data-toggle="modal" data-dismiss="modal" >
          Back
        </a>
        <a class="btn btn-primary" href="#paymentModal" data-toggle="modal" data-dismiss="modal" >
          Continue
        </a>
      </div>
    </div>
  </div>
</div>