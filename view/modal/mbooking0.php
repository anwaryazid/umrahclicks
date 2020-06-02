<div class="modal" data-backdrop="static" id="bookingModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog <?php if($pax > 1) { ?>modal-lg<?php } else { ?>modal-md<?php } ?>" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Booking Information</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formBooking">
        <div class="modal-body" style="max-height: 480px; overflow-y: auto;">        
          <div class="row">
            <div class="<?php if($pax > 1) { ?>col-md-6<?php } else { ?>col-md-12<?php } ?>">
              <h6 class="text-primary"><i class='fas fa-user fa-sm'></i>&nbsp;&nbsp;Customer Information</h6>
              <hr>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Full Name <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="guest_name" id="guest_name" >
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Email Address <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="guest_email" id="guest_email" >              
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Mobile Number <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm input-number" name="guest_no" id="guest_no" >
                </div>   
              </div>
              <?php 
              require_once('lib/conn.php');  
              $countryList = $conn->query("SELECT * FROM ref_country ORDER BY id");
              ?> 
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Country <small><span class="text-danger">*</span></small></label>
                  <select class="form-control form-control-sm" name="guest_country" id="guest_country">
                    <!-- <option value="" selected></option> -->
                    <?php
                    while($rows = $countryList->fetch_assoc())
                    {
                      $countryName = $rows['keterangan'];
                      $countryID = $rows['id'];
                      ($country == $countryID) ? $selected = "selected" : $selected = " ";
                      echo "<option value='$countryID' $selected>$countryName</option>";
                    }
                    ?>
                  </select>
                </div>            
              </div>
              <!-- <small class="text-primary">Please make sure your email and mobile number is correct</small> -->
            </div>
            <?php 
            if ($pax > 1) {
            ?>
            <div class="col-md-6">
              <h6 class="text-primary"><i class='fas fa-users fa-sm'></i>&nbsp;&nbsp;Additional Person Information</h6>
              <hr>
              <?php
              for ($x = 1; $x < $pax; $x++) {
              ?>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Full Name <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="add_guest[]">
                </div>              
              </div>
              <?php
              }
              ?>                      
            </div>
            <?php 
            }
            ?>
            <input type="hidden" class="form-control form-control-sm mb-1" name="guest_pax" id="guest_pax" value="<?= $pax ?>" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="guest_date_depart" id="guest_date_depart" value="<?= $dateDepart ?>" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="agency_id" id="agency_id" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="package_id" id="package_id" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="package_room_id" id="package_room_id" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="guest_deposit" id="guest_deposit" value="<?= $pax * 300 ?>" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="guest_booking_price" id="guest_booking_price" >         
            <input type="hidden" class="form-control form-control-sm mb-1" name="promo_id" id="promo_id" > 
          </div>                
        </div>
        <div class="modal-footer">
          <small><span id="error_text" class="text-danger"></span></small>
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <!-- <a class="btn btn-outline-primary btn-sm" href="#paymentModal" data-toggle="modal" data-dismiss="modal" >
            Continue
          </a> -->
          <input type="hidden" name="operation" id="operation" value="Book" />
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Continue" />
          <!-- <button class="btn btn-outline-primary btn-sm" type="button" onclick="makePayment('9')">Test</button> -->
        </div>
      </form>
    </div>
  </div>
</div>