<script type="text/javascript">

  $(document).ready(function() {

    var dataTable = $('#dt_ListCountry').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/ref-country/fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0],
          "orderable":false
        },
        {
          "targets":[0,1,3,5],
          "className":"text-center"
        }
      ],

    });

    $(document).on('submit', '#form_add_country', function(event){
      event.preventDefault();
      var error_countryKod = '';
		  var error_countryName = '';
      var countryKod = $('#countryKod').val();
      var countryName = $('#countryName').val();
      var currencyKod = $('#currencyKod').val();
      var currencyName = $('#currencyName').val();
      if(countryKod == '') {
        error_countryKod = 'Country code is required';
        $('#error_countryKod').text(error_countryKod);
        $('#countryKod').css('border-color', '#cc0000');
      }
      else {
        error_countryKod = '';
        $('#error_countryKod').text(error_countryKod);
        $('#countryKod').css('border-color', '');
      }
      if(countryName == '') {
        error_countryName = 'Country name is required';
        $('#error_countryName').text(error_countryName);
        $('#countryName').css('border-color', '#cc0000');
      }
      else {
        error_countryName = '';
        $('#error_countryName').text(error_countryName);
        $('#countryName').css('border-color', '');
      }

      if(error_countryKod != '' || error_countryName != '') {
        return false;
      }
      else {
        $.ajax({
          url:"process/ref-country/insert.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            viewAlert(1,data);
            $('#form_add_country')[0].reset();
            $('#countryModal').modal('hide');
            dataTable.ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.update', function(){
      var id = $(this).attr("id");
      $.ajax({
      url:"process/ref-country/fetch_single.php",
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
        $('.modal-title').text("View Country");
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
        url:"process/ref-country/delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          viewAlert(1,data);
          dataTable.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
 });

    setTimeout(function () {
      $('#result-alert').hide('fade');
    }, 3000);
    
  });

  function addCountry() {
    $('#form_add_country')[0].reset();
    $('#error_countryKod').text('');
    $('#countryKod').css('border-color', '');
    $('#error_countryName').text('');
    $('#countryName').css('border-color', '');
    $('.modal-title').text("Add Country");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#countryModal').modal('show');
  }

  $('#countryModal').on('hidden.bs.modal', function (e) {
    $('#form_add_country')[0].reset();
    $('#error_countryKod').text('');
    $('#countryKod').css('border-color', '');
    $('#error_countryName').text('');
    $('#countryName').css('border-color', '');
  })
  
</script>