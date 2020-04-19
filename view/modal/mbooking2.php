<div class="modal" data-backdrop="static" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Payment Information</h5>
      </div>
      <div class="modal-body" style="max-height: 480px; overflow-y: auto;">
        <div class="row">
          <div class="col-md-7">
            <form>
              <!-- <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Available payment method</label>
                  <br>
                  <img src="./img/visa.png" width="32px">
                  <img src="./img/master-card.png" width="32px">
                  <img src="./img/paypal.png" width="32px">
                  <img src="./img/maestro.png" width="32px">
                  <img src="./img/western-union.png" width="32px">
                </div>              
              </div> -->
              <div class="form-group row text-md">
                <label for="" class="col-sm-12 col-form-label mb-3">Payment Method</label>
                <div class="col-auto">                  
                  <button class="btn btn-sm btn-outline-primary" type="button" id="btnOnlinePayment" onClick="selectPaymentMethod(1);" style="font-size: 12px;">
                    Online Banking <i id="btnOnlinePaymentCheck" class="fas fa-sm"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-primary" type="button" id="btnCreditDebit" onClick="selectPaymentMethod(2);" style="font-size: 12px;">
                    Debit / Credit Card <i id="btnCreditDebitCheck" class="fas fa-sm"></i>
                  </button>
                </div>             
              </div>
              <hr>
              <div id="onlinePayment">
                <div class="row text-md">
                  <label for="" class="col-sm-12 col-form-label mb-3">Select Online Payment</label>
                  <div class="col-sm-12">                    
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="cimb" value="cimb" checked>
                      <label class="form-check-label" for="cimb">
                        CIMB Clicks
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="maybank" value="maybank">
                      <label class="form-check-label" for="maybank">
                        Maybank2U
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="public" value="public">
                      <label class="form-check-label" for="public">
                        Public Bank
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="rhb" value="rhb">
                      <label class="form-check-label" for="rhb">
                        RHB Now
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="rakyat" value="rakyat">
                      <label class="form-check-label" for="rakyat">
                        Bank Rakyat
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="ambank" value="ambank">
                      <label class="form-check-label" for="ambank">
                        Ambank
                      </label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="bank" id="mybsn" value="mybsn">
                      <label class="form-check-label" for="mybsn">
                        MyBSN
                      </label>
                    </div>
                    <!-- <button class="btn btn-sm btn-outline-primary btn-block border-0 text-left" type="button" id="cimbClicks" onClick="" style="font-size: 12px;">CIMB Clicks</button>
                    <button class="btn btn-sm btn-outline-primary btn-block border-0 text-left" type="button" id="maybank2U" onClick="" style="font-size: 12px;">Maybank2U</button>
                    <button class="btn btn-sm btn-outline-primary btn-block border-0 text-left" type="button" id="publicBank" onClick="" style="font-size: 12px;">Public Bank</button> -->
                  </div>
                </div>
              </div>
              <div id="creditDebit">
                <div class="form-group row text-md">
                  <div class="col-sm-12">
                    <label for="" class="col-form-label">Card Holder Name</label>
                    <input type="text" class="form-control form-control-sm" >
                  </div>              
                </div>
                <div class="form-group row text-md">
                  <div class="col-sm-12">
                    <label for="" class="col-form-label">Debit / Credit Card No.</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control form-control-sm input-number" >
                      <div class="input-group-append">
                        <span class="input-group-text input-group-addon bg-white text-primary">
                          <img src="./img/visa.png" width="20px">&nbsp;<img src="./img/master-card.png" width="20px">
                        </span>
                      </div>
                    </div>
                  </div>              
                </div>                
                <div class="form-group row text-md">
                  <div class="col-sm-6">
                    <label for="" class="col-form-label">Expiry Date</label>
                    <input type="text" class="form-control form-control-sm"  placeholder="mm/yy">
                  </div>   
                  <div class="col-sm-6">
                    <label for="" class="col-form-label">CVC/CVV</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control form-control-sm input-number" >
                      <div class="input-group-append">
                        <span class="input-group-text input-group-addon bg-white text-primary">
                          <img src="./img/cvv.png" width="20px">
                        </span>
                      </div>                    
                    </div>
                  </div>            
                </div>
              </div>              
            </form>
          </div>
          <div class="col-md-5 text-md">
            <hr class="d-block d-sm-none">
            <strong class="text-primary">Booking Detail</strong><br>
            <span style="font-size: .8rem">
            Smart Umrah4all Dot Com Travel & Services Sdn Bhd<br>
            Package Gold<br>
            Double Bed<br>
            3 adult(s)<br>
            2 children(s)<br>
            Total pax : 5<br>
            Package Price : RM6,200.00
            </span>
            <hr>
            <strong class="text-primary">Booking Deposit</strong><br>
            <span style="font-size: .8rem">
            Deposit : RM1,500.00 (RM300 x 5 pax)
            </span>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <small>Total amount to pay</small>
              </div>
            </div>            
            <h3 class="text-danger">RM1,500.00</h3>
          </div>
        </div>          
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-secondary btn-sm" href="#addPersonModal" data-toggle="modal" data-dismiss="modal" >
          Back
        </a>
        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#paymentModal">
          Book & Pay Now!
        </a>
      </div>
    </div>
  </div>
</div>