<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM ref_country WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["countryKod"] = $row["kod"];
  $output["countryName"] = $row["keterangan"];
  $output["currencyKod"] = $row["currency_code"];
  $output["currencyName"] = $row["currency_name"];
  $output["currencySymbol"] = $row["currency_symbol"];
  if($row["countryImage"] != '')
  {
   $output['countryImg'] = '<img src="upload/flag/'.$row["countryImage"].'" class="img-thumbnail" width="32" height="32" />&nbsp;<small>'.$row["countryImage"].'</small><input type="hidden" name="hidden_countryImg" value="'.$row["countryImage"].'" />';
  }
  else
  {
   $output['countryImg'] = '<input type="hidden" name="hidden_countryImg" value="" />';
  }
 }
 echo json_encode($output);
}

?>