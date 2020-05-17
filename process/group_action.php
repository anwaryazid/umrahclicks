<?php

include("../lib/conn.php");
include("../lib/function.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  // pre($_POST);
  // exit;

  if($_POST["operation"] == "Add") {    

    $updatedDate = date('Y-m-d H:i:s');
    $groupName = $_POST["groupName"];    

    $query = "INSERT INTO group_type (groupName,createdDate,createdBy) 
    VALUES ('$groupName','$updatedDate','$user_name')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $last_id = $conn->insert_id;
    $groupMenuAccess = '';
    $menuAccess = $_POST["groupMenuAccess"];
    foreach ($menuAccess as $key => $value) {
      $groupTypeAccess = '';
      $typeAccess = $_POST[$value];
      // if (is_array($typeAccess) || is_object($typeAccess)) {
        foreach ((array) $typeAccess as $key1 => $value1) {
          $groupTypeAccess .= $value1.',';
        }
      // }      
      $groupTypeAccess = rtrim($groupTypeAccess, ',');
      $query2 = "INSERT INTO group_access (groupID,groupMenuAccess,groupTypeAccess) VALUES ('$last_id','$value','$groupTypeAccess')";
      $result2 = $conn->query($query2) or die(mysqli_error($conn));
    }

    if(!empty($result)) {
      echo 'added';
    }
    
  }

  if($_POST["operation"] == "Update") {

    // pre($_POST);
    // exit;

    $id = $_POST["id"];
    $updatedDate = date('Y-m-d H:i:s');
    $groupName = $_POST["groupName"];

    $query = "UPDATE group_type 
    SET 
    groupName = '$groupName',
    updatedDate = '$updatedDate',
    updatedBy = '$user_name'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $groupMenuAccess = '';
    $menuAccess = $_POST["groupMenuAccess"];
    $result3 = $conn->query("DELETE FROM group_access WHERE groupID = '".$id."'") or die(mysqli_error($conn));
    foreach ($menuAccess as $key => $value) {
      $groupTypeAccess = '';
      $typeAccess = $_POST[$value];
      foreach ((array) $typeAccess as $key1 => $value1) {
        $groupTypeAccess .= $value1.',';
      }    
      $groupTypeAccess = rtrim($groupTypeAccess, ',');      
      $query2 = "INSERT INTO group_access (groupID,groupMenuAccess,groupTypeAccess) VALUES ('$id','$value','$groupTypeAccess')";
      $result2 = $conn->query($query2) or die(mysqli_error($conn));
    }

    if(!empty($result)) {
      echo 'updated';
    }

  }
  $conn->close();
}

?>