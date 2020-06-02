<?php

include("../lib/conn.php");
include("../lib/function.php");
require_once('../PHPMailer/PHPMailerAutoload.php');

if(isset($_POST["operation"])) {

  if($_POST["operation"] == "Contact") {

    $guest = $_POST["guest"];
    $company = $_POST["company"];
    $emailAddress = $_POST["emailAddress"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $title = 'UmrahClicks.my: Maklumbalas anda telah kami terima';

    $msg = '';
    $msg .= '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$logoURL.'" height="70" alt="UmrahClicks">';
    $msg .= '<p>Assalamualaikum '.$guest.',</p>';
    $msg .= '<p>';
    $msg .= 'Terima Kasih kerana memilih kami di UmrahClicks.my<br/>';
    $msg .= 'Kami telah menerima maklumbalas anda dan akan menghubungi anda dalam masa terdekat.<br/>';
    $msg .= '</p>';
    $msg .= '<p>';
    $msg .= 'Anda juga boleh merujuk kepada soalan lazim di pautan '.$termsURL;
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
    $mail->addAddress($emailAddress);

    if(!$mail->send()) {
      echo 'Message was not sent.<br/>';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }

    $title2 = 'Mesej Contact Us Dari Portal UmrahClicks.my - '.$guest.'';

    $msg2 = '';
    $msg2 .= '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$logoURL.'" height="70" alt="UmrahClicks">';
    $msg2 .= '<p>Assalamualaikum Admin,</p>';
    $msg2 .= '<p>';
    $msg2 .= 'Sila rujuk masaalah guest berikut untuk tindakan susulan dengan segera:<br/>';
    $msg2 .= '</p>';
    $msg2 .= '<p>';
    $msg2 .= 'Nama Guest : '.$guest.'<br/>';
    $msg2 .= 'Nama Syarikat : '.$company.'<br/>';
    $msg2 .= 'No Tel : '.$phone.'<br/>';
    $msg2 .= 'Alamat Emel : '.$emailAddress.'<br/>';
    $msg2 .= 'Masalah : '.$message.'<br/>';
    $msg2 .= '</p>';

    $mail2 = new PHPMailer();
    $mail2->isSMTP();
    $mail2->SMTPDebug = $mailSMTPDebug;
    $mail2->SMTPAuth = $mailSMTPAuth;
    $mail2->SMTPSecure = $mailSMTPSecure;
    $mail2->Host = $mailHost;
    $mail2->Port = $mailPort;
    $mail2->Username = $mailUsername;
    $mail2->Password = $mailPassword;
    $mail2->setFrom($mailSetFrom, $mailSetFromName);
    $mail2->isHTML();  
    $mail2->Subject = $title2;
    $mail2->msgHTML($msg2);
    $mail2->addAddress($adminEmail);

    if(!$mail2->send()) {
      echo 'Message was not sent.<br/>';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }

  }

}