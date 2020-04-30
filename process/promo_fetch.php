<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT a.*, b.desc AS dpromo_from, c.desc AS dpromo_variable, d.agency_name AS agency_name
FROM promo a
LEFT JOIN ref_promo_from b ON b.id = a.promo_from
LEFT JOIN ref_promo_variable c ON c.id = a.promo_variable
LEFT JOIN agency d  ON d.id = a.promo_agency';
if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE promo_code LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR promo_desc LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR agency_name LIKE "%'.$_POST["search"]["value"].'%" ';
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
  if($row["promo_status"] == 1) { 
    $promo_status = '<span class="badge badge-info" style="display: block;">Active</span>';
  } else {
    $promo_status = '<span class="badge badge-secondary" style="display: block;">Inactive</span>';
  }
  
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["promo_code"];
  $sub_array[] = $row["promo_desc"];
  $sub_array[] = $row["promo_dateFrom"];
  $sub_array[] = $row["promo_dateTo"];
  $sub_array[] = $row["dpromo_from"];
  $sub_array[] = $row["agency_name"];
  $sub_array[] = $promo_status;
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('promo'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>