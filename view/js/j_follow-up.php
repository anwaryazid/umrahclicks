<script type="text/javascript">

    $(document).ready(function() {

      $('#dt_ListFollowUp').DataTable();
      
    });

    $(function() {

      $('#fu_date_callAgency').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });
      
      $('#fu_date_callCustomer').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });

      $('#fu_date_confirmation').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });
      
    });
    
</script>