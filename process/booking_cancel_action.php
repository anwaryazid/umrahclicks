<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $query = "UPDATE guest_transaction 
    SET 
    cancellation_status = '1'
    WHERE id = '".$_POST["id"]."'";

  $result = $conn->query($query) or die(mysqli_error($conn));

  if(!empty($result))  {
  echo 'cancelled';
  }
}

?>