<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT
DATEDIFF( CURDATE( ), a.confirm_date ) AS outstanding_date,
b.agency_id,
c.agency_name,
e.keterangan AS country,
COUNT( * ) AS qty 
FROM
follow_up a
LEFT JOIN guest_transaction b ON b.id = a.guest_id
LEFT JOIN agency c ON c.id = b.agency_id
LEFT JOIN package d ON d.id = b.package_id
LEFT JOIN ref_country e ON e.id = c.agency_country 
WHERE
a.fp_status = '0' 
GROUP BY
b.agency_id 
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