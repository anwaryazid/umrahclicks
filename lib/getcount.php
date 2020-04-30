<?php

include("conn.php");

$result = $conn->query("SELECT COUNT(*) AS count FROM ".$_GET['t']."") or die(mysqli_error($conn));

while($row = mysqli_fetch_array($result)) {
  $count = $row['count'];
}

echo $count;

?>