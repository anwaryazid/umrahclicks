<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM advertisement WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["ad_companyRegNo"] = $row["ad_companyRegNo"];
  $output["ad_companyName"] = $row["ad_companyName"];
  $output["ad_companyTelNo"] = $row["ad_companyTelNo"];
  $output["ad_companyEmail"] = $row["ad_companyEmail"];
  $output["ad_contactPerson"] = $row["ad_contactPerson"];
  $output["ad_contactPersonNo"] = $row["ad_contactPersonNo"];
  $output["ad_website"] = $row["ad_website"];
  $output["ad_operator"] = $row["ad_operator"];
  $output["ad_companyStatus"] = $row["ad_companyStatus"];
  $output["ad_status"] = $row["ad_status"];
  $output["ad_remark"] = $row["ad_remark"];
  $output["ad_image"] = $row["ad_image"];
  $output["ad_dateFrom"] = $row["ad_dateFrom"];
  $output["ad_dateTo"] = $row["ad_dateTo"];
  $output["ad_price"] = $row["ad_price"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
  if($row["ad_image"] != '')
  {
   $output['ad_image'] = '<img src="upload/advertisement/'.$row["ad_image"].'" class="" style="max-height: 100px;" />';
   $output['ad_image_input'] = '<input type="hidden" name="hidden_ad_image" value="'.$row["ad_image"].'" />';
  }
  else
  {
   $output['ad_image'] = '';
   $output['ad_image_input'] = '<input type="hidden" name="hidden_ad_image" value="" />';
  }
 }
 echo json_encode($output);
}

?>