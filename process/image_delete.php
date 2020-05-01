<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $hotel = $conn->query("SELECT * FROM package_image WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($hotel as $row) {
    $image = $row['hotel_img'];
    unlink('../upload/hotel/'.$image);
  }
 
  $result = $conn->query("DELETE FROM package_image WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
    echo 'deleted';
  }
}

?>