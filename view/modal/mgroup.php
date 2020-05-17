<div class="modal fade" data-backdrop="static" id="groupModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Group</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formGroup" enctype="multipart/form-data">
        <div class="modal-body text-md" style="max-height: 480px; overflow-y: auto; font-size: .9rem;">
          <div class="row">
            <div class="form-group col-md-12">
              <label class="col-form-label">Group Name <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm" id="groupName" name="groupName">
            </div>
            <div class="form-group col-md-12" id="divMenuAccess">
              <!-- <label for="" class="col-form-label">Group Menu Access <small><span class="text-danger">*</span></small></label> -->
              <table class="table">    
                <tr>
                  <td>Menu</td>
                  <td>Access Type</td>
                </tr>         
              <?php 
              require_once('lib/conn.php');  
              $accessList = $conn->query("SELECT * FROM menu ORDER BY mid");
              ?> 
              <?php
              while($rows = $accessList->fetch_assoc())
              {
              ?>
              <tr>
                <td width="45%">
                  <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" name="groupMenuAccess[]" id="<?= $rows['menuPath'] ?>" value="<?= $rows['mid'] ?>">
                    <label class="form-check-label" for="<?= $rows['menuPath'] ?>">
                    <?= $rows['menuName'] ?> <!-- - READ -->
                    </label>
                  </div>
                </td>
                <?php $typeList = $conn->query("SELECT * FROM ref_type_access ORDER BY id"); ?>
                <td>
                  <div>
                    <div class="form-check">
                      <input class="form-check-input <?= $rows['menuPath'] ?>" type="checkbox" id="<?= $rows['menuPath'].'_access_0'?>">
                      <label class="form-check-label" for="<?= $rows['menuPath'].'_access_0'?>">FULL ACCESS</label>
                    </div>  
                    <?php
                    while($type = $typeList->fetch_assoc())
                    {
                    ?>
                    <div class="form-check">
                      <input class="form-check-input <?= $rows['menuPath'] ?>" type="checkbox" name="<?= $rows['mid'].'[]' ?>" id="<?= $rows['menuPath'].'_access_'.$type['id']?>" value="<?= $type['id'] ?>">
                      <label class="form-check-label" for="<?= $rows['menuPath'].'_access'?>"><?= $type['desc'] ?></label>
                    </div>                  
                    <?php
                    }
                    ?> 
                  </div>                  
                </td>
              </tr>              
              <?php
              }
              ?>   
              </table>         
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