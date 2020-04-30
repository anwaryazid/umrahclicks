<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT
DATEDIFF(CURDATE(),follow_up.confirm_date) AS outstanding_date,
follow_up.agency_id,
agency.agency_name,
ref_country.keterangan AS country,
COUNT( * ) AS qty 
FROM
follow_up
LEFT JOIN agency ON agency.id = follow_up.agency_id
LEFT JOIN ref_country ON ref_country.id = agency.agency_country 
WHERE
fp_status = '0' 
GROUP BY
agency_id 
ORDER BY
qty DESC ";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  if ($row["outstanding_date"] > 1) {
    $color = 'text-danger';
  } else {
    $color = '';
  }
  $sub_array = array();
  $sub_array[] = $row["agency_id"];
  $sub_array[] = "<span class='".$color."'>".$row["agency_name"]."</span>";
  $sub_array[] = "<span class='".$color."'>".$row["country"]."</span>";
  $sub_array[] = "<span class='".$color."'>".$row["qty"]."</span>";
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