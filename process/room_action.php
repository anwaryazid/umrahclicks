<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {
    
    $package_id = $_POST["package_id"];
    $room_type = $_POST["room_type"];
    $room_actualCost = $_POST["room_actualCost"];
    $room_umrahCost = $_POST["room_umrahCost"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO package_room (package_id,room_type,room_actualCost,room_umrahCost,createdBy,createdDate) 
    VALUES ('$package_id','$room_type','$room_actualCost','$room_umrahCost','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

}

?>