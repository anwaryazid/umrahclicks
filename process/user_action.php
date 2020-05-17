<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  // var_dump($_POST);
  // exit;

  if($_POST["operation"] == "Add") {    

    $updatedDate = date('Y-m-d H:i:s');
    $userFullName = $_POST["userFullName"];
    $userStatus = $_POST["userStatus"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = password_hash($_POST["userPassword"], PASSWORD_DEFAULT);
    $userType = $_POST["userType"];
    $groupType = $_POST["groupType"];
    $userAgency = 'NULL';
    if ($userType == 4) {
      $userAgency = $_POST["userAgency"];
    }
    /* $userAccess = '';
    $userAgency = 'NULL';
    if ($userType == 3) {
      if (isset($_POST["userAccess"])) {
        $access = $_POST["userAccess"];
        foreach ($access as $key => $value) {
          $userAccess .= $value.',';
        }
        $userAccess = rtrim($userAccess, ',');
      } else {
        $userAccess = '';
      }
    } else if ($userType == 4) {
      $userAgency = $_POST["userAgency"];
      $userAccess = '1,2,3,4';
    } else {
      $userAccess = '';
      $userAgency = 'NULL';
    } */

    $query = "INSERT INTO user (userFullName,userStatus,userName,userEmail,userPassword,userType,groupType,userAgency,createdDate,createdBy) 
    VALUES ('$userFullName','$userStatus','$userName',".(($userEmail=='')?"NULL":("'".$userEmail."'")).",'$userPassword','$userType','$groupType',$userAgency,'$updatedDate','$user_name')";

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
    $userType = $_POST["userType"];
    $groupType = $_POST["groupType"];
    $userAgency = 'NULL';
    if ($userType == 4) {
      $userAgency = $_POST["userAgency"];
    }
    $updatedDate = date('Y-m-d H:i:s');    
    /* if ($userType == 3) {
      if (isset($_POST["userAccess"])) {
        $access = $_POST["userAccess"];
        foreach ($access as $key => $value) {
          $userAccess .= $value.',';
        }
        $userAccess = rtrim($userAccess, ',');
      } else {
        $userAccess = '';
      }
    } else if ($userType == 4) {
      $userAgency = $_POST["userAgency"];
      $userAccess = '1,2,3,4';
    } else {
      $userAccess = '';
      $userAgency = 'NULL';
    } */

    $query = "UPDATE user 
    SET 
    userFullName = '$userFullName',
    userStatus = '$userStatus',
    userName = '$userName',
    userEmail = ".(($userEmail=='')?"NULL":("'".$userEmail."'")).",
    userType = '$userType',
    groupType = '$groupType',
    userAgency = $userAgency,
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