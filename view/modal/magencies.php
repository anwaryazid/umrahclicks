<div class="modal fade" data-backdrop="static" id="agenciesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Agencies</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 480px; overflow-y: auto; font-size:.8rem;">
        <?php 
        require_once('lib/conn.php');  
        $accessList = $conn->query("SELECT agency.*, ref_state.keterangan AS state, ref_country.keterangan AS country FROM agency 
        LEFT JOIN ref_state ON ref_state.id = agency.agency_state
        LEFT JOIN ref_country ON ref_country.id = agency.agency_country
        ORDER BY agency_name");
        ?> 
        <?php
        while($rows = $accessList->fetch_assoc())
        {
        ?>
        <div class="row">
          <div class="col-md-8">
            <h6 class="font-weight-bold text-primary"><?= $rows['agency_name']; ?></h6>
            <table class="table-borderless table-sm" cellspacing="0" cellpadding="0">            
              <tr>
                <td>LKU No</td>
                <td colspan="3">KPK/LN - <?= $rows['agency_LKUNo']; ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td colspan="3">
                  <?= $rows['agency_address1']; ?> <?php if($rows['agency_address2'] == '') { echo ""; }  else { echo "<br/>".$rows['agency_address2']; } ?> 
                  <br/><?= $rows['agency_postcode']; ?> <?= $rows['agency_city']; ?> 
                  <?= ($rows['state'] == '') ? "" : "<br/>".ucwords(strtolower($rows['state']))."," ?> <?= ($rows['country'] == '') ? "" : ucwords(strtolower($rows['country'])) ?> 
                </td>
              </tr>
              <tr>
                <td>Tel. No.</td>
                <td><?= $rows['agency_contactNo']; ?></td>
                <td>Email</td>
                <td>​<?= $rows['agency_email']; ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-4" style="text-align: center;">
            <img src="upload/agency/<?= $rows['agency_image']; ?>" style="max-height:90px; max-width:100%;">
          </div>
        </div>
        <hr>
        <?php
        }
        ?>        
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>