<div class="modal" data-backdrop="static" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Payment Information</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 480px; overflow-y: auto;">
        <div class="row">
          <div class="col-md-7">
            <form>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Available payment method</label>
                  <br>
                  <img src="./img/visa.png" width="32px">
                  <img src="./img/master-card.png" width="32px">
                  <img src="./img/paypal.png" width="32px">
                  <img src="./img/maestro.png" width="32px">
                  <img src="./img/western-union.png" width="32px">
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Payment Method</label>
                  <select class="form-control form-control-sm" id="country">
                    <option value="">Please Select</option>
                    <option value=""></option>
                  </select>
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Credit/debit card number</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-sm" >
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btn-sm" type="button">
                        <i class="fas fa-lock fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Card holder name</label>
                  <input type="text" class="form-control form-control-sm" >
                </div>              
              </div>
              <div class="form-group row text-md">
                <div class="col-md-6">
                  <label for="" class="col-form-label">Expiry date</label>
                  <input type="text" class="form-control form-control-sm"  placeholder="mm/yy">
                </div>   
                <div class="col-md-6">
                  <label for="" class="col-form-label">CVC/CVV</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-sm" >
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btn-sm" type="button">
                        <i class="fas fa-lock fa-sm"></i>
                      </button>
                    </div>                    
                  </div>
                </div>            
              </div>
          </div>
          <div class="col-md-5 text-md">
            <strong>Package Detail</strong><br>
            <span style="font-size: .8rem">
            Package Gold<br>
            Double Bed<br>
            3 adults<br>
            2 childrens<br>
            Total pax : 5
            </span>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <strong>Booking Deposit</strong>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <small>Price <br></small>
              </div>
              <div class="col-md-6">
                <small>RM1,000.00</small>
              </div>
              <div class="col-sm-12"><small>(RM300 x 5 pax)</small></div>
            </div>
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
        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#paymentModal">
          Book & Pay Now!
        </a>
      </div>
    </div>
  </div>
</div>