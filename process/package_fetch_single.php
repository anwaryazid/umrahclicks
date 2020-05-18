<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM package WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["agency_id"] = $row["agency_id"];
  $output["package_name"] = $row["package_name"];
  $output["package_status"] = $row["package_status"];
  $output["package_remark"] = $row["package_remark"];
  $output["package_dateFrom"] = $row["package_dateFrom"];
  $output["package_dateTo"] = $row["package_dateTo"];
  $output["package_pax"] = $row["package_pax"];
  $output["package_promo"] = $row["package_promo"];
  $output["package_flight_id"] = $row["package_flight_id"];
  $output["package_meal_id"] = $row["package_meal_id"];
  $output["package_mutawwif"] = $row["package_mutawwif"];
  $output["package_1stDestination"] = $row["package_1stDestination"];
  $output["package_ziarah"] = $row["package_ziarah"];
  $output["makkah_hotel"] = $row["makkah_hotel"];
  $output["makkah_distance"] = $row["makkah_distance"];
  $output["makkah_days"] = $row["makkah_days"];
  $output["makkah_night"] = $row["makkah_night"];
  $output["madinah_hotel"] = $row["madinah_hotel"];
  $output["madinah_distance"] = $row["madinah_distance"];
  $output["madinah_days"] = $row["madinah_days"];
  $output["madinah_night"] = $row["madinah_night"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
  if($row["package_thumbnail"] != '')  {
   $output['package_thumbnail'] = '<img src="upload/package/'.$row["package_thumbnail"].'" class="" style="max-height: 85px;" />';
   $output['package_thumbnail_input'] = '<input type="hidden" name="hidden_package_thumbnail" id="hidden_package_thumbnail" value="'.$row["package_thumbnail"].'" />';
  }  else  {
   $output['package_thumbnail'] = '';
   $output['package_thumbnail_input'] = '<input type="hidden" name="hidden_package_thumbnail" id="hidden_package_thumbnail" value="" />';
  }
 }
 echo json_encode($output);
}

?>