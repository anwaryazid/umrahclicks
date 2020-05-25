<?php

include("../lib/conn.php");
include("../lib/function.php");

if(isset($_POST["operation"])) {

  // pre($_POST);
  // exit;

  if($_POST["operation"] == "Pay") {

    $id = $_POST["id"];
    $amount = $_POST["amount"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "UPDATE guest_transaction 
    SET 
    payment_status = '1',
    transaction_status = '1',
    transaction_date = '$updatedDate',
    transaction_close_date = '$updatedDate'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $query2 = "INSERT INTO follow_up (guest_id,confirm_Date) 
    VALUES ('$id','$updatedDate')";

    $result2 = $conn->query($query2) or die(mysqli_error($conn));

    if(!empty($result) && !empty($result2)) {
      echo 'paid';
    }
  }

  $conn->close();
}

?>