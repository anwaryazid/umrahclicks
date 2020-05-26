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

    $book_pax = 0;
    $pax_book = 0;
    $guest_pax = 0;

    $guests = $conn->query("SELECT * FROM guest_transaction WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
    foreach($guests as $guest) {
      $package_id = $guest['package_id'];
      $guest_pax = $guest['guest_pax'];
    }

    $packages = $conn->query("SELECT * FROM package WHERE id = '$package_id' LIMIT 1") or die(mysqli_error($conn));
    foreach($packages as $package) {
      $pax_book = $package['package_pax_book'];
    }

    $book_pax = $guest_pax + $pax_book;

    $query3 = "UPDATE package 
    SET 
    package_pax_book = '$book_pax'
    WHERE id = '$package_id'";

    $result3 = $conn->query($query3) or die(mysqli_error($conn));

    if(!empty($result) && !empty($result2)) {
      echo 'paid';
    }
  }

  $conn->close();
}

?>