<script type="text/javascript">

  function selectUserType(type) {
    // alert(type);
    // $('#selectUserType').val(type);
    if (type == 3) {
      $('#divUserAccess').show();
    } else {
      $('#divUserAccess').hide();
    }
    document.getElementById("selUserType").value = type;
  }

  $(document).ready(function() {

    $('#divUserAccess').hide();

    var dataTable = $('#dt_ListUser').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/user_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,6,8],
          "orderable":false
        },
        {
          "targets":[0,3,5,6,7,8],
          "className":"text-center"
        },
        {
          "targets":[1,4],
          "visible":false
        },
      ]

    });

    $(document).on('submit', '#formUser', function(event){
      event.preventDefault();
      var error_text = '';
      var userFullName = $('#userFullName').val();
      var userStatus = $('#userStatus').val();
      var userName = $('#userName').val();
      var userEmail = $('#userEmail').val();
      var userPassword = $('#userPassword').val();
      var userConfirmPassword = $('#userConfirmPassword').val();
      var selUserType = $('#selUserType').val();
      if(userFullName == '' || userStatus == '' || userName == '' || selUserType == '' ) {
        error_text = '* Please fill in required field';
        $('#error_text').text(error_text);
      }
      else {
        error_text = '';
        $('#error_text').text(error_text);
      }
      if(userConfirmPassword != userPassword) {
        error_password = 'Password not match';
        $('#error_password').text(error_password);
      }
      else {
        error_password = '';
        $('#error_password').text(error_password);
      }

      if(error_text != '' || error_password != '') {
        return false;
      }
      else {
        $.ajax({
          url:"process/user_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#userModal').modal('hide');
            $('#formUser')[0].reset();
            if (data == 'added') {
              viewAlert(1,'Data succesfully added');
            } else if (data == 'updated') {
              viewAlert(1,'Data succesfully updated');
            } else {
              viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
            }             
            dataTable.ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.update', function(){
      var id = $(this).attr("id");
      $.ajax({
      url:"process/user_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {       
        $('#createdUpdatedHR').show();
        $('#createdUpdated').show();
        $('#divPassword').hide();
        if (data.selUserType == '3') {
          var access = data.userAccess;
          var accessArr = access.split(', ');
          accessArr.forEach(val => {
            document.getElementById(val).checked = true;
          });
          $('#divUserAccess').show();
        } else {
          $('#divUserAccess').hide();
        }
        $('#userFullName').val(data.userFullName);
        $('#userStatus').val(data.userStatus);
        $('#userName').val(data.userName);
        $('#userEmail').val(data.userEmail);
        $('#selUserType').val(data.selUserType);
        $('#createdBy').val(data.createdBy);
        $('#createdDate').val(data.createdDate);
        $('#updatedBy').val(data.updatedBy);
        $('#updatedDate').val(data.updatedDate);
        document.getElementById(data.typeUser).checked = true;
        // alert(data.userAccess);
                
        $('.modal-title').text("View User");
        $('#id').val(id);
        $('#action').val("Update");
        $('#operation').val("Update");
        $('#userModal').modal('show');
      }
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this?"))
      {
      $.ajax({
        url:"process/user_delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'deleted') {
            viewAlert(1,'Data succesfully deleted');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dataTable.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
    });

    $(document).on('click', '.reset', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to reset password for this user?"))
      {
      $.ajax({
        url:"process/user_reset_password.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'reset') {
            viewAlert(1,'Password succesfully reset');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dataTable.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
    });
    
  });

  function addUser() {
    $('#createdUpdated').hide();
    $('#createdUpdatedHR').hide();
    $('#divPassword').show();
    $('#divUserAccess').hide();
    $('#formUser')[0].reset();
    $('#error_text').text('');
    $('#error_password').text('');
    $('.modal-title').text("Add User");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#userModal').modal('show');
  }
    
</script>