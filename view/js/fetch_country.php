<?php

include("../../lib/conn.php");
$query = '';
$output = array();

$query .= 'SELECT * FROM ref_country';
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE kod LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
$result = $conn->query($query);
$data = array();
$filtered_rows = $result->num_rows;
foreach($result as $row)
{
  $sub_array = array();
  $sub_array[] = $row["kod"];
  $sub_array[] = $row["keterangan"];
  $sub_array[] = $row["currency_code"];
  $sub_array[] = $row["currency_name"];
  $sub_array[] = '<button class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#editCountryModal" title="Edit"><i class="fas fa-pencil-alt fa-sm"></i></button>';
  $data[] = $sub_array;
}
$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsTotal"  =>  $filtered_rows,
  "recordsFiltered" => $filtered_rows,
  "data"    => $data
 );
 echo json_encode($output);

?>