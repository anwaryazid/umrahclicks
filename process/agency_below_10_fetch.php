<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT
agency.*,
ref_country.keterangan AS country
FROM
agency
LEFT JOIN ref_country ON ref_country.id = agency.agency_country";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  $sub_array = array();
  $sub_array[] = $row["country"];
  $sub_array[] = $row["agency_name"];
  $sub_array[] = '0';
  $sub_array[] = $row["agency_rating"];
  $data[] = $sub_array;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('agency'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>