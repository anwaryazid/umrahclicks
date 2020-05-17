<?php

include("../lib/conn.php");
include("../lib/function.php");
require("../lib/SqlFormatter.php");
$query = '';
$output = array();

$query .= "SELECT
group_type.*,
GROUP_CONCAT(group_access.groupMenuAccess ORDER BY group_access.groupMenuAccess SEPARATOR ',') AS groupMenuAccess
FROM group_type
LEFT JOIN group_access ON group_access.groupID = group_type.id ";
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE groupName LIKE "%'.$_POST["search"]["value"].'%" ';
}
$query .= " GROUP BY group_type.id ";
if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else {
 $query .= 'ORDER BY id ASC ';
}
if($_POST["length"] != -1) {
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

// echo SqlFormatter::format($query);
// exit;

$result = $conn->query($query) or die(mysqli_error($conn));
$data = array();
$filtered_rows = mysqli_num_rows($result);

$i = 1;

foreach($result as $row)
{
  $groupAccess = '';
  $access = explode (",", $row["groupMenuAccess"]);
  foreach ($access as $key => $value) {
    $acc = $conn->query("SELECT menuName FROM menu WHERE mid = '$value' ") or die(mysqli_error($conn));
    foreach($acc as $rows) {
      $groupAccess .= $rows['menuName'].', ';
    }
  }
  
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["groupName"];
  $sub_array[] = rtrim($groupAccess, ', ');
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete '.$_POST['delete'].'" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('group_type'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>