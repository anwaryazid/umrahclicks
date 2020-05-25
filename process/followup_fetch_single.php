<?php

include("../lib/conn.php");
require("../lib/SqlFormatter.php");

if(isset($_POST["id"])) {
  $output = array();
  $query .= "SELECT 
  a.*,
  b.guest_name,
  b.guest_no,
  b.guest_email,
  b.guest_pax,
  c.agency_name,
  d.package_name
  FROM follow_up a
  LEFT JOIN guest_transaction b ON b.id = a.guest_id
  LEFT JOIN agency c ON c.id = b.agency_id
  LEFT JOIN package d ON d.id = b.package_id
  WHERE a.id = '".$_POST["id"]."' LIMIT 1";
  $result = $conn->query($query) or die(mysqli_error($conn));

  // echo SqlFormatter::format($query);

  foreach($result as $row)
  {
    $output["guest_name"] = $row["guest_name"];
    $output["guest_email"] = $row["guest_email"];
    $output["guest_phoneNo"] = $row["guest_no"];
    $output["agency_name"] = $row["agency_name"];
    $output["package_name"] = $row["package_name"];
    $output["pax"] = $row["guest_pax"];
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