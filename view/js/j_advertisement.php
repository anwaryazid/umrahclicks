<script type="text/javascript">

  $(document).ready(function() {
    
    var dataTable = $('#dt_ListAdvert').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/advert_fetch.php",
        type:"POST",
        data:{
          delete:'<?= $delete ?>'
        },
      },
      "columnDefs":[
        {
          "targets":[0,8],
          "orderable":false
        },
        {
          "targets":[0,4,5,8],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ],

    });

    $(document).on('submit', '#formAdvert', function(event){
      event.preventDefault();
      var error_text = '';
      var error_text_img = '';
      var ad_companyRegNo = $('#ad_companyRegNo').val();
      var ad_companyName = $('#ad_companyName').val();
      var ad_companyTelNo = $('#ad_companyTelNo').val();
      var ad_companyEmail = $('#ad_companyEmail').val();
      var ad_contactPerson = $('#ad_contactPerson').val();
      var ad_contactPersonNo = $('#ad_contactPersonNo').val();
      var ad_website = $('#ad_website').val();
      var ad_operator = $('#ad_operator').val();
      var ad_companyStatus = $('#ad_companyStatus').val();
      var ad_status = $('#ad_status').val();
      var ad_remark = $('#ad_remark').val();
      var ad_dateFrom = $('#ad_dateFrom').val();
      var ad_dateTo = $('#ad_dateTo').val();
      var ad_price = $('#ad_price').val();
      var extension = $('#ad_image').val().split('.').pop().toLowerCase();
      if(extension != '')
      {
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#ad_image').val('');
          return false;
        }
      } 
      if(ad_companyRegNo == '' || ad_website == '' || ad_image == '' || ad_companyName == '' || ad_contactPerson == '' || ad_contactPersonNo == '' || ad_companyStatus == '' || ad_status == '' || ad_dateFrom == '' || ad_dateTo == '' || ad_price == '') {
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
          url:"process/advert_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#advertModal').modal('hide');
            $('#formAdvert')[0].reset();    
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
      url:"process/advert_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#advertModal').modal('show');
        $('#createdUpdatedHR').show();
        $('#createdUpdated').show();
        $('#ad_companyRegNo').val(data.ad_companyRegNo);
        $('#ad_companyName').val(data.ad_companyName);
        $('#ad_companyTelNo').val(data.ad_companyTelNo);
        $('#ad_companyEmail').val(data.ad_companyEmail);
        $('#ad_contactPerson').val(data.ad_contactPerson);
        $('#ad_contactPersonNo').val(data.ad_contactPersonNo);
        $('#ad_website').val(data.ad_website);
        $('#ad_operator').val(data.ad_operator);
        $('#ad_companyStatus').val(data.ad_companyStatus);
        $('#ad_status').val(data.ad_status);
        $('#ad_remark').val(data.ad_remark);
        $('#ad_dateFrom').val(data.ad_dateFrom);
        $('#ad_dateTo').val(data.ad_dateTo);
        $('#ad_price').val(data.ad_price);
        $('#createdBy').val(data.createdBy);
        $('#createdDate').val(data.createdDate);
        $('#updatedBy').val(data.updatedBy);
        $('#updatedDate').val(data.updatedDate);
        $('#ad_uploaded_image').html(data.ad_image);
        $('#ad_image_input').html(data.ad_image_input);
        $('.modal-title').text("View Advertisement");
        $('#id').val(id);
        $('#action').val("Update");
        $('#operation').val("Update");
        if('<?= $update ?>' == 'd-none') {
          $('#action').hide();
        } else {
          $('#action').show();
        }
      }
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this?"))
      {
      $.ajax({
        url:"process/advert_delete.php",
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

    $('#ad_dateFrom').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

    $('#ad_dateTo').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

  });

  function addAdvert() {
    $('#createdUpdated').hide();
    $('#createdUpdatedHR').hide();
    $('#formAdvert')[0].reset();
    $('#error_text').text('');
    $('.modal-title').text("Add Advertisement");
    $('#action').val("Add");
    $('#operation').val("Add");
    if('<?= $create ?>' == 'd-none') {
      $('#action').hide();
    } else {
      $('#action').show();
    }
    $('#advertModal').modal('show');
  }
  
</script>