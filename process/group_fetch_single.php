<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT
 group_type.*,
 GROUP_CONCAT(group_access.groupMenuAccess ORDER BY group_access.groupMenuAccess SEPARATOR ',') AS groupMenuAccess
 FROM group_type
 LEFT JOIN group_access ON group_access.groupID = group_type.id
 WHERE group_type.id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["groupName"] = $row["groupName"];
  // $output["groupMenuAccess"] = $row["groupMenuAccess"];
  // $output["groupTypeAccess"] = $row["groupTypeAccess"];
  $output["createdBy"] = $row["createdBy"];
  $output["createdDate"] = $row["createdDate"];
  $output["updatedBy"] = $row["updatedBy"];
  $output["updatedDate"] = $row["updatedDate"];
  $groupMenuAccess = '';
  $groupMenuAccessID = '';
  $menuAccess = explode (",", $row["groupMenuAccess"]);
  foreach ($menuAccess as $key => $value) {
    $menu = $conn->query("SELECT mid, menuPath FROM menu WHERE mid = '$value' ORDER BY mid ") or die(mysqli_error($conn));
    foreach($menu as $rows) {      
      $groupMenuAccess .= $rows['menuPath'].', ';
      $groupMenuAccessID .= $rows['mid'].', ';
    }
  }

  $groupTypeAccess = array();

  $qType = "SELECT
    group_type.id,
    group_access.groupMenuAccess AS groupMenuAccess,
    group_access.groupTypeAccess 
  FROM
    group_type
    LEFT JOIN group_access ON group_access.groupID = group_type.id 
  WHERE
    group_type.id = '".$_POST["id"]."'
  ORDER BY groupMenuAccess";
  $types = $conn->query($qType) or die(mysqli_error($conn));

  foreach($types as $type) {
    $groupTypeAccess[] = $type['groupTypeAccess'];
    // array_push($groupTypeAccess, $type['groupTypeAccess']);
    // $groupTypeAccess .= $type['groupTypeAccess'].', ';
  }

  // echo $groupTypeAccess;
  $output["groupTypeAccess"] = $groupTypeAccess;
  $output["groupMenuAccess"] = rtrim($groupMenuAccess, ', ');
  $output["groupMenuAccessID"] = rtrim($groupMenuAccessID, ', ');
 }
 $conn->close();
 echo json_encode($output);
}

?>