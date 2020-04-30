<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

$output = array();

if(isset($_POST["operation_profile"])) {

  $id = $_POST["userid"];
  $userEmail = $_POST["puserEmail"];

  if($_POST["operation_profile"] == "Update") {    


    $query = "UPDATE user 
    SET 
    userEmail = '$userEmail'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'updated';
    }

  }

  // echo json_encode($output);
  $conn->close();
}

?>