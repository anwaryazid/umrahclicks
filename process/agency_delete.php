<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $agency = $conn->query("SELECT * FROM agency WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($agency as $row) {
    $image = $row['agency_image'];
    unlink('../upload/agency/'.$image);
  }
 
  $result = $conn->query("DELETE FROM agency WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
  echo 'deleted';
  }
}

?>