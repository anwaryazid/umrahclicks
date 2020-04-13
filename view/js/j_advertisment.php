<script type="text/javascript">

    $(document).ready(function() {
      
      $('#dt_ListAdvert').DataTable();

    });

    $(function() {

      $('#adv_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#adv_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_adv_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_adv_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

    });
    
  </script>