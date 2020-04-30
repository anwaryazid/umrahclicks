<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT user.*, ref_user_type.userType AS typeUser FROM user
 LEFT JOIN ref_user_type ON ref_user_type.id = user.userType WHERE user.id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["userFullName"] = $row["userFullName"];
  $output["userStatus"] = $row["userStatus"];
  $output["userName"] = $row["userName"];
  $output["userEmail"] = $row["userEmail"];
  $output["userPassword"] = $row["userPassword"];
  $output["selUserType"] = $row["userType"];
  $output["typeUser"] = $row["typeUser"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
  $userAccess = '';
  $access = explode (",", $row["userAccess"]);
  foreach ($access as $key => $value) {
    $acc = $conn->query("SELECT menuName FROM menu WHERE mid = '$value' ") or die(mysqli_error($conn));
    foreach($acc as $rows) {
      $userAccess .= $rows['menuName'].', ';
    }
  }
  $output["userAccess"] = rtrim($userAccess, ', ');
 }
 $conn->close();
 echo json_encode($output);
}

?>