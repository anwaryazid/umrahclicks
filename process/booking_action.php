<?php

include("../lib/conn.php");
include("../lib/function.php");

if(isset($_POST["operation"])) {

  // pre($_POST);
  // exit;

  if($_POST["operation"] == "Book") {    

    $updatedDate = date('Y-m-d H:i:s');
    $booking_id = '';
    $guest_name = $_POST["guest_name"];
    $guest_no = $_POST["guest_no"];    
    $guest_email = $_POST["guest_email"];    
    $guest_country = $_POST["guest_country"];    
    $guest_pax = $_POST["guest_pax"];
    $guest_deposit = $_POST["guest_deposit"];
    $guest_booking_price = $_POST["guest_booking_price"];
    $agency_id = $_POST["agency_id"];
    $package_id = $_POST["package_id"];
    $package_room_id = $_POST["package_room_id"];
    $promo_id = $_POST["promo_id"];
    $guest_date_depart = $_POST["guest_date_depart"];

    $query = "INSERT INTO guest_transaction 
    (guest_name,guest_no,guest_email,guest_payor,guest_country,guest_pax,guest_deposit,guest_booking_price,agency_id,package_id,package_room_id,promo_id,guest_date_depart) 
    VALUES ('$guest_name','$guest_no','$guest_email','$guest_name','$guest_country','$guest_pax','$guest_deposit','$guest_booking_price','$agency_id','$package_id','$package_room_id','$promo_id','$guest_date_depart')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $last_id = $conn->insert_id;
    $booking_id = str_pad($last_id, 6, "0", STR_PAD_LEFT);
    
    $addBookingID = $conn->query("UPDATE guest_transaction SET booking_id = '".$booking_id."' WHERE id = '".$last_id."'") or die(mysqli_error($conn));

    if ($guest_pax > 1) {
      $add_guest = '';
      $guests = $_POST["add_guest"];
      foreach ($guests as $key => $value) {
        $query2 = "INSERT INTO guest_with (guest_id,cust_name) VALUES ('$last_id','$value')";
        $result2 = $conn->query($query2) or die(mysqli_error($conn));
      }
    } else {
      $result2 = '1';
    }

    if(!empty($result) && !empty($result2)) {
      echo 'added-'.$last_id;
    }
    
  }

  $conn->close();
}

?>