<div class="modal fade" data-backdrop="static" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">State</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <form method="post" id="formState" enctype="multipart/form-data">
        <div class="modal-body text-md">
          <div class="row text-md">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label">State Code <small><span class="text-danger">*</span></small></label>
                <input class="form-control form-control-sm" id="stateKod" name="stateKod" onkeyup="this.value = this.value.toUpperCase();">
                <small><span id="error_stateKod" class="text-danger"></span></small>
              </div>
            </div>
            <div class="col-md-8">              
              <div class="form-group">
                <label class="col-form-label">State Name <small><span class="text-danger">*</span></small></label>
                <input class="form-control form-control-sm" id="stateName" name="stateName" onkeyup="this.value = this.value.toUpperCase();">
                <small><span id="error_stateName" class="text-danger"></span></small>
              </div> 
            </div>
          </div>
          <div class="row text-md">
            <div class="col-md-4">      
              <div class="form-group">
                <label class="col-form-label">State Abbr <small><span class="text-danger">*</span></small></label>
                <input class="form-control form-control-sm" id="stateAbbr" name="stateAbbr" onkeyup="this.value = this.value.toUpperCase();">
                <small><span id="error_stateAbbr" class="text-danger"></span></small>
              </div>
            </div>
            <div class="col-md-8"> 
              <div class="form-group">
                <label class="col-form-label">Country <small><span class="text-danger">*</span></small></label>
                <?php 
                require_once('lib/conn.php');  
                $countryList = $conn->query("SELECT * FROM ref_country ORDER BY id")
                ?> 
                <select class="form-control form-control-sm" id="stateCountry" name="stateCountry">
                  <option value="" selected></option>
                  <?php
                  while($rows = $countryList->fetch_assoc())
                  {
                    $countryName = $rows['keterangan'];
                    $countryID = $rows['id'];
                    ($country == $countryID) ? $selected = "selected" : $selected = "";
                    echo "<option value='$countryID' $selected>$countryName</option>";
                  }
                  ?>
                </select>
                <small><span id="error_stateCountry" class="text-danger"></span></small>
              </div>    
            </div>            
          </div>
          <small><span id="error_text" class="text-danger"></span></small>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Add" />
        </div>
      </form>
    </div>
  </div>
</div>