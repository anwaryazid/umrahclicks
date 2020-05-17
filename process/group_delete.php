<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 
  $result = $conn->query("DELETE FROM group_type WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  $result2 = $conn->query("DELETE FROM group_access WHERE groupID = '".$_POST["id"]."'") or die(mysqli_error($conn));

  if(!empty($result))  {
    echo 'deleted';
  }
}

?>