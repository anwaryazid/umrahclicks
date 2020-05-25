<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT 
a.*,
b.guest_name,
b.guest_no,
b.guest_email,
b.guest_pax,
c.agency_name,
d.package_name
FROM follow_up a
LEFT JOIN guest_transaction b ON b.id = a.guest_id
LEFT JOIN agency c ON c.id = b.agency_id
LEFT JOIN package d ON d.id = b.package_id';
if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE guest_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= ' OR agency_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= ' OR package_name LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'ORDER BY fp_status ASC, confirm_date ASC ';
}
if($_POST["length"] != -1) {
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

// var_dump($query);

$result = $conn->query($query) or die(mysqli_error($conn));

$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

foreach($result as $row)
{
  if($row["fp_status"] == 1) { 
    $fp_status = '<span class="badge badge-info" style="display: block;">Complete</span>';
  } else {
    $fp_status = '<span class="badge badge-danger" style="display: block;">Not Complete</span>';
  }
  
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["guest_name"];
  $sub_array[] = $row["agency_name"];
  $sub_array[] = $row["package_name"];
  $sub_array[] = $row["confirm_date"];
  $sub_array[] = $fp_status;
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('follow_up'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>