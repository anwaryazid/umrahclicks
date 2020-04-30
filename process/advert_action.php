<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

function upload_image()
{
 if(isset($_FILES["ad_image"]))
 {
  $extension = explode('.', $_FILES['ad_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/advertisement/' . $new_name;
  move_uploaded_file($_FILES['ad_image']['tmp_name'], $destination);
  return $new_name;
 }
}

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $image = '';
    if($_FILES["ad_image"]["name"] != '')    {
      $image = upload_image();
    }
    $ad_companyRegNo = $_POST["ad_companyRegNo"];
    $ad_companyName = $_POST["ad_companyName"];
    $ad_companyTelNo = $_POST["ad_companyTelNo"];
    $ad_companyEmail = $_POST["ad_companyEmail"];
    $ad_contactPerson = $_POST["ad_contactPerson"];
    $ad_contactPersonNo = $_POST["ad_contactPersonNo"];
    $ad_website = $_POST["ad_website"];
    $ad_operator = $user_name;
    $ad_companyStatus = $_POST["ad_companyStatus"];
    $ad_status = $_POST["ad_status"];
    $ad_remark = $_POST["ad_remark"];
    $ad_dateFrom = $_POST["ad_dateFrom"];
    $ad_dateTo = $_POST["ad_dateTo"];
    $ad_price = $_POST["ad_price"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO advertisement 
    (ad_companyRegNo,ad_companyName,ad_companyTelNo,ad_companyEmail,ad_contactPerson,ad_contactPersonNo,ad_website,
    ad_operator,ad_companyStatus,ad_status,ad_remark,ad_dateFrom,ad_dateTo,ad_price,
    ad_image,createdBy,createdDate) 
    VALUES 
    ('$ad_companyRegNo','$ad_companyName','$ad_companyTelNo','$ad_companyEmail','$ad_contactPerson','$ad_contactPersonNo','$ad_website',
    '$ad_operator','$ad_companyStatus','$ad_status','$ad_remark','$ad_dateFrom','$ad_dateTo','$ad_price',
    '$image','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $ad_companyRegNo = $_POST["ad_companyRegNo"];
    $ad_companyName = $_POST["ad_companyName"];
    $ad_companyTelNo = $_POST["ad_companyTelNo"];
    $ad_companyEmail = $_POST["ad_companyEmail"];
    $ad_contactPerson = $_POST["ad_contactPerson"];
    $ad_contactPersonNo = (isset($_POST["ad_contactPersonNo"])) ? $_POST["ad_contactPersonNo"] : NULL;
    $ad_website = (isset($_POST["ad_website"])) ? $_POST["ad_website"] : NULL;
    $ad_operator = $user_name;
    $ad_companyStatus = $_POST["ad_companyStatus"];
    $ad_status = $_POST["ad_status"];
    $ad_remark = $_POST["ad_remark"];
    $ad_dateFrom = $_POST["ad_dateFrom"];
    $ad_dateTo = $_POST["ad_dateTo"];
    $ad_price = $_POST["ad_price"];
    $updatedDate = date('Y-m-d H:i:s');
    $image = '';
    if($_FILES["ad_image"]["name"] != '')    {
      $image = upload_image();
    }
    else    {
      $image = $_POST["hidden_ad_image"];
    }

    $query = "UPDATE advertisement 
    SET 
    ad_companyRegNo = '$ad_companyRegNo',
    ad_companyName = '$ad_companyName',
    ad_companyTelNo = '$ad_companyTelNo',
    ad_companyEmail = '$ad_companyEmail',
    ad_contactPerson = '$ad_contactPerson',
    ad_contactPersonNo = '$ad_contactPersonNo',
    ad_website = '$ad_website',
    ad_operator = '$ad_operator',
    ad_companyStatus = '$ad_companyStatus',
    ad_status = '$ad_status',
    ad_remark = '$ad_remark',
    ad_dateFrom = '$ad_dateFrom',
    ad_dateTo = '$ad_dateTo',
    ad_price = '$ad_price',
    ad_image = '$image',
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