<?php

include("../../lib/conn.php");

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $countryKod = $_POST["countryKod"];
    $countryName = $_POST["countryName"];
    $currencyKod = $_POST["currencyKod"];
    $currencyName = $_POST["currencyName"];

    $query = "INSERT INTO ref_country (kod,keterangan,currency_code,currency_name) 
    VALUES ('$countryKod','$countryName','$currencyKod','$currencyName')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'Data Inserted';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $countryKod = $_POST["countryKod"];
    $countryName = $_POST["countryName"];
    $currencyKod = $_POST["currencyKod"];
    $currencyName = $_POST["currencyName"];

    $query = "UPDATE ref_country 
    SET 
    kod = '$countryKod',
    keterangan = '$countryName',
    currency_code = '$currencyKod',
    currency_name = '$currencyName'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'Data Updated';
    }
  }
}

?>