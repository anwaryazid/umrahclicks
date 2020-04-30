<script type="text/javascript">

  $(document).ready(function() {

    var dataTable = $('#dt_ListState').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/state_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,6],
          "orderable":false
        },
        {
          "targets":[0,2,4,6],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ]

    });

    $(document).on('submit', '#formState', function(event){
      event.preventDefault();
      var error_text = '';
      var stateKod = $('#stateKod').val();
      var stateName = $('#stateName').val();
      var stateAbbr = $('#stateAbbr').val();
      var stateCountry = $('#stateCountry').val();
      if(stateKod == '' || stateName == '' || stateAbbr == '' || stateCountry == '') {
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
          url:"process/state_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#stateModal').modal('hide');
            $('#formState')[0].reset();
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
      url:"process/state_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#stateModal').modal('show');
        $('#stateKod').val(data.stateKod);
        $('#stateName').val(data.stateName);
        $('#stateAbbr').val(data.stateAbbr);
        $('#stateCountry').val(data.stateCountry);
        $('.modal-title').text("View State");
        $('#id').val(id);
        // $('#user_uploaded_image').html(data.user_image);
        $('#action').val("Update");
        $('#operation').val("Update");
      }
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this?"))
      {
      $.ajax({
        url:"process/state_delete.php",
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

    
  });

  function addState() {
    $('#formState')[0].reset();
    $('#error_stateKod').text('');
    $('#stateKod').css('border-color', '');
    $('#error_stateName').text('');
    $('#stateName').css('border-color', '');
    $('#error_stateAbbr').text('');
    $('#stateAbbr').css('border-color', '');
    $('#error_stateCountry').text('');
    $('#stateCountry').css('border-color', '');
    $('.modal-title').text("Add State");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#stateModal').modal('show');
  }
  
</script>