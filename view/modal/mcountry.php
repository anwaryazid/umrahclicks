<div class="modal fade" data-backdrop="static" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Country</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>      
      <form method="post" id="formCountry" enctype="multipart/form-data">
        <div class="modal-body text-md">
          <div class="form-row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Country Code <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" id="countryKod" name="countryKod" onkeyup="this.value = this.value.toUpperCase();">
              <small><span id="error_countryKod" class="text-danger"></span></small>
            </div>           
            <div class="form-group col-md-8">
              <label class="col-form-label">Country Name <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" id="countryName" name="countryName" onkeyup="this.value = this.value.toUpperCase();">
              <small><span id="error_countryName" class="text-danger"></span></small>
            </div> 
          </div>
          <div class="form-row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Currency Code <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" id="currencyKod" name="currencyKod" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-8">
              <label class="col-form-label">Currency Name <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" id="currencyName" name="currencyName" onkeyup="this.value = this.value.toUpperCase();">
            </div>           
          </div>
          <div class="form-row text-md">
            <div class="form-group col-md-4">
              <label class="col-form-label">Currency Symbol <small><span class="text-danger">*</span></small></label>
              <input class="form-control form-control-sm" id="currencySymbol" name="currencySymbol" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-8">
              <label class="col-form-label">Country Flag Image</label>
              <input type="file" class="form-control-file form-control-sm mb-2" id="countryImg" name="countryImg" aria-describedby="countryImg">
              <span id="country_uploaded_image"></span>
              <small><span id="error_text_img" class="text-danger"></span></small>
            </div>
            <small><span id="error_text" class="text-danger"></span></small>
          </div>
          
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