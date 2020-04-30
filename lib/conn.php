<?php

$username = "umrahcli_ucmy";
$password = "7YCMmC6hry6qjEes";
$host = "umrahclicks.com";
$dbname = "umrahcli_umrahclicks";

date_default_timezone_set("Asia/Kuala_Lumpur");

// $username = "root";
// $password = "";
// $host = "localhost";
// $dbname = "umrahclicks";

$conn = NEW mysqli($host,$username,$password,$dbname) or die(mysqli_error($conn));

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>