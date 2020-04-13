<script type="text/javascript">

    $(document).ready(function() {

      $('#dt_ListPackage').DataTable();

      $('#dt_ListRoom').DataTable({
        "sDom": '<"top"I>rt<"bottom"><"clear">'
      });

    });

    $(function() {

      $('#pck_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#pck_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_pck_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_pck_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

    });
    
  </script>