<script type="text/javascript">

  $(document).ready(function() {
    
    var dataTable = $('#dt_ListAgency').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/agency_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,7],
          "orderable":false
        },
        {
          "targets":[0,2,4,5,6,7],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ],

    });

    $(document).on('submit', '#formAgency', function(event){
      event.preventDefault();
      var error_text = '';
      var error_text_img = '';
      var agency_name = $('#agency_name').val();
      var agency_status = $('#agency_status').val();
      var agency_address1 = $('#agency_address1').val();
      var agency_postcode = $('#agency_postcode').val();
      var agency_city = $('#agency_city').val();
      var agency_state = $('#agency_state').val();
      var agency_agency = $('#agency_agency').val();
      var agency_contactNo = $('#agency_contactNo').val();
      var agency_email = $('#agency_email').val();
      var agency_regNo = $('#agency_regNo').val();
      var agency_LKUNo = $('#agency_LKUNo').val();
      var agency_LKUExpiryDate = $('#agency_LKUExpiryDate').val();
      var agency_contactPerson = $('#agency_contactPerson').val();
      var agency_contactPersonNo = $('#agency_contactPersonNo').val();
      var extension = $('#agency_image').val().split('.').pop().toLowerCase();
      if(extension != '')
      {
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#agency_image').val('');
          return false;
        }
      } 
      if(agency_name == '' || agency_status == '' || agency_contactNo == '' || agency_email == '' || agency_regNo == '' || agency_LKUNo == '' || agency_LKUExpiryDate == '') {
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
          url:"process/agency_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#agencyModal').modal('hide');
            $('#formAgency')[0].reset();    
            if (data.includes("added")) {
              viewAlert(1,'Data succesfully added');
            } else if (data.includes("updated")) {
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
      url:"process/agency_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#agencyModal').modal('show');
        $('#createdUpdatedHR').show();
        $('#createdUpdated').show();
        $('#agency_regNo').val(data.agency_regNo);
        $('#agency_name').val(data.agency_name);
        $('#agency_address1').val(data.agency_address1);
        $('#agency_address2').val(data.agency_address2);
        $('#agency_postcode').val(data.agency_postcode);
        $('#agency_city').val(data.agency_city);
        $('#agency_state').val(data.agency_state);
        $('#agency_country').val(data.agency_country);
        $('#agency_contactNo').val(data.agency_contactNo);
        $('#agency_email').val(data.agency_email);
        $('#agency_status').val(data.agency_status);
        $('#agency_LKUNo').val(data.agency_LKUNo);
        $('#agency_LKUExpiryDate').val(data.agency_LKUExpiryDate);
        $('#agency_rating').val(data.agency_rating);
        $('#agency_contactPerson').val(data.agency_contactPerson);
        $('#agency_contactPersonNo').val(data.agency_contactPersonNo);
        $('#agency_info').val(data.agency_info);
        $('#createdBy').val(data.createdBy);
        $('#createdDate').val(data.createdDate);
        $('#updatedBy').val(data.updatedBy);
        $('#updatedDate').val(data.updatedDate);
        $('#agency_uploaded_image').html(data.agency_image);
        $('#agency_image_input').html(data.agency_image_input);
        $('.modal-title').text("View Agency");
        $('#id').val(id);
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
        url:"process/agency_delete.php",
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

  $(function() {

    $('#agency_LKUExpiryDate').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

  });

  function addAgency() {
    $('#formAgency')[0].reset();
    $('#error_text').text('');
    $('#createdUpdatedHR').hide();
    $('#createdUpdated').hide();
    $('.modal-title').text("Add Agency");
    $('#agency_uploaded_image').html('');
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#agencyModal').modal('show');
  }
    
</script>