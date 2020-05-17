<div class="modal fade" data-backdrop="static" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" id="formUser" enctype="multipart/form-data">
        <div class="modal-body text-md" style="max-height: 480px; overflow-y: auto;">
          <div class="row">
            <div class="form-group col-md-6">
              <label class="col-form-label">Name <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm" id="userFullName" name="userFullName">
            </div>
            <div class="form-group col-md-6">
              <label class="col-form-label">Status <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm" id="userStatus" name="userStatus">
                <option value=""></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
            
            <div class="form-group col-md-6">
              <label class="col-form-label">User Name <small><span class="text-danger">*</span></small></label>
              <input type="text" class="form-control form-control-sm" id="userName" name="userName">
            </div>       
            
            <div class="form-group col-md-6">
              <label class="col-form-label">Email Address</label>
              <input type="text" class="form-control form-control-sm" id="userEmail" name="userEmail">
            </div>
          </div>
          
          <div class="row" id="divPassword">
            <div class="form-group col-md-6">
              <label class="col-form-label">Password <small><span class="text-danger">*</span></small></label>
              <input type="password" class="form-control form-control-sm" id="userPassword" name="userPassword">
            </div>
            <div class="form-group col-md-6">
              <label class="col-form-label">Confirm Password <small><span class="text-danger">*</span></small></label>
              <input type="password" class="form-control form-control-sm" id="userConfirmPassword" name="userConfirmPassword">
              <small><span id="error_userConfirmPassword" class="text-danger"></span></small>
            </div>
            
          </div>
          
          <div class="row">
            <!-- <div class="form-group col-md-6">
              <label class="col-form-label">User Type <small><span class="text-danger">*</span></small></label>
              <div>
                <?php 
                require_once('lib/conn.php');  
                $typeList = $conn->query("SELECT * FROM ref_user_type ORDER BY id")
                ?> 
                <?php
                while($rows = $typeList->fetch_assoc())
                {
                ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="userType" id="<?php echo $rows['userType'] ?>" value="<?php echo $rows['id'] ?>" onClick="selectUserType(this.value);">
                  <label class="form-check-label" for="<?php echo $rows['userType'] ?>">
                  <?php echo $rows['userType'] ?>
                  </label>
                </div>
                <?php
                }
                ?>
              </div>
              <input type="hidden" class="form-control form-control-sm" id="selUserType" name="selUserType" >
              <small><span id="error_userType" class="text-danger"></span></small>
            </div> -->   
            
            <div class="form-group col-md-6">
              <label for="" class="col-form-label">User Type <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="userType" name="userType" onchange="selectUserType(this.value)">
                <option value=""></option>
                <?php
                require_once('lib/conn.php');  
                $agency = $conn->query("SELECT * FROM ref_user_type ORDER BY id");
                while($rows = $agency->fetch_assoc())
                {
                  $desc = $rows['userType'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select> 
            </div>

            <div class="form-group col-md-6">
              <label for="" class="col-form-label">Group Type <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="groupType" name="groupType">
                <option value=""></option>
                <?php
                require_once('lib/conn.php');  
                $agency = $conn->query("SELECT * FROM group_type ORDER BY id");
                while($rows = $agency->fetch_assoc())
                {
                  $desc = $rows['groupName'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-6" id="divUserAgency">
              <label for="" class="col-form-label">User Agency <small><span class="text-danger">*</span></small></label>
              <select  class="form-control form-control-sm mb-2" id="userAgency" name="userAgency">
                <option value=""></option>
                <?php
                require_once('lib/conn.php');  
                $agency = $conn->query("SELECT * FROM agency ORDER BY agency_name");
                while($rows = $agency->fetch_assoc())
                {
                  $desc = $rows['agency_name'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select> 
            </div>
          </div>
              
            
            <!-- <div class="form-group col-md-6" id="divUserAccess">
              <label for="" class="col-form-label">User Access</label>
              <?php 
              require_once('lib/conn.php');  
              $accessList = $conn->query("SELECT * FROM menu ORDER BY mid");
              ?> 
              <?php
              while($rows = $accessList->fetch_assoc())
              {
              ?>
              <div class="form-check col-md-12">
                <input class="form-check-input" type="checkbox" name="userAccess[]" id="<?php echo $rows['menuPath'] ?>" value="<?php echo $rows['mid'] ?>">
                <label class="form-check-label" for="<?php echo $rows['menuName'] ?>">
                <?php echo $rows['menuName'] ?>
                </label>
              </div>
              <?php
              }
              ?>            
            </div> -->

            <!-- <div class="form-group col-md-6" id="divUserAgency">
              <label for="" class="col-form-label">User Agency</label>
              <select  class="form-control form-control-sm mb-2" id="userAgency" name="userAgency">
                <option value=""></option>
                <?php
                require_once('lib/conn.php');  
                $agency = $conn->query("SELECT * FROM agency ORDER BY agency_name");
                while($rows = $agency->fetch_assoc())
                {
                  $desc = $rows['agency_name'];
                  $id = $rows['id'];
                  echo "<option value='$id'>$desc</option>";
                }
                ?>
              </select>           
            </div>
          </div> -->
          
          <hr id="createdUpdatedHR">
          <div class="row text-md" id="createdUpdated">
            <div class="form-group col-md-6">              
              <label class="col-form-label" >Created By</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdBy" name="createdBy" disabled>

              <label class="col-form-label" >Created Date</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="createdDate" name="createdDate" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="col-form-label" >Updated By</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedBy" name="updatedBy" disabled>

              <label class="col-form-label" >Updated Date</label>
              <input class="form-control form-control-sm form-control-plaintext mb-2 bg-white text-dark" id="updatedDate" name="updatedDate" disabled>
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