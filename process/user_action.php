<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $updatedDate = date('Y-m-d H:i:s');
    $userFullName = $_POST["userFullName"];
    $userStatus = $_POST["userStatus"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = password_hash($_POST["userPassword"], PASSWORD_DEFAULT);
    $selUserType = $_POST["selUserType"];
    $userAccess = '';
    if ($selUserType == 3) {
      if (isset($_POST["userAccess"])) {
        $access = $_POST["userAccess"];
        foreach ($access as $key => $value) {
          $userAccess .= $value.',';
        }
        $userAccess = rtrim($userAccess, ',');
      } else {
        $userAccess = '';
      }
    } else {
      $userAccess = '';
    }

    $query = "INSERT INTO user (userFullName,userStatus,userName,userEmail,userPassword,userType,userAccess,createdDate,createdBy) 
    VALUES ('$userFullName','$userStatus','$userName','$userEmail','$userPassword','$selUserType','$userAccess','$updatedDate','$user_name')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $userFullName = $_POST["userFullName"];
    $userStatus = $_POST["userStatus"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $selUserType = $_POST["selUserType"];
    $userAccess = '';
    $updatedDate = date('Y-m-d H:i:s');    
    if ($selUserType == 3) {
      if (isset($_POST["userAccess"])) {
        $access = $_POST["userAccess"];
        foreach ($access as $key => $value) {
          $userAccess .= $value.',';
        }
        $userAccess = rtrim($userAccess, ',');
      } else {
        $userAccess = '';
      }
    } else {
      $userAccess = '';
    }

    $query = "UPDATE user 
    SET 
    userFullName = '$userFullName',
    userStatus = '$userStatus',
    userName = '$userName',
    userEmail = '$userEmail',
    userType = '$selUserType',
    userAccess = '$userAccess',
    updatedDate = '$updatedDate',
    updatedBy = '$user_name'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'updated';
    }
  }
  $conn->close();
}

?>