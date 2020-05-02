<div class="modal" data-backdrop="static" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Image</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <div class="modal-body" style="max-height: 480px; overflow-y: auto;">     
        <form method="post" id="formImage" enctype="multipart/form-data"> 
          <div class="row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Hotel Image</label>
              <input type="file" class="form-control-file form-control-sm mb-2" id="hotel_img" name="hotel_img" aria-describedby="hotel_img">              
              <span id="hotel_img_input"></span>
              <small><span id="error_text_image" class="text-danger"></span></small> 
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label">Image Title <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="img_title" name="img_title" >
            </div>
            <div class="form-group col-md-3">
              <label class="col-form-label">Image For Hotel<small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="img_for" name="img_for" >
                <option value="1">Makkah</option>
                <option value="2">Madinah</option>
              </select> 
            </div>
            <div class="form-group col-md-1">              
              <label class="col-form-label col-md-12">&nbsp;</label>
              <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm btn-block" value="Add" />                      
            </div>  
          </div>   
          <input type="hidden" name="package_id2" id="package_id2" />
          <input type="hidden" name="operation" id="operation" value="Add" />        
        </form>
        <div class="row text-md">    
          <div class="col-md-12">
            <div class="text-md">
              <table class="table table-bordered" id="dt_Image" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Image Title</th>
                    <th>Image For</th>
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
          <button class="btn btn-outline-primary btn-sm" type="button" id="btnPackage3" onclick="viewPackage(this.value)">Back to Package</button>
          <button class="btn btn-outline-primary btn-sm" type="button" id="btnRoom3" onclick="viewRoom(this.value)">Add Room</button>
        </div>
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Close</>
      </div>
    </div>
  </div>
</div>