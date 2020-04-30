<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT * FROM advertisement';
if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE ad_companyName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR ad_website LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR ad_contactPerson LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'ORDER BY id ASC ';
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
  if($row["ad_status"] == 1) { 
    $ad_status = '<span class="badge badge-info" style="display: block;">Active</span>';
  } else {
    $ad_status = '<span class="badge badge-secondary" style="display: block;">Inactive</span>';
  }
  
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["ad_companyRegNo"];
  $sub_array[] = $row["ad_companyName"];
  $sub_array[] = $row["ad_dateFrom"];
  $sub_array[] = $row["ad_dateTo"];
  $sub_array[] = $row["ad_remark"];
  $sub_array[] = $ad_status;
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('advertisement'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>