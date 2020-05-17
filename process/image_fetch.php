<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT a.*, b.desc AS image_for
FROM package_image a
LEFT JOIN ref_image_for b ON b.id = a.img_for ';
if(isset($_GET['id'])) {
 $query .= 'WHERE package_id = "'.$_GET['id'].'"';
}
$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

if($_POST['create'] == 'd-none' && $_POST['update'] == 'd-none') {
  $del = "d-none";
}

foreach($result as $row)
{
  $hotel_img = '';
  if($row["hotel_img"] != '')  {
    $hotel_img = '<img src="upload/hotel/'.$row["hotel_img"].'" class="img-thumbnail border-0" width="130" />';
  }
  else  {
    $hotel_img = '';
  }
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $hotel_img;
  $sub_array[] = $row["img_title"];
  $sub_array[] = $row["image_for"];
  $sub_array[] = '<button class="btn btn-outline-danger btn-xs delete-image '.$del.'" name="delete-image" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';  
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('package_image'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>