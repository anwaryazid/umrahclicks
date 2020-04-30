<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT
DATEDIFF(CURDATE(),follow_up.confirm_date) AS outstanding_date,
follow_up.* 
FROM
follow_up 
WHERE
fp_status = '0' 
AND agency_id = '".$_GET['id']."' ";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  $sub_array = array();
  $sub_array[] = $row["guest_name"];
  $sub_array[] = $row["guest_phoneNo"];
  $sub_array[] = $row["guest_email"];
  $sub_array[] = $row["outstanding_date"];
  // $sub_array[] = $row["outstanding_date"];
  $data[] = $sub_array;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('follow_up'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>