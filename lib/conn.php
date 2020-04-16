<?php

$username = "umrahcli_ucmy";
$password = "7YCMmC6hry6qjEes";
$host = "umrahclicks.com";
$dbname = "umrahcli_umrahclicks";

// $username = "root";
// $password = "";
// $host = "localhost";
// $dbname = "umrahclicks";

$conn = NEW mysqli($host,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>