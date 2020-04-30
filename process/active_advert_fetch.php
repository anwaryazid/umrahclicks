<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= "SELECT * FROM advertisement
WHERE 
ad_status = '1' AND ad_companyStatus = '1'
AND CURDATE() >= ad_dateFrom AND CURDATE() <= ad_dateTo
ORDER BY ad_dateTo ASC ";
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

foreach($result as $row)
{
  $sub_array = array();
  $sub_array[] = $row["ad_companyName"];
  $sub_array[] = $row["ad_dateTo"];
  $sub_array[] = $row["ad_remark"];
  $sub_array[] = 'RM'.$row["ad_price"];
  $data[] = $sub_array;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('advertisement'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>