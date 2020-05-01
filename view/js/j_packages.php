<script type="text/javascript">

  $(document).ready(function() {

    var dt_ListPackage = $('#dt_ListPackage').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"process/package_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,7],
          "orderable":false
        },
        {
          "targets":[0,4,5,6,7],
          "className":"text-center"
        },
        {
          "targets":[1],
          "visible":false
        },
      ],

    });

    var dt_ListRoom = $('#dt_ListRoom').DataTable({
      destroy: true,
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/room_fetch.php?id=0",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,4],
          "className":"text-center"
        },
        {
          "targets":[0],
          "visible":false
        },
      ],
      autoWidth: false
    });

    var dt_Image = $('#dt_Image').DataTable({
      destroy: true,
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/image_fetch.php?id=0",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[0,1,2,3,4],
          "className":"text-center"
        },
        {
          "targets":[0],
          "visible":false
        },
      ],
      autoWidth: false
    });

    $(document).on('submit', '#formPackage', function(event){
      event.preventDefault();
      var error_text = '';
      var agency_id = $('#agency_id').val();
      var package_name = $('#package_name').val();
      var package_status = $('#package_status').val();
      var package_remark = $('#package_remark').val();
      var package_dateFrom = $('#package_dateFrom').val();
      var package_dateTo = $('#package_dateTo').val();
      var package_pax = $('#package_pax').val();
      var package_flight_id = $('#package_flight_id').val();
      var package_meal_id = $('#package_meal_id').val();
      var package_mutawwif = $('#package_mutawwif').val();
      var package_1stDestination = $('#package_1stDestination').val();
      var package_ziarah = $('#package_ziarah').val();
      var makkah_hotel = $('#makkah_hotel').val();
      var makkah_distance = $('#makkah_distance').val();
      var makkah_days = $('#makkah_days').val();
      var makkah_night = $('#makkah_night').val();
      var madinah_hotel = $('#madinah_hotel').val();
      var madinah_distance = $('#madinah_distance').val();
      var madinah_days = $('#madinah_days').val();
      var madinah_night = $('#madinah_night').val();
      var package_thumbnail = $('#package_thumbnail').val().split('.').pop().toLowerCase();
      if(package_thumbnail != '') {
        if(jQuery.inArray(package_thumbnail, ['gif','png','jpg','jpeg']) == -1) {
          alert("Invalid Image File");
          $('#package_thumbnail').val('');
          $('#package_thumbnail').css('border-color', '#cc0000');
          return false;
        }
      }
      
      if(agency_id == '' || package_name == '' || package_status == '' || package_dateFrom == '' || package_dateTo == '' || package_pax == '' || package_flight_id == '') {
        error_text = '* Please fill in required field';
        $('#error_text').text(error_text);
      }
      else if(package_meal_id == '' || package_mutawwif == '' || package_1stDestination == '' || makkah_hotel == '' || makkah_distance == '' || makkah_days == '') {
        error_text = '* Please fill in required field';
        $('#error_text').text(error_text);
      }
      else if(makkah_night == '' || madinah_hotel == '' || madinah_distance == '' || madinah_days == '' || madinah_night == '') {
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
          url:"process/package_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#packageModal').modal('hide');
            $('#formPackage')[0].reset();    
            if (data.includes("added")) {
              var pckge_id = data.split('-').pop();
              viewAlert(1,'Data succesfully added');
              viewRoom(pckge_id);
            } else if (data.includes("updated")) {
              viewAlert(1,'Data succesfully updated');
            } else {
              viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
            }       
            dt_ListPackage.ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.update', function(){
      var id = $(this).attr("id");
      $.ajax({
      url:"process/package_fetch_single.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#btnRoom').show();
        $('#btnImage').show();
        $('#error_text').text('');
        $('#packageModal').modal('show');
        $('#createdUpdatedHR').show();
        $('#createdUpdated').show();
        $('#agency_id').val(data.agency_id);
        $('#package_name').val(data.package_name);
        $('#package_status').val(data.package_status);
        $('#package_remark').val(data.package_remark);
        $('#package_dateFrom').val(data.package_dateFrom);
        $('#package_dateTo').val(data.package_dateTo);
        $('#package_pax').val(data.package_pax);
        $('#package_flight_id').val(data.package_flight_id);
        $('#package_meal_id').val(data.package_meal_id);
        $('#package_mutawwif').val(data.package_mutawwif);
        $('#package_1stDestination').val(data.package_1stDestination);
        $('#package_ziarah').val(data.package_ziarah);
        $('#makkah_hotel').val(data.makkah_hotel);
        $('#makkah_distance').val(data.makkah_distance);
        $('#makkah_days').val(data.makkah_days);
        $('#makkah_night').val(data.makkah_night);
        $('#madinah_hotel').val(data.madinah_hotel);
        $('#madinah_distance').val(data.madinah_distance);
        $('#madinah_days').val(data.madinah_days);
        $('#madinah_night').val(data.madinah_night);
        $('#createdBy').val(data.createdBy);
        $('#createdDate').val(data.createdDate);
        $('#updatedBy').val(data.updatedBy);
        $('#updatedDate').val(data.updatedDate);
        $('#package_uploaded_image').html(data.package_thumbnail);
        $('#package_thumbnail_input').html(data.package_thumbnail_input);
        $('#makkah_uploaded_image').html(data.makkah_hotelImg);
        $('#makkah_hotelImg_input').html(data.makkah_hotelImg_input);
        $('#madinah_uploaded_image').html(data.madinah_hotelImg);
        $('#madinah_hotelImg_input').html(data.madinah_hotelImg_input);
        $('.modal-title').text("View Package");
        $('#btnRoom').val(id);
        $('#btnImage').val(id);
        $('#id').val(id);
        $('#action').val("Update");
        $('#operation').val("Update");
      }
      })
    });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this package?"))
      {
      $.ajax({
        url:"process/package_delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'deleted') {
            viewAlert(1,'Data succesfully deleted');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dt_ListPackage.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
    });

    $(document).on('submit', '#formRoom', function(event){
      event.preventDefault();
      var error_text_room = '';
      var package_id = $("#package_id").val();  
      var room_type = $('#room_type').val();
      var room_actualCost = $('#room_actualCost').val();
      var room_umrahCost = $('#room_umrahCost').val();
      if(room_type == '' || room_actualCost == '' || room_umrahCost == '') {
        error_text_room = '* Please fill in required field';
        $('#error_text_room').text(error_text_room);
      }
      else {
        error_text_room = '';
        $('#error_text_room').text(error_text_room);
      }

      if(error_text_room != '') {
        return false;
      }
      else {
        $.ajax({
          url:"process/room_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#formRoom')[0].reset(); 
            $("#package_id").val(package_id);   
            if (data == 'added') {
              viewAlert(1,'Data succesfully added');
            } else if (data == 'updated') {
              viewAlert(1,'Data succesfully updated');
            } else {
              viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
            }       
            dt_ListRoom.ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.delete-room', function(){
      var id = $(this).attr("id");
      var package_id = $("#package_id").val();
      if(confirm("Are you sure you want to delete this room?"))
      {
      $.ajax({
        url:"process/room_delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'deleted') {
            viewAlert(1,'Data succesfully deleted');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dt_ListRoom.ajax.reload();
        }
      });
      }
      else
      {
      return false; 
      }
    });

    $(document).on('submit', '#formImage', function(event){
      event.preventDefault();
      var error_text_image = '';
      var package_id = $("#package_id2").val(); 
      var img_for = $('#img_for').val();
      var img_title = $('#img_title').val();
      var hotel_img = $('#hotel_img').val().split('.').pop().toLowerCase();
      if(hotel_img != '')
      {
        if(jQuery.inArray(hotel_img, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#hotel_img').val('');
          return false;
        }
      } 
      if(img_for == '' || hotel_img == '' || img_title == '') {
        error_text_image = '* Please fill in required field';
        $('#error_text_image').text(error_text_image);
      }
      else {
        error_text_image = '';
        $('#error_text_image').text(error_text_image);
      }

      if(error_text_image != '') {
        return false;
      }
      else {
        $.ajax({
          url:"process/image_action.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#formImage')[0].reset();   
            $("#package_id2").val(package_id); 
            if (data == 'added') {
              viewAlert(1,'Data succesfully added');
            } else if (data == 'updated') {
              viewAlert(1,'Data succesfully updated');
            } else {
              viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
            }       
            dt_Image.ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.delete-image', function(){
      var id = $(this).attr("id");
      var package_id = $("#package_id2").val();
      if(confirm("Are you sure you want to delete this image?"))
      {
      $.ajax({
        url:"process/image_delete.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          if (data == 'deleted') {
            viewAlert(1,'Data succesfully deleted');
          } else {
            viewAlert(2,'<strong>Error!</strong> Please contact system administrator.');
          }
          dt_Image.ajax.reload();
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

    $('#package_dateTo').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

    $('#package_dateFrom').datepicker({
      'format': 'yyyy-mm-dd',
      'autoclose': true
    });

  });

  function addPackage() {
    $('#btnRoom').hide();
    $('#btnImage').hide();
    $('#formPackage')[0].reset();
    $('#error_text').text('');
    $('#createdUpdatedHR').hide();
    $('#createdUpdated').hide();
    $('#room').hide();
    $('#roomHR').hide();
    $('.modal-title').text("Add Package");
    $('#package_uploaded_image').html('');
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#packageModal').modal('show');
  }

  function viewPackage(id) { 
    var id = id;
    $.ajax({
    url:"process/package_fetch_single.php",
    method:"POST",
    data:{id:id},
    dataType:"json",
    success:function(data)
    {
      $('#btnRoom').show();
      $('#btnImage').show();
      $('#error_text').text('');
      $('#roomModal').modal('hide');
      $('#imageModal').modal('hide');
      $('#packageModal').modal('show');
      $('#createdUpdatedHR').show();
      $('#createdUpdated').show();
      $('#agency_id').val(data.agency_id);
      $('#package_name').val(data.package_name);
      $('#package_status').val(data.package_status);
      $('#package_remark').val(data.package_remark);
      $('#package_dateFrom').val(data.package_dateFrom);
      $('#package_dateTo').val(data.package_dateTo);
      $('#package_pax').val(data.package_pax);
      $('#package_flight_id').val(data.package_flight_id);
      $('#package_meal_id').val(data.package_meal_id);
      $('#package_mutawwif').val(data.package_mutawwif);
      $('#package_1stDestination').val(data.package_1stDestination);
      $('#package_ziarah').val(data.package_ziarah);
      $('#makkah_hotel').val(data.makkah_hotel);
      $('#makkah_distance').val(data.makkah_distance);
      $('#makkah_days').val(data.makkah_days);
      $('#makkah_night').val(data.makkah_night);
      $('#madinah_hotel').val(data.madinah_hotel);
      $('#madinah_distance').val(data.madinah_distance);
      $('#madinah_days').val(data.madinah_days);
      $('#madinah_night').val(data.madinah_night);
      $('#createdBy').val(data.createdBy);
      $('#createdDate').val(data.createdDate);
      $('#updatedBy').val(data.updatedBy);
      $('#updatedDate').val(data.updatedDate);
      $('#package_uploaded_image').html(data.package_thumbnail);
      $('#package_thumbnail_input').html(data.package_thumbnail_input);
      $('#makkah_uploaded_image').html(data.makkah_hotelImg);
      $('#makkah_hotelImg_input').html(data.makkah_hotelImg_input);
      $('#madinah_uploaded_image').html(data.madinah_hotelImg);
      $('#madinah_hotelImg_input').html(data.madinah_hotelImg_input);
      $('.modal-title').text("View Package");
      $('#btnRoom').val(id);
      $('#btnImage').val(id);
      $('#id').val(id);
      $('#action').val("Update");
      $('#operation').val("Update");
    }
    })
  }

  function viewRoom(pckge_id) {    
    $('#packageModal').modal('hide');
    $('#imageModal').modal('hide');
    $('#error_text').text('');
    $('#error_text_room').text('');
    $('#btnPackage2').val(pckge_id);
    $('#btnImage2').val(pckge_id);
    $('#package_id').val(pckge_id);
    $('#dt_ListRoom').DataTable().ajax.url("process/room_fetch.php?id="+pckge_id).load();
    $('.modal-title').text("Room");
    $('#roomModal').modal('show');
  }

  function viewImage(pckge_id) {
    $('#packageModal').modal('hide');
    $('#roomModal').modal('hide');
    $('#error_text_image').text('');
    $('#btnPackage3').val(pckge_id);
    $('#btnRoom3').val(pckge_id);
    $('#package_id2').val(pckge_id);
    $('#dt_Image').DataTable().ajax.url("process/image_fetch.php?id="+pckge_id).load();
    $('.modal-title').text("Hotel Image");
    $('#imageModal').modal('show');
  }

  function getUmrahCost(cost) {
    var actual = cost;
    var umrahCost = cost - 300;
    $('#room_umrahCost').val(umrahCost);
  }
  
</script>