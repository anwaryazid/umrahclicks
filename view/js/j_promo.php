<script type="text/javascript">

    $(document).ready(function() {
      
      $('#dt_ListPromo').DataTable();
      
    });

    $(function() {

      $('#promo_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#promo_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_promo_date_from').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#u_promo_date_to').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

    });
    
  </script>