<div class="modal fade" data-backdrop="static" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Customer Details</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 480px; overflow-y: auto;">
        <div class="table-responsive text-md">
          <table class="table table-bordered table-sm" id="dt_CustomerDetail" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="35%">Name</th>
                <th>Mobile No.</th>
                <th>Email</th>
                <th>Outstanding <br>Days</th>
                <!-- <th>Outstanding <br>Days Agency</th> -->
            </thead>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>