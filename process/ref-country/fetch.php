<?php

include("../../lib/conn.php");
$query = '';
$output = array();

function get_total_all_records() {
  include("../../lib/conn.php");
  $result = $conn->query('SELECT * FROM ref_country');
  return mysqli_num_rows($result);
}

$query .= 'SELECT kod, keterangan, currency_code, currency_name, id FROM ref_country ';
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE kod LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'ORDER BY keterangan ASC ';
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
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["kod"];
  $sub_array[] = $row["keterangan"];
  $sub_array[] = $row["currency_code"];
  $sub_array[] = $row["currency_name"];
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>&nbsp;
  <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  $filtered_rows,
  "recordsTotal" => get_total_all_records(),
  "data"    => $data
 );

 echo json_encode($output);

?>