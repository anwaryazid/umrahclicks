<?php

include("../lib/conn.php");
include("../lib/function.php");
$query = '';
$output = array();

$query .= 'SELECT
a.*,
ref_user_type.userType AS typeUser,
group_type.groupName AS groupUser 
FROM	`user` a
LEFT JOIN ref_user_type ON ref_user_type.id = a.userType
LEFT JOIN group_type ON group_type.id = a.groupType ';
if(isset($_POST["search"]["value"])) {
 $query .= 'WHERE userFullName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR userName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR userEmail LIKE "%'.$_POST["search"]["value"].'%" ';
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
  if($row["userStatus"] == 1) { 
    $userStatus = '<span class="badge badge-info" style="display: block;">Active</span>';
  } else {
    $userStatus = '<span class="badge badge-secondary" style="display: block;">Inactive</span>';
  }
  $userAccess = '';
  if ($row["userType"] == 3 || $row["userType"] == 4) {
    $access = explode (",", $row["userAccess"]);
    foreach ($access as $key => $value) {
      $acc = $conn->query("SELECT menuName FROM menu WHERE mid = '$value' ") or die(mysqli_error($conn));
      foreach($acc as $rows) {
        $userAccess .= $rows['menuName'].', ';
      }
    }
  } else {
    $userAccess = 'All';
  }
  
  $sub_array = array();
  $sub_array[] = $i;
  $sub_array[] = $row["id"];
  $sub_array[] = $row["userFullName"];
  $sub_array[] = $row["userName"];
  $sub_array[] = $row["userEmail"];
  $sub_array[] = $row["typeUser"];
  $sub_array[] = $row["groupUser"];
  $sub_array[] = $userStatus;
  $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-success btn-xs update"><i class="fas fa-pencil-alt fa-sm"></i></button>
  <button class="btn btn-outline-warning btn-xs reset '.$_POST['update'].'" name="reset_password" id="'.$row["id"].'" value="Reset Password"><i class="fas fa-unlock fa-sm"></i></button>
  <button class="btn btn-outline-danger btn-xs delete '.$_POST['delete'].'" name="delete" id="'.$row["id"].'"><i class="fas fa-trash fa-sm"></i></button>';
  $data[] = $sub_array;
  $i++;
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsFiltered"  =>  get_total_all_records('user'),
  "recordsTotal" => $filtered_rows,
  "data"    => $data
 );

 echo json_encode($output);

?>