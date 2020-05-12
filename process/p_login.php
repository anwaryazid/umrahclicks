<?php

  session_start(); 

  include("../lib/conn.php");

  $output = array();

  if(isset($_POST["operation"])) {

    $username = $_POST["username"];
    $password = password_verify($_POST["password"], PASSWORD_DEFAULT);

    if($_POST["operation"] == "Login") {
      $query = "SELECT * FROM user WHERE userName = '".$username."'";
      $result = $conn->query($query) or die(mysqli_error($conn));
      foreach($result as $row) {
        $password = password_verify($_POST["password"], $row['userPassword']);
        if ($password) {
          if ($row['userStatus'] == '1') {
            $output["success"] = "true";
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userFullName'] = $row['userFullName'];
            $_SESSION['userEmail'] = $row['userEmail'];
            $_SESSION['userType'] = $row['userType'];
            $_SESSION['userAccess'] = $row['userAccess'];
            $_SESSION['firstTimeLogin'] = $row['firstTimeLogin'];
          } else {
            $output["success"] = "false";
            $output["result"] = "<strong>Login Error!</strong> <br/>Please contact system administrator.";
          }
          
        } else { 
          $output["success"] = "false";
          $output["result"] = "Incorrect username or password.";
        }
      }      
    }

  }

  echo json_encode($output);

?>