<?php

require("conn.php");

if (isset($_POST['addCountry'])) {
  $countryKod = $_POST['countryKod'];
  $countryName = $_POST['countryName'];
  $currencyKod = $_POST['currencyKod'];
  $currencyName = $_POST['currencyName'];

  $query = "INSERT INTO ref_country (kod,keterangan,currency_code,currency_name) VALUES ('$countryKod','$countryName','$currencyKod','$currencyName')";

  // $query_run = mysqli_query($conn,$query);

  $result = $conn->query($query) or die(mysqli_error($conn));

  if ($result) {
    header('Location:../index.php?page=ref-country&process=1&result=1');
  } else {
    header('Location:../index.php?page=ref-country&process=1&result=2');
  }
}

?>