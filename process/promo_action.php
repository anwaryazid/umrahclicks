<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $promo_from = $_POST["promo_from"];
    $promo_agency = (isset($_POST["promo_agency"])) ? $_POST["promo_agency"] : NULL;
    $promo_code = $_POST["promo_code"];
    $promo_desc = $_POST["promo_desc"];
    $promo_dateFrom = $_POST["promo_dateFrom"];
    $promo_dateTo = $_POST["promo_dateTo"];
    $promo_status = $_POST["promo_status"];
    $promo_pax = $_POST["promo_pax"];
    $promo_variable = $_POST["promo_variable"];
    $promo_variableAmount = $_POST["promo_variableAmount"];
    $promo_operator = $user_name;
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO promo 
    (promo_from,promo_agency,promo_code,promo_desc,promo_dateFrom,promo_dateTo,promo_status,
    promo_pax,promo_variable,promo_variableAmount,promo_operator,createdBy,createdDate) 
    VALUES 
    ('$promo_from','$promo_agency','$promo_code','$promo_desc','$promo_dateFrom','$promo_dateTo','$promo_status',
    '$promo_pax','$promo_variable','$promo_variableAmount','$promo_operator','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $promo_from = $_POST["promo_from"];
    $promo_agency = (isset($_POST["promo_agency"])) ? $_POST["promo_agency"] : NULL;
    $promo_code = $_POST["promo_code"];
    $promo_desc = $_POST["promo_desc"];
    $promo_dateFrom = $_POST["promo_dateFrom"];
    $promo_dateTo = $_POST["promo_dateTo"];
    $promo_status = $_POST["promo_status"];
    $promo_pax = $_POST["promo_pax"];
    $promo_variable = $_POST["promo_variable"];
    $promo_variableAmount = $_POST["promo_variableAmount"];
    $promo_operator = $user_name;
    $updatedDate = date('Y-m-d H:i:s');

    $query = "UPDATE promo 
    SET 
    promo_from = '$promo_from',
    promo_agency = '$promo_agency',
    promo_code = '$promo_code',
    promo_desc = '$promo_desc',
    promo_dateFrom = '$promo_dateFrom',
    promo_dateTo = '$promo_dateTo',
    promo_status = '$promo_status',
    promo_pax = '$promo_pax',
    promo_variable = '$promo_variable',
    promo_variableAmount = '$promo_variableAmount',
    promo_operator = '$promo_operator',
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