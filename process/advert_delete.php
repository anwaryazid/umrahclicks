<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $ads = $conn->query("SELECT * FROM advertisement WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($ads as $row) {
    $image = $row['ad_image'];
    unlink('../upload/advertisement/'.$image);
  }
 
  $result = $conn->query("DELETE FROM advertisement WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
    echo 'deleted';
  }
}

?>