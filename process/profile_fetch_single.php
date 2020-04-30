<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT * FROM user WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["userFullName"] = $row["userFullName"];
  $output["userStatus"] = $row["userStatus"];
  $output["userName"] = $row["userName"];
  $output["userEmail"] = $row["userEmail"];
  $output["userStatus"] = $row["userStatus"];
  $output["userType"] = $row["userType"];
  $output["userAccess"] = $row["userAccess"];
 }
 $conn->close();
 echo json_encode($output);
}

?>