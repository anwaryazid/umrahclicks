<?php

include("../../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM ref_country WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["countryKod"] = $row["kod"];
  $output["countryName"] = $row["keterangan"];
  $output["currencyKod"] = $row["currency_code"];
  $output["currencyName"] = $row["currency_name"];
 }
 echo json_encode($output);
}

?>