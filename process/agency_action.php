<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

function upload_image()
{
 if(isset($_FILES["agency_image"]))
 {
  $extension = explode('.', $_FILES['agency_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/agency/' . $new_name;
  move_uploaded_file($_FILES['agency_image']['tmp_name'], $destination);
  return $new_name;
 }
}

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $image = '';
    if($_FILES["agency_image"]["name"] != '')    {
      $image = upload_image();
    }
    $agency_name = $_POST["agency_name"];
    $agency_address1 = $_POST["agency_address1"];
    $agency_address2 = $_POST["agency_address2"];
    $agency_postcode = $_POST["agency_postcode"];
    $agency_city = $_POST["agency_city"];
    $agency_state = $_POST["agency_state"];
    $agency_country = $_POST["agency_country"];
    $agency_contactNo = $_POST["agency_contactNo"];
    $agency_email = $_POST["agency_email"];
    $agency_regNo = $_POST["agency_regNo"];
    $agency_status = $_POST["agency_status"];
    $agency_LKUNo = $_POST["agency_LKUNo"];
    $agency_LKUExpiryDate = $_POST["agency_LKUExpiryDate"];
    $agency_info = $_POST["agency_info"];
    $agency_rating = $_POST["agency_rating"];
    $agency_contactPerson = $_POST["agency_contactPerson"];
    $agency_contactPersonNo = $_POST["agency_contactPersonNo"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO agency 
    (agency_name,agency_address1,agency_address2,agency_postcode,agency_city,agency_state,agency_country,
    agency_contactNo,agency_email,agency_regNo,agency_status,agency_LKUNo,agency_LKUExpiryDate,agency_info,
    agency_rating,agency_contactPerson,agency_contactPersonNo,agency_image,createdBy,createdDate) 
    VALUES 
    ('$agency_name','$agency_address1','$agency_address2','$agency_postcode','$agency_city','$agency_state','$agency_country',
    '$agency_contactNo','$agency_email','$agency_regNo','$agency_status','$agency_LKUNo','$agency_LKUExpiryDate','$agency_info',
    '$agency_rating','$agency_contactPerson','$agency_contactPersonNo','$image','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    // var_dump($_POST);

    $id = $_POST["id"];
    $agency_name = $_POST["agency_name"];
    $agency_address1 = $_POST["agency_address1"];
    $agency_address2 = $_POST["agency_address2"];
    $agency_postcode = $_POST["agency_postcode"];
    $agency_city = $_POST["agency_city"];
    $agency_state = (isset($_POST["agency_state"])) ? $_POST["agency_state"] : NULL;
    $agency_country = (isset($_POST["agency_country"])) ? $_POST["agency_country"] : NULL;
    $agency_contactNo = $_POST["agency_contactNo"];
    $agency_email = $_POST["agency_email"];
    $agency_regNo = $_POST["agency_regNo"];
    $agency_status = $_POST["agency_status"];
    $agency_LKUNo = $_POST["agency_LKUNo"];
    $agency_LKUExpiryDate = $_POST["agency_LKUExpiryDate"];
    $agency_info = $_POST["agency_info"];
    $agency_rating = (isset($_POST["agency_rating"])) ? $_POST["agency_rating"] : NULL;
    $agency_contactPerson = $_POST["agency_contactPerson"];
    $agency_contactPersonNo = $_POST["agency_contactPersonNo"];
    $updatedDate = date('Y-m-d H:i:s');
    $image = '';
    if($_FILES["agency_image"]["name"] != '')    {
      $image = upload_image();
    }
    else    {
      $image = $_POST["hidden_agency_image"];
    }

    $query = "UPDATE agency 
    SET 
    agency_name = '$agency_name',
    agency_address1 = '$agency_address1',
    agency_address2 = '$agency_address2',
    agency_postcode = '$agency_postcode',
    agency_city = '$agency_city',
    agency_state = '$agency_state',
    agency_country = '$agency_country',
    agency_contactNo = '$agency_contactNo',
    agency_email = '$agency_email',
    agency_regNo = '$agency_regNo',
    agency_status = '$agency_status',
    agency_LKUNo = '$agency_LKUNo',
    agency_LKUExpiryDate = '$agency_LKUExpiryDate',
    agency_info = '$agency_info',
    agency_rating = '$agency_rating',
    agency_contactPerson = '$agency_contactPerson',
    agency_contactPersonNo = '$agency_contactPersonNo',
    agency_image = '$image',
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