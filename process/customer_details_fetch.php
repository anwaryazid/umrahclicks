<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT
DATEDIFF( CURDATE( ), a.confirm_date ) AS outstanding_date,
a.*,
b.guest_name,
b.guest_no,
b.guest_email,
b.guest_pax,
c.agency_name,
d.package_name
FROM
follow_up a
LEFT JOIN guest_transaction b ON b.id = a.guest_id
LEFT JOIN agency c ON c.id = b.agency_id
LEFT JOIN package d ON d.id = b.package_id
LEFT JOIN ref_country e ON e.id = c.agency_country 
WHERE
a.fp_status = '0' AND b.agency_id = '".$_GET['id']."' ";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  $sub_array = array();
  $sub_array[] = $row["guest_name"];
  $sub_array[] = $row["guest_no"];
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