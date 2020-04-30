<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT * FROM package_room ';
if(isset($_GET['id'])) {
 $query .= 'WHERE package_id = "'.$_GET['id'].'"';
}
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

foreach($result as $row)
{
  // $image = '';
  // if($row["room_img"] != '')  {
  //   $image = '<img src="upload/room/'.$row["room_img"].'" class="img-thumbnail border-0" width="130" />';
  // }
  // else  {
  //   $image = '';
  // }
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["room_type"];
  // $sub_array[] = $image;
  $sub_array[] = $row["room_actualCost"];
  $sub_array[] = $row["room_umrahCost"];
  $sub_array[] = '<button class="btn btn-outline-danger btn-xs delete-room" name="delete-room" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';  
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('package_room'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>