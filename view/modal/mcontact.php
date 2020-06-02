<div class="modal" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Contact Us</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 align-middle my-auto">
            <div class="text-center" style="font-size:.9rem;">
              <img class="d-block w-100" src="img/umrahclicks-logo.JPG" height="" alt="UmrahClicks">
              <br/>
              <!-- <p><h6 class="text-primary h6">Smart Umrah4all Dot Com Travel & Services Sdn Bhd</h6></p> --> <!-- (1269559-M) -->
              <p><i class="fa fa-sm fa-map-marker-alt text-primary"></i>&nbspF1-18-10, Tamarind Suites, Persiaran Multimedia, 63000 Cyberjaya</p>
              <p><i class="fa fa-sm fa-phone-alt text-primary"></i>&nbsp;+603-8230 8076</p>
              <p><i class="fa fa-sm fa-envelope text-primary"></i>&nbsp;sales@umrahclicks.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <form class="user" id="formContact" method="post">
              <div class="row" style="font-size:.9rem;">
                <div class="col-md-12">
                  <label for="" class="col-form-label">Name <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="guest" id="guest">

                  <label for="" class="col-form-label">Company</label>
                  <input type="text" class="form-control form-control-sm" name="company" id="company" >

                  <label for="" class="col-form-label">Email Address <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="emailAddress" id="emailAddress" >

                  <label for="" class="col-form-label">Phone No. <small><span class="text-danger">*</span></small></label>
                  <input type="text" class="form-control form-control-sm" name="phone" id="phone" >

                  <label for="" class="col-form-label">Message <small><span class="text-danger">*</span></small></label>
                  <textarea type="text" class="form-control form-control-sm" name="message" id="message" rows="3"></textarea>

                  <small><span id="error_text" class="text-danger"></span></small>

                  <input type="hidden" name="operation" id="operation" value="Contact" />
                  <button class="btn btn-outline-primary btn-sm btn-block mt-2" type="submit">Submit</button>

                </div>          
              </div> 
            </form>
          </div>
        </div>  
      </div>      
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
        <!-- <button class="btn btn-outline-primary btn-sm" type="button" data-dismiss="modal">Submit</button> -->
      </div>
    </div>
  </div>
</div>