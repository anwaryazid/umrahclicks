<?php

function get_image_name($user_id)
{
 include('db.php');
 $statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records($table)
{
  include("conn.php");
  $result = $conn->query('SELECT * FROM '.$table.'');
  return mysqli_num_rows($result);
}

?>