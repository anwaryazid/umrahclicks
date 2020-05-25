<?php

include("../lib/conn.php");

if(isset($_POST["id"])) {
 $output = array();
 $result = $conn->query("SELECT 
 a.*,
 b.keterangan AS country,
 c.agency_name AS agency,
 d.package_name AS package,
 e.room_type AS room,
 e.room_actualCost AS actualPrice,
 f.promo_code AS promo
FROM guest_transaction a
LEFT JOIN ref_country b ON b.id = a.guest_country
LEFT JOIN agency c ON c.id = a.agency_id
LEFT JOIN package d ON d.id = a.package_id
LEFT JOIN package_room e ON e.id = a.package_room_id
LEFT JOIN promo f ON f.id = a.promo_id
WHERE a.id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
 foreach($result as $row)
 {
  $output["guest_name"] = $row["guest_name"];
  $output["guest_no"] = $row["guest_no"];
  $output["guest_email"] = $row["guest_email"];
  $output["guest_pax"] = $row["guest_pax"];
  $output["guest_booking_price"] = $row["guest_booking_price"];
  $output["guest_deposit"] = $row["guest_deposit"];
  $output["country"] = $row["country"];
  $output["agency"] = $row["agency"];
  $output["package"] = $row["package"];
  $output["room"] = $row["room"];
  $output["promo"] = $row["promo"];
 }
 echo json_encode($output);
}

?>