<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT *
FROM promo
WHERE 
promo_status = '1'
AND CURDATE() >= promo_dateFrom AND CURDATE() <= promo_dateTo
ORDER BY promo_dateTo ASC ";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  if ($row["promo_variable"] == 1) {
    $amount = number_format($row["promo_variableAmount"]).'%';
  } else {
    $amount = 'RM'.$row["promo_variableAmount"];
  }
  $sub_array = array();
  $sub_array[] = $row["promo_code"];
  $sub_array[] = $row["promo_desc"];
  $sub_array[] = $row["promo_dateTo"];
  $sub_array[] = $amount;
  $data[] = $sub_array;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('promo'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>