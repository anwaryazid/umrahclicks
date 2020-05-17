<?php

function get_image_name($user_id)
{
 include('db.php');
 $statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records($table)
{
  include("conn.php");
  $result = $conn->query('SELECT * FROM '.$table.'');
  return mysqli_num_rows($result);
}

function convert_currency($from,$to) {

  $from = urlencode($from);
  $to = urlencode($to);
  $url = "https://free.currconv.com/api/v7/convert?q=$from"."_"."$to&compact=ultra&apiKey=a59d7c336eddd151acdb";
  $ch = curl_init();
  $timeout = 0;
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:10.0) Gecko/20100101 Firefox/10.0');
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $rawdata = curl_exec($ch);
  curl_close($ch);

  $obj = json_decode($rawdata);

  return $obj->{$from.'_'.$to};
}

function pre($data) {
  print '<pre>' . print_r($data, true) . '</pre>';
}

?>