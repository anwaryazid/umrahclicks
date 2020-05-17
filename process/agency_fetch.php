<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();
session_start();

$where = "";

if($_SESSION['userType'] == 4) {
  $where = "WHERE agency.id = '".$_SESSION['userAgency']."' ";
}

$query .= 'SELECT agency.*,ref_country.keterangan AS country FROM agency LEFT JOIN ref_country ON ref_country.id = agency.agency_country '.$where;
if(isset($_POST["search"]["value"])) {
  $query .= 'AND (agency.agency_name LIKE "%'.$_POST["search"]["value"].'%" ';
  $query .= 'OR agency.agency_regNo LIKE "%'.$_POST["search"]["value"].'%") ';  
}
if(isset($_POST["order"])) {
  $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
  $query .= 'ORDER BY agency.agency_name ASC ';
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
  if($row["agency_status"] == 1) { 
    $agency_status = '<span class="badge badge-info" style="display: block;">Active</span>';
  } else if($row["agency_status"] == 2)  {
    $agency_status = '<span class="badge badge-secondary" style="display: block;">Inactive</span>';
  } else if($row["agency_status"] == 3)  {
    $agency_status = '<span class="badge badge-warning" style="display: block;">Block</span>';
  } else if($row["agency_status"] == 4)  {
    $agency_status = '<span class="badge badge-danger" style="display: block;">Full</span>';
  }
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["agency_regNo"];
  $sub_array[] = $row["agency_name"];
  $sub_array[] = $row["agency_LKUNo"];
  $sub_array[] = $row["agency_LKUExpiryDate"];
  $sub_array[] = $agency_status;
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete '.$_POST['delete'].'" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';  
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('agency'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>