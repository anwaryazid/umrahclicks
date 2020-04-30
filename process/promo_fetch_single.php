<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM promo WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["promo_from"] = $row["promo_from"];
  $output["promo_agency"] = $row["promo_agency"];
  $output["promo_code"] = $row["promo_code"];
  $output["promo_desc"] = $row["promo_desc"];
  $output["promo_dateFrom"] = $row["promo_dateFrom"];
  $output["promo_dateTo"] = $row["promo_dateTo"];
  $output["promo_status"] = $row["promo_status"];
  $output["promo_pax"] = $row["promo_pax"];
  $output["promo_variable"] = $row["promo_variable"];
  $output["promo_variableAmount"] = $row["promo_variableAmount"];
  $output["promo_operator"] = $row["promo_operator"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
 }
 echo json_encode($output);
}

?>