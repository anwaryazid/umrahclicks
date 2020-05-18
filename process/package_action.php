<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

function upload_image($name)
{
 if(isset($_FILES[$name]))
 {
  $extension = explode('.', $_FILES[$name]['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/package/' . $new_name;
  move_uploaded_file($_FILES[$name]['tmp_name'], $destination);
  return $new_name;
 }
}

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $package_thumbnail = '';
    if($_FILES["package_thumbnail"]["name"] != '')    {
      $package_thumbnail = upload_image('package_thumbnail');
    }
    /* $makkah_hotelImg = '';
    if($_FILES["makkah_hotelImg"]["name"] != '')    {
      $makkah_hotelImg = upload_image('makkah_hotelImg');
    }
    $madinah_hotelImg = '';
    if($_FILES["madinah_hotelImg"]["name"] != '')    {
      $madinah_hotelImg = upload_image('madinah_hotelImg');
    } */
    $agency_id = $_POST["agency_id"];
    $package_name = $_POST["package_name"];
    $package_status = $_POST["package_status"];
    $package_remark = $_POST["package_remark"];
    $package_dateFrom = $_POST["package_dateFrom"];
    $package_dateTo = $_POST["package_dateTo"];
    $package_pax = $_POST["package_pax"];
    $package_promo = $_POST["package_promo"];
    $package_flight_id = $_POST["package_flight_id"];
    $package_meal_id = $_POST["package_meal_id"];
    $package_mutawwif = $_POST["package_mutawwif"];
    $package_1stDestination = $_POST["package_1stDestination"];
    $package_ziarah = $_POST["package_ziarah"];
    $makkah_hotel = $_POST["makkah_hotel"];
    $makkah_distance = $_POST["makkah_distance"];
    $makkah_days = $_POST["makkah_days"];
    $makkah_night = $_POST["makkah_night"];
    $madinah_hotel = $_POST["madinah_hotel"];
    $madinah_distance = $_POST["madinah_distance"];
    $madinah_days = $_POST["madinah_days"];
    $madinah_night = $_POST["madinah_night"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO package 
    (agency_id,package_name,package_status,package_remark,package_dateFrom,package_dateTo,package_pax,package_promo,
    package_flight_id,package_meal_id,package_mutawwif,package_1stDestination,package_ziarah,makkah_hotel,makkah_distance,
    makkah_days,makkah_night,madinah_hotel,madinah_distance,madinah_days,madinah_night,
    package_thumbnail,createdBy,createdDate) 
    VALUES 
    ('$agency_id','$package_name','$package_status','$package_remark','$package_dateFrom','$package_dateTo','$package_pax','$package_promo',
    '$package_flight_id','$package_meal_id','$package_mutawwif','$package_1stDestination','$package_ziarah','$makkah_hotel','$makkah_distance',
    '$makkah_days','$makkah_night','$madinah_hotel','$madinah_distance','$madinah_days','$madinah_night',
    '$package_thumbnail','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));
    $last_id = $conn->insert_id;

    if(!empty($result)) {
      echo 'added-'.$last_id;
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $agency_id = $_POST["agency_id"];
    $package_name = $_POST["package_name"];
    $package_status = $_POST["package_status"];
    $package_remark = $_POST["package_remark"];
    $package_dateFrom = $_POST["package_dateFrom"];
    $package_dateTo = $_POST["package_dateTo"];
    $package_pax = $_POST["package_pax"];
    $package_promo = $_POST["package_promo"];
    $package_flight_id = $_POST["package_flight_id"];
    $package_meal_id = $_POST["package_meal_id"];
    $package_mutawwif = $_POST["package_mutawwif"];
    $package_1stDestination = $_POST["package_1stDestination"];
    $package_ziarah = $_POST["package_ziarah"];
    $makkah_hotel = $_POST["makkah_hotel"];
    $makkah_distance = $_POST["makkah_distance"];
    $makkah_days = $_POST["makkah_days"];
    $makkah_night = $_POST["makkah_night"];
    $madinah_hotel = $_POST["madinah_hotel"];
    $madinah_distance = $_POST["madinah_distance"];
    $madinah_days = $_POST["madinah_days"];
    $madinah_night = $_POST["madinah_night"];
    $updatedDate = date('Y-m-d H:i:s');
    $package_thumbnail = '';
    if($_FILES["package_thumbnail"]["name"] != '')    {
      $package_thumbnail = upload_image('package_thumbnail');
    } else    {
      $package_thumbnail = $_POST["hidden_package_thumbnail"];
    }
    /* $makkah_hotelImg = '';
    if($_FILES["makkah_hotelImg"]["name"] != '')    {
      $makkah_hotelImg = upload_image('makkah_hotelImg');
    } else    {
      $makkah_hotelImg = $_POST["hidden_makkah_hotelImg"];
    }
    $madinah_hotelImg = '';
    if($_FILES["madinah_hotelImg"]["name"] != '')    {
      $madinah_hotelImg = upload_image('madinah_hotelImg');
    } else    {
      $madinah_hotelImg = $_POST["hidden_madinah_hotelImg"];
    } */

    $query = "UPDATE package 
    SET 
    agency_id = '$agency_id',
    package_name = '$package_name',
    package_status = '$package_status',
    package_remark = '$package_remark',
    package_dateFrom = '$package_dateFrom',
    package_dateTo = '$package_dateTo',
    package_pax = '$package_pax',
    package_promo = '$package_promo',
    package_flight_id = '$package_flight_id',
    package_meal_id = '$package_meal_id',
    package_mutawwif = '$package_mutawwif',
    package_1stDestination = '$package_1stDestination',
    package_ziarah = '$package_ziarah',
    makkah_hotel = '$makkah_hotel',
    makkah_distance = '$makkah_distance',
    makkah_days = '$makkah_days',
    makkah_night = '$makkah_night',
    madinah_hotel = '$madinah_hotel',
    madinah_distance = '$madinah_distance',
    madinah_days = '$madinah_days',
    madinah_night = '$madinah_night',
    package_thumbnail = '$package_thumbnail',
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