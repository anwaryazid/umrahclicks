<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT * FROM ref_country ';
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE kod LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
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

$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

foreach($result as $row)
{
  $image = '';
  if($row["countryImage"] != '')  {
    $image = '<img src="upload/flag/'.$row["countryImage"].'" class="img-thumbnail border-0" width="32" height="32" />';
  }
  else  {
    $image = '';
  }
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["kod"];
  $sub_array[] = $image."&nbsp;&nbsp;".$row["keterangan"];
  $sub_array[] = $row["currency_code"]." (".$row["currency_symbol"].")";
  $sub_array[] = $row["currency_name"];
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('ref_country'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>