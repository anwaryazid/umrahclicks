<script type="text/javascript">

  $(document).ready(function() {

    var dataTable = $('#dt_ListCountry').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/country_fetch.php",
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
      ],

    });

    $(document).on('submit', '#formCountry', function(event){
      event.preventDefault();
      var error_text = '';
      var error_text_img = '';
      var countryKod = $('#countryKod').val();
      var countryName = $('#countryName').val();
      var currencyKod = $('#currencyKod').val();
      var currencyName = $('#currencyName').val();
      var currencySymbol = $('#currency_symbol').val();
      var extension = $('#countryImg').val().split('.').pop().toLowerCase();
      if(extension != '')
      {
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#countryImg').val('');
          return false;
        }
      } 
      if(countryKod == '' || countryName == '' || currencyKod == '' || currencyName == '') {
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
          url:"process/country_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#countryModal').modal('hide');
            $('#formCountry')[0].reset();    
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
      url:"process/country_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#countryModal').modal('show');
        $('#countryKod').val(data.countryKod);
        $('#countryName').val(data.countryName);
        $('#currencyKod').val(data.currencyKod);
        $('#currencyName').val(data.currencyName);
        $('#currencySymbol').val(data.currencySymbol);
        $('#country_uploaded_image').html(data.countryImg);
        $('.modal-title').text("View Country");
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
        url:"process/country_delete.php",
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

  function addCountry() {
    $('#formCountry')[0].reset();
    $('#error_text').text('');
    $('.modal-title').text("Add Country");
    $('#country_uploaded_image').html('');
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#countryModal').modal('show');
  }

</script>