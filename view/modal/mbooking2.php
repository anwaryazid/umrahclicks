<div class="modal" data-backdrop="static" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Payment</h5>
      </div>
      <form method="post" id="formPayment">
        <div class="modal-body" style="max-height: 490px; overflow-y: auto;">
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-primary"><i class='fas fa-info-circle fa-sm'></i>&nbsp;&nbsp;Booking Summary</h6>
              <hr>
              <div class="row text-md"  style="font-size: .7rem">
                <label for="" class="col-sm-4 col-form-label">Booking ID</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_booking_id">
                </div>

                <label for="" class="col-sm-4 col-form-label">Customer Name</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_name">
                </div>

                <label for="" class="col-sm-4 col-form-label">Email Address</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_email">
                </div>

                <label for="" class="col-sm-4 col-form-label">Mobile Number</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_no">
                </div>

                <label for="" class="col-sm-4 col-form-label">Country</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_country">
                </div>
                
                <label for="" class="col-sm-4 col-form-label">Date Departure</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_date_depart">
                </div>
               
                <label for="" class="col-sm-4 col-form-label">Package Agency</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_agency">
                </div>                
                
                <label for="" class="col-sm-4 col-form-label">Package Name</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_package">
                </div>              

                <label for="" class="col-sm-4 col-form-label">Package Price</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_booking_price">
                </div>

                <label for="" class="col-sm-4 col-form-label">Pax</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_pax">
                </div>

                <label for="" class="col-sm-4 col-form-label">Booking Deposit<br><small>(RM300 x <?= $pax ?> pax)</small></label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext text-dark" id="v_guest_deposit">                
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h6 class="text-primary"><img src="./img/bank/fpx.png" height="16px">Internet Banking </h6>
              <hr>
              <div class="row text-md mb-2">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Select Bank <small><span class="text-danger">*</span></small></label>
                  <select class="form-control form-control-sm" name="bank" id="bank">
                    <option value=""></option>
                    <option value="CIMB Clicks">CIMB Clicks</option>
                    <option value="Maybank2u">Maybank2u</option>
                  </select> 
                </div>                        
              </div>
              <div class="row text-md" style="font-size: .7rem">
                <div class="col-md-12">
                  <div class="alert alert-primary" role="alert">
                    By clicking the "Book & Pay Now!" button below, you have agreed to the FPX terms and conditions
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>       
        <div class="modal-footer">
          <small><span id="error_text_payment" class="text-danger"></span></small>
          <input type="hidden" name="amount" id="amount" > 
          <input type="hidden" name="id" id="id" > 
          <input type="hidden" name="operation" id="operation" value="Pay" />          
          <button class="btn btn-outline-secondary btn-sm cancel-payment" type="button">Cancel</button>
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Book & Pay Now!" />
          <!-- <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#paymentModal">
            Book & Pay Now!
          </a> -->
        </div>      
      </form>

    </div>
  </div>
</div>