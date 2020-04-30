<?php

include("../lib/conn.php");

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $stateKod = $_POST["stateKod"];
    $stateName = $_POST["stateName"];
    $stateAbbr = $_POST["stateAbbr"];
    $stateCountry = $_POST["stateCountry"];

    $query = "INSERT INTO ref_state (kod,keterangan,abb_negeri,country_id) 
    VALUES ('$stateKod','$stateName','$stateAbbr','$stateCountry')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

  if($_POST["operation"] == "Update") {

    $id = $_POST["id"];
    $stateKod = $_POST["stateKod"];
    $stateName = $_POST["stateName"];
    $stateAbbr = $_POST["stateAbbr"];
    $stateCountry = $_POST["stateCountry"];

    $query = "UPDATE ref_state 
    SET 
    kod = '$stateKod',
    keterangan = '$stateName',
    abb_negeri = '$stateAbbr',
    country_id = '$stateCountry'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'updated';
    }
  }
}

?>