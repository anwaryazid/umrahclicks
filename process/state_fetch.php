<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT ref_state.*,ref_country.keterangan AS country FROM ref_state LEFT JOIN ref_country ON ref_country.id = ref_state.country_id ';
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE ref_state.kod LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR ref_state.keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'ORDER BY ref_state.kod ASC ';
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
  $sub_array[] = $row["id"];
  $sub_array[] = $row["kod"];
  $sub_array[] = $row["keterangan"];
  $sub_array[] = $row["abb_negeri"];
  $sub_array[] = $row["country"];
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete '.$_POST['delete'].'" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';  
  $data[] = $sub_array;
  // $action = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  // <button class="btn btn-outline-danger btn-xs delete" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>'; 
  // $data[] = array( 
  //   "no"=>$i,
  //   "id"=>$row['id'],
  //   "kod"=>$row['kod'],
  //   "keterangan"=>$row['keterangan'],
  //   "abb_negeri"=>$row['abb_negeri'],
  //   "country"=>$row['country'],    
  //   "action"=>$action
  // );
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('ref_state'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>