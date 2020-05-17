<script type="text/javascript">

  function selectPromoFrom(id) {
    if (id == 2) {
      $('#agency').show();
    } else {
      $('#agency').hide();
    }
  }

  $(document).ready(function() {
    
    var dataTable = $('#dt_ListPromo').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/promo_fetch.php",
        type:"POST",
        data:{
          delete:'<?= $delete ?>'
        },
      },
      "columnDefs":[
        {
          "targets":[0,9],
          "orderable":false
        },
        {
          "targets":[0,4,5,6,9],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ],

    });

    $(document).on('submit', '#formPromo', function(event){
      event.preventDefault();
      var error_text = '';
      var error_text_img = '';
      var promo_from = $('#promo_from').val();
      var promo_agency = $('#promo_agency').val();
      var promo_code = $('#promo_code').val();
      var promo_desc = $('#promo_desc').val();
      var promo_dateFrom = $('#promo_dateFrom').val();
      var promo_dateTo = $('#promo_dateTo').val();
      var promo_status = $('#promo_status').val();
      var promo_pax = $('#promo_pax').val();
      var promo_variable = $('#promo_variable').val();
      var promo_variableAmount = $('#promo_variableAmount').val();
      var promo_operator = $('#promo_operator').val();
      if(promo_from == '' || promo_code == '' || promo_desc == '' || promo_dateFrom == '' || promo_dateTo == '' || promo_status == '' || promo_variable == '' || promo_variableAmount == '') {
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
          url:"process/promo_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#promoModal').modal('hide');
            $('#formPromo')[0].reset();    
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
      // alert(id);
      $.ajax({
      url:"process/promo_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#promoModal').modal('show');
        $('#createdUpdated').show();
        $('#createdUpdatedHR').show();
        $('#promo_from').val(data.promo_from);
        if (data.promo_from == 2) {
          $('#agency').show();
        } else {
          $('#agency').hide();
        }
        $('#promo_agency').val(data.promo_agency);
        $('#promo_code').val(data.promo_code);
        $('#promo_desc').val(data.promo_desc);
        $('#promo_dateFrom').val(data.promo_dateFrom);
        $('#promo_dateTo').val(data.promo_dateTo);
        $('#promo_status').val(data.promo_status);
        $('#promo_pax').val(data.promo_pax);
        $('#promo_variable').val(data.promo_variable);
        $('#promo_variableAmount').val(data.promo_variableAmount);
        $('#promo_operator').val(data.promo_operator);
        $('#createdBy').val(data.createdBy);
        $('#createdDate').val(data.createdDate);
        $('#updatedBy').val(data.updatedBy);
        $('#updatedDate').val(data.updatedDate);
        $('.modal-title').text("View Promotion");
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
        url:"process/promo_delete.php",
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

    $('#promo_dateFrom').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

    $('#promo_dateTo').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

  });

  function addPromo() {
    $('#agency').hide();
    $('#createdUpdated').hide();
    $('#createdUpdatedHR').hide();
    $('#formPromo')[0].reset();
    $('#error_text').text('');
    $('.modal-title').text("Add Promotion");
    $('#action').val("Add");
    $('#operation').val("Add");
    if('<?= $create ?>' == 'd-none') {
      $('#action').hide();
    } else {
      $('#action').show();
    }
    $('#promoModal').modal('show');
  }
    
  </script>