<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT
a.*,
b.agency_name AS agency_name,
c.`desc` AS package_flight,
d.`desc` AS package_meal 
FROM
package a
LEFT JOIN agency b ON b.id = a.agency_id
LEFT JOIN ref_package_flight c ON c.id = a.package_flight_id
LEFT JOIN ref_package_meal d ON d.id = a.package_meal_id
 ';
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE a.package_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR agency_name LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'GROUP BY a.id ORDER BY package_dateFrom DESC, package_status DESC ';
}
if($_POST["length"] != -1) {
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

foreach($result as $row)
{
  if($row["package_status"] == 1) { 
    $agency_status = '<span class="badge badge-info" style="display: block;">Open</span>';
  } else  {
    $agency_status = '<span class="badge badge-secondary" style="display: block;">Close</span>';
  } 
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["package_name"];
  $sub_array[] = $row["agency_name"];
  $sub_array[] = $row["package_dateFrom"];
  $sub_array[] = $row["package_dateTo"];
  $sub_array[] = $agency_status;
  $sub_array[] = '<button type="button" name="update" onclick="viewPackage('.$row["id"].')" class="btn btn-outline-success btn-xs"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';  
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('package'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>