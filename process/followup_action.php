<?php

// var_dump($_POST);
// exit();

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $cust_callDate = $_POST["cust_callDate"];
    $cust_remarks = $_POST["cust_remarks"];
    $agency_callDate = $_POST["agency_callDate"];
    $agency_remarks = $_POST["agency_remarks"];
    $operator = $user_name;
    $updatedDate = date('Y-m-d H:i:s');
    $complete_date = '';
    $fp_status = '0';
    if (!empty($_POST['cust_callDate']) && !empty($_POST['agency_callDate'])) {
      $complete_date = date('Y-m-d H:i:s');;
      $fp_status = '1';
    }

    $query = "UPDATE follow_up
    SET 
    cust_callDate = '$cust_callDate',
    cust_remarks = '$cust_remarks',
    agency_callDate = '$agency_callDate',
    agency_remarks = '$agency_remarks',
    operator = '$operator',
    fp_status = '$fp_status',
    complete_date = '$complete_date',
    updatedDate = '$updatedDate',
    updatedBy = '$user_name'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'updated';
    }
  }
}

?>