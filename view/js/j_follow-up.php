<script type="text/javascript">

    $(document).ready(function() {

      var dataTable = $('#dt_ListFollowUp').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
          url:"process/followup_fetch.php",
          type:"POST"
        },
        "columnDefs":[
          {
            "targets":[0,7],
            "orderable":false
          },
          {
            "targets":[0,4,5,7],
            "className":"text-center"
          },
          {
            "targets":[1],
            "visible":false
          },
        ],

      });

      $(document).on('submit', '#formFollowUp', function(event){
        event.preventDefault();
        var error_text = '';
        var error_text_img = '';
        var cust_callDate = $('#cust_callDate').val();
        var cust_remarks = $('#cust_remarks').val();
        var agency_callDate = $('#agency_callDate').val();
        var agency_remarks = $('#agency_remarks').val();
        if(cust_callDate == '' && cust_remarks == '' && agency_callDate == '' && agency_remarks == '') {
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
            url:"process/followup_action.php",
            method:'POST',
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
              $('#followUpModal').modal('hide');
              $('#formFollowUp')[0].reset();    
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
        url:"process/followup_fetch_single.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data)
        {
          $('#followUpModal').modal('show');
          $('#formFollowUp')[0].reset();
          $('#createdUpdatedHR').show();
          $('#createdUpdated').show();
          $('#guest_name').val(data.guest_name);
          $('#guest_email').val(data.guest_email);
          $('#guest_phoneNo').val(data.guest_phoneNo);
          $('#agency_name').val(data.agency_name);
          $('#package_name').val(data.package_name);
          $('#pax').val(data.pax);
          $('#confirm_date').val(data.confirm_date);
          $('#cust_callDate').val(data.cust_callDate);
          $('#cust_remarks').val(data.cust_remarks);
          $('#agency_callDate').val(data.agency_callDate);
          $('#agency_remarks').val(data.agency_remarks);
          $('#fp_status').val(data.fp_status);
          $('#operator').val(data.operator);
          $('#complete_date').val(data.complete_date);
          $('#createdBy').val(data.createdBy);
          $('#createdDate').val(data.createdDate);
          $('#updatedBy').val(data.updatedBy);
          $('#updatedDate').val(data.updatedDate);
          $('.modal-title').text("Update Follow Up");
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
      
    });

    $(function() {

      $('#cust_callDate').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
      });
      
      $('#agency_callDate').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
      });
      
    });

    function followUp() {
      $('#followUpModal').modal('show');
    }
    
</script>