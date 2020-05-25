<?php

include("../lib/conn.php");
include("../lib/function.php");

if(isset($_POST["operation"])) {

  // pre($_POST);
  // exit;

  if($_POST["operation"] == "Book") {    

    $updatedDate = date('Y-m-d H:i:s');
    $guest_name = $_POST["guest_name"];    
    $guest_no = $_POST["guest_no"];    
    $guest_email = $_POST["guest_email"];    
    $guest_country = $_POST["guest_country"];    
    $guest_pax = $_POST["guest_pax"];
    $guest_deposit = $_POST["guest_deposit"];
    $guest_booking_price = $_POST["guest_booking_price"];
    $agency_id = $_POST["agency_id"];
    $package_id = $_POST["package_id"];
    $package_id = $_POST["package_id"];
    $package_room_id = $_POST["package_room_id"];
    $promo_id = $_POST["promo_id"];

    $query = "INSERT INTO guest_transaction 
    (guest_name,guest_no,guest_email,guest_payor,guest_country,guest_pax,guest_deposit,guest_booking_price,agency_id,package_id,package_room_id,promo_id) 
    VALUES ('$guest_name','$guest_no','$guest_email','$guest_name','$guest_country','$guest_pax','$guest_deposit','$guest_booking_price','$agency_id','$package_id','$package_room_id','$promo_id')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $last_id = $conn->insert_id;    

    $add_guest = '';
    $guests = $_POST["add_guest"];
    foreach ($guests as $key => $value) {
      $query2 = "INSERT INTO guest_with (guest_id,cust_name) VALUES ('$last_id','$value')";
      $result2 = $conn->query($query2) or die(mysqli_error($conn));
    }

    /* $query3 = "INSERT INTO follow_up (guest_id,guest_status) 
    VALUES ('$last_id','1')"; */

    // $result3 = $conn->query($query3) or die(mysqli_error($conn));

    if(!empty($result) && !empty($result2)) {
      echo 'added-'.$last_id;
    }
    
  }

  $conn->close();
}

?>