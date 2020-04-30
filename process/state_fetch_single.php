<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM ref_state WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["stateKod"] = $row["kod"];
  $output["stateName"] = $row["keterangan"];
  $output["stateAbbr"] = $row["abb_negeri"];
  $output["stateCountry"] = $row["country_id"];
 }
 echo json_encode($output);
}

?>