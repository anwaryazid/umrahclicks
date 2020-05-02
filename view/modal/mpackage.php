<div class="modal" data-backdrop="static" id="packageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Package</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formPackage" enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 480px; overflow-y: auto;">        
          <div class="row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Agency <small><span class="text-danger">*</span></small> </label>
              <select  class="form-control form-control-sm mb-2" id="agency_id" name="agency_id">
                <option value=""></option>
                <?php
                require_once('lib/conn.php');  
                $agency = $conn->query("SELECT * FROM agency ORDER BY agency_name");
                while($rows = $agency->fetch_assoc())
                {
                  $desc = $rows['agency_name'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select>

              <label class="col-form-label">Package Name <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="package_name" name="package_name"  >

              <label class="col-form-label">Package Status <small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="package_status" name="package_status">
                <option value=""></option>
                <option value="1">Open</option>
                <option value="0">Close</option>
              </select>              
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label">Date From <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" name="package_dateFrom" id="package_dateFrom" >
              
              <label class="col-form-label">Date To <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" name="package_dateTo" id="package_dateTo" >

              <label class="col-form-label">Package Pax <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" name="package_pax" id="package_pax" >              
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label">Remarks</label>
              <textarea type="text" class="form-control form-control-sm mb-2" rows="1" id="package_remark" name="package_remark"></textarea>

              <label class="col-form-label">Image Thumbnail </label>
              <input type="file" class="form-control-file form-control-sm mb-2" id="package_thumbnail" name="package_thumbnail" aria-describedby="package_thumbnail">              
              <span id="package_thumbnail_input"></span>
              <span id="package_uploaded_image"></span>
            </div> 
          </div>
          <hr>
          <div class="row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Flight Direct / Transit <small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="package_flight_id" name="package_flight_id" >
                <option value="1">Direct</option>
                <option value="2">Transit</option>
              </select>

              <label class="col-form-label">Meal <small><span class="text-danger">*</span></small></label>
              <select class="form-control form-control-sm mb-2" id="package_meal_id" name="package_meal_id" >
                <option value="1">Provided</option>
                <option value="2">Not Provided</option>
              </select>  
              
              <label class="col-form-label">Mutawwif <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="package_mutawwif" name="package_mutawwif" >

              <label class="col-form-label">1st Destination <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="package_1stDestination" name="package_1stDestination" >

              <label class="col-form-label">Ziarah</label>
              <textarea type="text" class="form-control form-control-sm mb-2" id="package_ziarah" name="package_ziarah" rows="3"></textarea>
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label">Makkah Hotel <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="makkah_hotel" name="makkah_hotel" >

              <label class="col-form-label">Distance Makkah Hotel (m) <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="makkah_distance" name="makkah_distance" >

              <label class="col-form-label">Days in Makkah <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="makkah_days" name="makkah_days" >

              <label class="col-form-label">Night in Makkah <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="makkah_night" name="makkah_night" >
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label">Madinah Hotel <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="madinah_hotel" name="madinah_hotel" >

              <label class="col-form-label">Distance Madinah Hotel (m) <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="madinah_distance" name="madinah_distance" >              

              <label class="col-form-label">Days in Madinah <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="madinah_days" name="madinah_days" >    

              <label class="col-form-label">Night in Madinah <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm mb-2" id="madinah_night" name="madinah_night" > 
            </div>                       
          </div>
          <hr id="createdUpdatedHR">
          <div class="row text-md" id="createdUpdated">
            <div class="form-group col-md-6">    
              <div class="row">
                <label class="col-form-label col-sm-4" >Created By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdBy" name="createdBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Created Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdDate" name="createdDate" disabled>
                </div>
              </div>   
            </div>
            <div class="form-group col-md-6">
              <div class="row">
                <label class="col-form-label col-sm-4" >Updated By</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedBy" name="updatedBy" disabled>
                </div>

                <label class="col-form-label col-sm-4" >Updated Date</label>
                <div class="col-sm-8">
                  <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedDate" name="updatedDate" disabled>
                </div>
              </div>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <div class="mr-auto">
            <button class="btn btn-outline-primary btn-sm" type="button" id="btnRoom" onclick="viewRoom(this.value)">Add Room</button>
            <button class="btn btn-outline-primary btn-sm" type="button" id="btnImage" onclick="viewImage(this.value)">Add Image</button>
          </div>
          <small><span id="error_text" class="text-danger"></span></small>
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Add" />
        </div>
      </form>
    </div>
  </div>
</div>