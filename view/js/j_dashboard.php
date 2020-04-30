<script type="text/javascript"> 

  $(document).ready(function() {

    var dt_ActivePromo = $('#dt_ActivePromo').DataTable({
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/active_promo_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[2,3],
          "className":"text-center"
        },
      ],
    });

    var dt_ActiveAdvert = $('#dt_ActiveAdvert').DataTable({
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/active_advert_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[1],
          "className":"text-center"
        },
      ],
    });

    var dt_FollowUp = $('#dt_FollowUp').DataTable({
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/followup_outstanding_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[2,3],
          "className":"text-center"
        },
        {
          "targets":[0],
          "visible":false
        },
      ],
    });

    $('#dt_FollowUp tbody').on('click','tr', function() {
      var currentRowData = dt_FollowUp.row(this).data();
      // alert(currentRowData[0]);
      viewCustomer(currentRowData[0]);
    });

    var dt_CustomerDetail = $('#dt_CustomerDetail').DataTable({
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/customer_details_fetch.php?id=0",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[1,2,3],
          "className":"text-center"
        },
      ],
      autoWidth: false
    });

    var dt_AgencyBelow10 = $('#dt_AgencyBelow10').DataTable({
      "sDom": '<"top"I>rt<"bottom"><"clear">',
      "ordering": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        url:"process/agency_below_10_fetch.php",
        type:"POST"
      },
      "columnDefs":[
        {
          "targets":[2,3],
          "className":"text-center"
        },
      ],
    });

  });

  // function viewCustomer(follow_up_id) {
  //   $('#customerModal').modal('show');
  // }

  function viewCustomer(id) { 
    var id = id;
    $('#dt_CustomerDetail').DataTable().ajax.url("process/customer_details_fetch.php?id="+id).load();
    $('#customerModal').modal('show');
  }
  
</script>