<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM agency WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["agency_regNo"] = $row["agency_regNo"];
  $output["agency_name"] = $row["agency_name"];
  $output["agency_address1"] = $row["agency_address1"];
  $output["agency_address2"] = $row["agency_address2"];
  $output["agency_postcode"] = $row["agency_postcode"];
  $output["agency_city"] = $row["agency_city"];
  $output["agency_state"] = $row["agency_state"];
  $output["agency_country"] = $row["agency_country"];
  $output["agency_contactNo"] = $row["agency_contactNo"];
  $output["agency_email"] = $row["agency_email"];
  $output["agency_status"] = $row["agency_status"];
  $output["agency_LKUNo"] = $row["agency_LKUNo"];
  $output["agency_LKUExpiryDate"] = $row["agency_LKUExpiryDate"];
  $output["agency_rating"] = $row["agency_rating"];
  $output["agency_contactPerson"] = $row["agency_contactPerson"];
  $output["agency_contactPersonNo"] = $row["agency_contactPersonNo"];
  $output["agency_info"] = $row["agency_info"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
  if($row["agency_image"] != '')
  {
   $output['agency_image'] = '<img src="upload/agency/'.$row["agency_image"].'" class="" style="max-height: 120px;" /><hr>';
   $output['agency_image_input'] = '<input type="hidden" name="hidden_agency_image" value="'.$row["agency_image"].'" />';
  }
  else
  {
   $output['agency_image'] = '';
   $output['agency_image_input'] = '<input type="hidden" name="hidden_agency_image" value="" />';
  }
 }
 echo json_encode($output);
}

?>