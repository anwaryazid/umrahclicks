<?php

include("../lib/conn.php");

session_start();
$user_name =  $_SESSION['userName'];

function upload_image()
{
 if(isset($_FILES["hotel_img"]))
 {
  $extension = explode('.', $_FILES['hotel_img']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/hotel/' . $new_name;
  move_uploaded_file($_FILES['hotel_img']['tmp_name'], $destination);
  return $new_name;
 }
}

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Add") {

    $image = '';
    if($_FILES["hotel_img"]["name"] != '')    {
      $image = upload_image();
    }
    $package_id = $_POST["package_id2"];
    $img_for = $_POST["img_for"];
    $img_title = $_POST["img_title"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO package_image (package_id,img_for,img_title,hotel_img,createdBy,createdDate) 
    VALUES ('$package_id','$img_for','$img_title','$image','$user_name','$updatedDate')";

    $result = $conn->query($query) or die(mysqli_error($conn));

    if(!empty($result)) {
      echo 'added';
    }
  }

}

?>