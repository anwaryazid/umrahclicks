<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT a.*, b.agency_name AS agency_name, c.package_name AS package_name
 FROM follow_up a
 LEFT JOIN agency b ON b.id = a.agency_id
 LEFT JOIN package c ON c.id = a.package_id WHERE a.id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["guest_name"] = $row["guest_name"];
  $output["guest_email"] = $row["guest_email"];
  $output["guest_phoneNo"] = $row["guest_phoneNo"];
  $output["agency_name"] = $row["agency_name"];
  $output["package_name"] = $row["package_name"];
  $output["pax"] = $row["pax"];
  $output["confirm_date"] = $row["confirm_date"];
  $output["cust_callDate"] = $row["cust_callDate"];
  $output["cust_remarks"] = $row["cust_remarks"];
  $output["agency_callDate"] = $row["agency_callDate"];
  $output["agency_remarks"] = $row["agency_remarks"];
  $output["fp_status"] = $row["fp_status"];
  $output["operator"] = $row["operator"];
  $output["complete_date"] = $row["complete_date"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
 }
 echo json_encode($output);
}

?>