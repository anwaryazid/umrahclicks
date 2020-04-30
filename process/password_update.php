<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

$output = array();

if(isset($_POST["operation_password"])) {

  $id = $_POST["cpuserid"];
  $cpuserPassword = $_POST["cpuserPassword"];
  $newPassword = password_hash($_POST["cpuserNewPassword"], PASSWORD_DEFAULT);

  if($_POST["operation_password"] == "Update") {    

    $query = "SELECT * FROM user WHERE id = '".$id."'";
    $result = $conn->query($query) or die(mysqli_error($conn));
    foreach($result as $row) {
      $password = password_verify($_POST["cpuserPassword"], $row['userPassword']);
      if($password) {
        $update = $conn->query("UPDATE user SET userPassword = '$newPassword' WHERE id = '$id'") or die(mysqli_error($conn));
        if(!empty($update)) {
          $output["success"] = "true";
        }          
      } else {
        $output["success"] = "false";
        $output["result"] = "Current Password incorrect";
      }
    }

  }

  echo json_encode($output);
  $conn->close();
}

?>