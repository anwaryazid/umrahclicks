<div class="modal fade" data-backdrop="static" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Register Promotion</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <?php 
      require_once('lib/conn.php');  
      $agency = $conn->query("SELECT * FROM agency ORDER BY agency_name");
      $promoFrom = $conn->query("SELECT * FROM ref_promo_from ORDER BY id");
      $promoVar = $conn->query("SELECT * FROM ref_promo_variable ORDER BY id");
      ?>
      <form method="post" id="formPromo" enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 480px; overflow-y: auto;">
          <div class="row text-md">
            <div class="form-group col-md-6">
              <label class="col-form-label">Promo From <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="promo_from" name="promo_from" onchange="selectPromoFrom(this.value);">
                <option value=""></option>
                <?php
                while($rows = $promoFrom->fetch_assoc())
                {
                  $desc = $rows['desc'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select>

              <div id="agency">
                <label class="col-form-label">Agency </label>
                <select  class="form-control form-control-sm mb-2" id="promo_agency" name="promo_agency">
                  <option value=""></option>
                  <?php
                  while($rows = $agency->fetch_assoc())
                  {
                    $desc = $rows['agency_name'];
                    $id = $rows['id'];
                    echo "<option value='$id'>$desc</option>";
                  }
                  ?>
                </select>
              </div>

              <label class="col-form-label">Promo Code <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="promo_code" name="promo_code">

              <label class="col-form-label">Promo Description <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="promo_desc" name="promo_desc">

              <label class="col-form-label">Date From <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="promo_dateFrom" name="promo_dateFrom">

              <label class="col-form-label">Date To <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="promo_dateTo" name="promo_dateTo">

              

            </div>
            <div class="form-group col-md-6">

              <label class="col-form-label">Promo Status <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="promo_status" name="promo_status">
                <option value=" "></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>

              <label class="col-form-label">Pax (Quantity) </label>
              <input class="form-control form-control-sm mb-2" id="promo_pax" name="promo_pax">

              <label class="col-form-label">Promo Variable <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="promo_variable" name="promo_variable">
                <option value=""></option>
                <?php
                while($rows = $promoVar->fetch_assoc())
                {
                  $desc = $rows['desc'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select>

              <label class="col-form-label">Variable Amount <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm mb-2" id="promo_variableAmount" name="promo_variableAmount">

              <label class="col-form-label">Operator </label>
              <input class="form-control form-control-sm mb-2 bg-white text-dark" id="promo_operator" name="promo_operator" disabled value="<?php echo $_SESSION['userName']; ?>">

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