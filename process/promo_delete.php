<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 
  $result = $conn->query("DELETE FROM promo WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
    echo 'deleted';
  }
}

?>