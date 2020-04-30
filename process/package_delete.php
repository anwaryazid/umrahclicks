<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $packages = $conn->query("SELECT * FROM package WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($packages as $row) {
    $image = $row['package_thumbnail'];
    unlink('../upload/package/'.$image);
  }

  $hotel = $conn->query("SELECT * FROM package_image WHERE package_id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($hotel as $row) {
    $image = $row['hotel_img'];
    unlink('../upload/hotel/'.$image);
  }
 
  $result = $conn->query("DELETE FROM package WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
  echo 'deleted';
  }
}

?>