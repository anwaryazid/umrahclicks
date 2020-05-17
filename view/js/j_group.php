<script type="text/javascript">

  function addGroup() {
    $('#formGroup')[0].reset();
    // $('#divMenuAccess').hide();
    // document.getElementById("dashboard").checked = true;
    var menus = <?php echo $menus; ?>;
    menus.forEach(disableAccess);   
    
    $('.modal-title').text("Add Group");
    $('#action').val("Add");
    $('#operation').val("Add");
    if('<?= $create ?>' == 'd-none') {
      $('#action').hide();
    } else {
      $('#action').show();
    }
    $('#groupModal').modal('show');
  }

  function checkAll(value) {
    $("#"+value+"_access_0").change(function() {
      if (this.checked) {
        $("."+value).each(function() {
            this.checked=true;
        });
      } else {
        $("."+value).each(function() {
            this.checked=false;
        });
      }
    });

    $("."+value).click(function () {
      if ($(this).is(":checked")) {
        var isAllChecked = 0;

        $("."+value).each(function() {
            if (!this.checked)
                isAllChecked = 1;
        });

        if (isAllChecked == 0) {
            $("#"+value+"_access_0").prop("checked", true);
        }     
      }
      else {
          $("#"+value+"_access_0").prop("checked", false);
      }
    });
  }   

  function notdisableAccess(value) {
    $("."+value).each(function() {
      this.disabled=false;
    });
  }

  function unCheckMenu(value) {
    $("#"+value).each(function() {
      this.checked=false;
    });
  }

  function disableAccess(value) {
    $("."+value).each(function() {
      this.disabled=true;
    });    
  }

  function undisableAccess(value) {
    $("#"+value).change(function() {
      if (this.checked) {
        $("."+value).each(function() {
          this.disabled=false;
        });        
      } else {
        $("."+value).each(function() {
          this.disabled=true;
        });
        $("."+value).each(function() {
          this.checked=false;
        });
      }
    });
  }

  $(document).ready(function() {

    var menus = <?php echo $menus; ?>;
    menus.forEach(checkAll);
    menus.forEach(disableAccess);
    menus.forEach(undisableAccess);    
    
    var dt_ListGroup = $('#dt_ListGroup').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/group_fetch.php",
        type:"POST",
        data:{
          delete:'<?= $delete ?>'
        },
      },
      "columnDefs":[
        {
          "targets":[0,4],
          "orderable":false
        },
        {
          "targets":[0,4],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ]

    });

    $(document).on('submit', '#formGroup', function(event){
      event.preventDefault();
      var groupName = $("#groupName").val(); 
      if(groupName == '') {
        error_text = '* Please fill in required field';
        $('#error_text').text(error_text);
      }
      else {
        error_text = '';
        $('#error_text').text(error_text);
      }

      if(error_text != '') {
        return false;
      }
      else {
        $.ajax({
          url:"process/group_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#groupModal').modal('hide');
            $('#formGroup')[0].reset();
            if (data == 'added') {
              viewAlert(1,'Data succesfully added');
            } else if (data == 'updated') {
              viewAlert(1,'Data succesfully updated');
            } else {
              viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
            }             
            dt_ListGroup.ajax.reload();
          }
        });
      }      
    });

    $(document).on('click', '.update', function(){
      var id = $(this).attr("id");
      $.ajax({
      url:"process/group_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        var menus = <?php echo $menus; ?>;
        menus.forEach(disableAccess);
        // menus.forEach(unCheckMenu);
        $('#formGroup')[0].reset();
        $('#groupName').val(data.groupName);
        
        // document.getElementById("dashboard_access_1").checked = true;
        var groupMenuAccess = data.groupMenuAccess;
        var menuAccess = groupMenuAccess.split(', ');

        // alert(menuAccess[0]);
        
        menuAccess.forEach(val => {          
          document.getElementById(val).checked = true;     
                     
        });

        var i = 0;
        data.groupTypeAccess.forEach(type => {
          var fulltypeAccess = type;
          // alert(fulltypeAccess);
          var typeAccess = type.split(',');
          typeAccess.forEach(val2 => { 
            if(val2 !== '') {
              document.getElementById(menuAccess[i]+'_access_'+val2).checked = true; 
            }
            if (fulltypeAccess == '1,2,3') {
              document.getElementById(menuAccess[i]+'_access_0').checked = true; 
            } 
          });
          i++;       
        }); 
        
        menuAccess.forEach(notdisableAccess);
        $('.modal-title').text("View Group");
        $('#id').val(id);
        $('#action').val("Update");
        $('#operation').val("Update");
        $('.modal').scrollTop(0);
        if('<?= $update ?>' == 'd-none') {
          $('#action').hide();
        } else {
          $('#action').show();
        }
        $('#groupModal').modal('show');
      }
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this group?"))
      {
      $.ajax({
        url:"process/group_delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'deleted') {
            viewAlert(1,'Data succesfully deleted');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dt_ListGroup.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
    });

  });
    
</script>