<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

// URL Configuration
$logoURL = "http://umrahclicks.com/staging/img/umrahclicks-logo.JPG";
$termsURL = "http://umrahclicks.com/";

// Email Configuration

/* $mailHost = 'smtp.mailtrap.io';
$mailPort = '2525';
$mailUsername = '0bc12932211a45';
$mailPassword = 'b79e70fdbb0e3f';
$mailSMTPSecure = 'tls'; */

$mailHost = 'mail.umrahclicks.com';
$mailPort = '465';
$mailUsername = 'infobooking@umrahclicks.com';
$mailPassword = 'Bhnafq-1';
$mailSMTPSecure = 'ssl';

$mailSetFrom = 'no-reply@umrahclicks.my';
$mailSetFromName = 'UmrahClicks.my';
// VGvvDu3G2k7X

$mailSMTPAuth = true;
$mailSMTPDebug = 0;

$adminEmail = "infobooking@umrahclicks.com";

// Database Configuration
/* $username = "root";
$password = "";
$host = "localhost";
$dbname = "umrahclicks"; */
$username = "umrahcli_ucmy";
$password = "7YCMmC6hry6qjEes";
$host = "umrahclicks.com";
$dbname = "umrahcli_umrahclicks";

$conn = NEW mysqli($host,$username,$password,$dbname) or die(mysqli_error($conn));

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>