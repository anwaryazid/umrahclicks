<div class="modal" data-backdrop="static" id="roomModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Room</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <div class="modal-body" style="max-height: 480px; overflow-y: auto;">     
        <form method="post" id="formRoom" enctype="multipart/form-data"> 
          <div class="row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Room Type <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="room_type" name="room_type" >
              <small><span id="error_text_room" class="text-danger"></span></small>  
            </div>
            <div class="form-group col-md-3">
              <label class="col-form-label">Actual Cost (RM) <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="room_actualCost" name="room_actualCost" onchange="getUmrahCost(this.value);" >
            </div>
            <div class="form-group col-md-3">
              <label class="col-form-label">Umrah Cost (RM) <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="room_umrahCost" name="room_umrahCost" >
            </div>
            <div class="form-group col-md-1">               
              <label class="col-form-label">&nbsp;</label>
              <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm btn-block" value="Add" />                      
            </div>  
          </div>   
          <input type="hidden" name="package_id" id="package_id" />
          <input type="hidden" name="operation" id="operation" value="Add" />       
        </form>
        <div class="row text-md">    
          <div class="col-md-12">
            <div class="text-md">
              <table class="table table-bordered" id="dt_ListRoom" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Room Type</th>
                    <!-- <th>Room Image</th> -->
                    <th width="20%">Actual Cost (RM)</th>
                    <th width="20%">Umrah Cost (RM)</th>
                    <th style="width:45px;">Action</th>
                  </tr>
                </thead>
              </table>
            </div>            
          </div>    
        </div>        
      </div>
      <div class="modal-footer">
        <div class="mr-auto">
          <button class="btn btn-outline-primary btn-sm" type="button" id="btnPackage2" onclick="viewPackage(this.value)">Back to Package</button>
          <button class="btn btn-outline-primary btn-sm" type="button" id="btnImage2" onclick="viewImage(this.value)">View Image</button>
        </div>
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>