<?php

include("../lib/conn.php");

function upload_image()
{
 if(isset($_FILES["countryImg"]))
 {
  $extension = explode('.', $_FILES['countryImg']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/flag/' . $new_name;
  move_uploaded_file($_FILES['countryImg']['tmp_name'], $destination);
  return $new_name;
 }
}

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $image = '';
    if($_FILES["countryImg"]["name"] != '')    {
      $image = upload_image();
    }
    $countryKod = $_POST["countryKod"];
    $countryName = $_POST["countryName"];
    $currencyKod = $_POST["currencyKod"];
    $currencyName = $_POST["currencyName"];
    $currencySymbol = $_POST["currencySymbol"];

    $query = "INSERT INTO ref_country (kod,keterangan,currency_code,currency_name,countryImage,currency_symbol) 
    VALUES ('$countryKod','$countryName','$currencyKod','$currencyName','$image','$currencySymbol')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $countryKod = $_POST["countryKod"];
    $countryName = $_POST["countryName"];
    $currencyKod = $_POST["currencyKod"];
    $currencyName = $_POST["currencyName"];
    $currencySymbol = $_POST["currencySymbol"];
    $image = '';
    if($_FILES["countryImg"]["name"] != '')    {
      $image = upload_image();
    }
    else    {
      $image = $_POST["hidden_countryImg"];
    }

    $query = "UPDATE ref_country 
    SET 
    kod = '$countryKod',
    keterangan = '$countryName',
    currency_code = '$currencyKod',
    currency_name = '$currencyName',
    currency_symbol = '$currencySymbol',
    countryImage = '$image'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'updated';
    }
  }
}

?>