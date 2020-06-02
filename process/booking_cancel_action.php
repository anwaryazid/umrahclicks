<?php

include("../lib/conn.php");
include("../lib/function.php");

$url = $_POST["url"];

// pre($url);
// exit;

require_once('../PHPMailer/PHPMailerAutoload.php');

if(isset($_POST["id"])) {

  $email = '';
  $guest_name = '';
  $guest = $conn->query("SELECT guest_name, guest_email FROM guest_transaction WHERE id = '".$_POST["id"]."' LIMIT 1") or die(mysqli_error($conn));
  foreach($guest as $guest)
  {
    $email = $guest['guest_email'];
    $guest_name = $guest['guest_name'];
  }

  $title = 'UmrahClicks.my: Adakah anda masih berminat untuk membuat tempahan umrah?';

  $msg = '';
  $msg .= '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$logoURL.'" height="70" alt="UmrahClicks">';
  $msg .= '<p>Assalamualaikum '.$guest_name.',</p>';
  $msg .= '<p>';
  $msg .= 'Terima Kasih kerana memilih kami di UmrahClicks.my<br/>';
  $msg .= 'Tempahan anda masih belum lengkap kerana pembayaran belum dibuat<br/>';
  $msg .= 'Anda boleh meneruskan tempahan dengan menekan pautan "Lengkapkan Tempahan Saya" dibawah.<br/>';
  $msg .= '</p>';
  $msg .= '<a class="button" href="'.$url.'" target="_blank">Lengkapkan Tempahan Saya</a>';
  $msg .= '<p>';
  $msg .= 'Tertakluk pada Terma dan Syarat. Rujuk '.$termsURL;
  $msg .= '</p>';
  $msg .= '<p>';
  $msg .= 'Jazakallah Khaira<br/><i>UmrahClicks.my</i>';
  $msg .= '</p>';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPDebug = $mailSMTPDebug;
  $mail->SMTPAuth = $mailSMTPAuth;
  $mail->SMTPSecure = $mailSMTPSecure;
  $mail->Host = $mailHost;
  $mail->Port = $mailPort;
  $mail->Username = $mailUsername;
  $mail->Password = $mailPassword;
  $mail->setFrom($mailSetFrom, $mailSetFromName);
  $mail->isHTML();  
  $mail->Subject = $title;
  $mail->msgHTML($msg);
  $mail->addAddress($email);

  if(!$mail->send()) {
    echo 'Message was not sent.<br/>';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent.';
  }

  $query = "UPDATE guest_transaction 
    SET 
    cancellation_status = '1'
    WHERE id = '".$_POST["id"]."'";

  $result = $conn->query($query) or die(mysqli_error($conn));

  if(!empty($result))  {
     echo '<br/>Cancelled';
  }

  $conn->close();
}


?>