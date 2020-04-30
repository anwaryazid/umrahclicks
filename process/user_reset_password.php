<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {

  $userPassword = password_hash('pass1234', PASSWORD_DEFAULT);
 
  $result = $conn->query("UPDATE user SET userPassword = '$userPassword' WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));

  if(!empty($result))  {
  echo 'reset';
  }
}

?>