<div class="modal fade" data-backdrop="static" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Country</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <form method="post" id="form_add_country" enctype="multipart/form-data">
        <div class="modal-body text-md">
          <div class="row text-md">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label">Country Code</label>
                <input class="form-control form-control-sm" id="countryKod" name="countryKod" onkeyup="this.value = this.value.toUpperCase();">
                <small><span id="error_countryKod" class="text-danger"></span></small>
              </div>
            </div>
            <div class="col-md-8">              
              <div class="form-group">
                <label class="col-form-label">Country Name</label>
                <input class="form-control form-control-sm" id="countryName" name="countryName" onkeyup="this.value = this.value.toUpperCase();">
                <small><span id="error_countryName" class="text-danger"></span></small>
              </div> 
            </div>
          </div>
          <div class="row text-md">
            <div class="col-md-4">      
              <div class="form-group">
                <label class="col-form-label">Currency Code</label>
                <input class="form-control form-control-sm" id="currencyKod" name="currencyKod" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
            <div class="col-md-8"> 
              <div class="form-group">
                <label class="col-form-label">Currency Name</label>
                <input class="form-control form-control-sm" id="currencyName" name="currencyName" onkeyup="this.value = this.value.toUpperCase();">
              </div>    
            </div>            
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-outline-primary btn-sm" value="Add" />
          <!-- <button class="btn btn-outline-primary btn-sm" type="submit" name="action" id="action">Add Country</button> -->
          <!-- <a class="btn btn-outline-primary btn-sm" href="#" data-toggle="modal" data-dismiss="modal" onClick="showAlert('Country',1,1);">Add Country</a> -->
        </div>
      </form>
    </div>
  </div>
</div>