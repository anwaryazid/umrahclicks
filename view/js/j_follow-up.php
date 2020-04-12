<script type="text/javascript">

    $(document).ready(function() {

      $('#dt_ListFollowUp').DataTable();
      
    });

    $(function() {

      $('#date_callAgency').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });
      
      $('#date_callCustomer').datepicker({
        'format': 'dd/mm/yyyy',
        'autoclose': true
      });
      
    });
    
</script>