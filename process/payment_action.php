<?php

include("../lib/conn.php");
include("../lib/function.php");

if(isset($_POST["operation"])) {

  // pre($_POST);
  // exit;

  if($_POST["operation"] == "Pay") {

    $id = $_POST["id"];
    $amount = $_POST["amount"];
    $updatedDate = date('Y-m-d H:i:s');

    $query = "UPDATE guest_transaction 
    SET 
    payment_status = '1',
    transaction_status = '1',
    transaction_date = '$updatedDate',
    transaction_close_date = '$updatedDate'
    WHERE id = '$id'";

    $result = $conn->query($query) or die(mysqli_error($conn));

    $query2 = "INSERT INTO follow_up (guest_id,confirm_Date) 
    VALUES ('$id','$updatedDate')";

    $result2 = $conn->query($query2) or die(mysqli_error($conn));

    $book_pax = 0;
    $pax_book = 0;
    $guest_pax = 0;
    $booking_id = '';
    $guest_date_depart = '';

    $guests = $conn->query("SELECT 
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
    foreach($guests as $guest) {
      $guest_name = $guest['guest_name'];
      $guest_no = $guest['guest_no'];
      $guest_email = $guest['guest_email'];
      $guest_date_depart = $guest['guest_date_depart'];
      $guest_pax = $guest['guest_pax'];
      $guest_deposit = $guest['guest_deposit'];
      $transaction_date = $guest['transaction_date'];
      $booking_id = $guest['booking_id'];
      $agency = $guest['agency'];
      $package_name = $guest['package'];
      $room = $guest['room'];
      $promo = $guest['promo'];
      $package_id = $guest['package_id'];
    }

    $packages = $conn->query("SELECT * FROM package WHERE id = '$package_id' LIMIT 1") or die(mysqli_error($conn));
    foreach($packages as $package) {
      $pax_book = $package['package_pax_book'];
    }

    $book_pax = $guest_pax + $pax_book;

    $query3 = "UPDATE package 
    SET 
    package_pax_book = '$book_pax'
    WHERE id = '$package_id'";

    $result3 = $conn->query($query3) or die(mysqli_error($conn));    

    require_once('../vendor/autoload.php');

    $mpdf = new \Mpdf\Mpdf();

    $data = '';
    $data .= '
    <table style="width:100%; border-collapse: collapse; border: 1px solid black; font-size: .8rem;">
      <tr style="border: 1px solid black;">
        <td style="padding: 15px;"><img src="'.$logoURL.'" height="70" alt="UmrahClicks"></td>
        <td style="text-align:right; padding: 15px;"><h2 style="color:green; background-color: AliceBlue;">Pengesahan Tempahan</h2><small>Sila bawa bukti pengesahan tempahan ini ketika berurusan</small></td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="padding: 15px;">
          <table style="width:100%; border-collapse: collapse;">
            <tr>
              <td style="padding: 5px;">ID Tempahan</td>
              <td style="padding: 5px;">'.$booking_id.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Nama</td>
              <td style="padding: 5px;">'.$guest_name.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Alamat Emel</td>
              <td style="padding: 5px;">'.$guest_email.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">No Tel</td>
              <td style="padding: 5px;">'.$guest_no.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Tarikh Tempahan</td>
              <td style="padding: 5px;">'.$transaction_date.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Kod Promo</td>
              <td style="padding: 5px;">'.$promo.'</td>
            </tr>
          </table>
        </td>
        <td style="padding: 15px;">
          <table style="width:100%; border-collapse: collapse; background-color: Gainsboro;">
            <tr>
              <td style="padding: 5px;">Agensi</td>
              <td style="padding: 5px;">'.$agency.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Pakej</td>
              <td style="padding: 5px;">'.$package_name.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Jenis Bilik</td>
              <td style="padding: 5px;">'.$room.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Bilangan Peserta</td>
              <td style="padding: 5px;">'.$guest_pax.'</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Tarikh Berlepas</td>
              <td style="padding: 5px;">'.$guest_date_depart.'</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr style="border: 1px solid black;">
        <td colspan="2" style="padding: 15px;">
          <table style="width:100%;">
            <tr>
              <td colspan="4" style="text-align:right; padding: 5px;">
                <h2 style="color:green; background-color: AliceBlue;">Resit Tempahan</h2>
              </td>
            </tr>
            <tr>
              <td colspan="4" style="padding: 5px;">
                <strong>Maklumat Pembayaran</strong>
              </td>
            </tr>
            <tr>
              <td style="padding: 5px; width: 20%;">Kaedah Pembayaran</td>
              <td style="padding: 5px;">Perbankan Internet FPX</td>
              <td style="padding: 5px; width: 20%;">Bank</td>
              <td style="padding: 5px;">CIMB Clicks</td>
            </tr>
            <tr>
              <td style="padding: 5px;">Jumlah Dibayar</td>
              <td style="padding: 5px;" colspan="3">RM'.$guest_deposit.'</td>
            </tr>
            <tr>
              <td style="padding: 5px; border: 1px solid black;" colspan="2">
                Nota : <br/>
                Tertakluk pada terma dan syarat <br/>
                Sila Rujuk '.$termsURL.'
              </td>
              <td style="padding: 5px; vertical-align:bottom; text-align:center; border: 1px solid black;" colspan="2">
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                Authorized Stamp & Signature
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>';

    $mpdf->WriteHTML($data);
    $pdf = $mpdf->Output('', 'S');

    $title = 'UmrahClicks.my: Pengesahan utk tempahan ID '.$booking_id.', Tarikh Berlepas '.$guest_date_depart;

    $msg = '';
    $msg .= '
    <table style="width:100%; border-collapse: collapse;">
      <tr>
        <td style="text-align:center;" colspan="2">
          <img style="display: block; margin-left: auto; margin-right: auto;" src="http://umrahclicks.com/staging/img/umrahclicks-logo.JPG" height="70" alt="UmrahClicks">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h2 style="text-align: center; color:green;">Tempahan Anda Telah Disahkan</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <p>Assalamualaikum ,</p>
          <p>
            Terima Kasih kerana memilih kami di UmrahClicks.my<br/>
            Sila rujuk slip tempahan pada lampiran
          </p>
          <p>
            Jazakallah Khaira<br/>
            <i>UmrahClicks.my</i>
            <br/><br/>
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="2"><strong>Infoline</strong></td>
      </tr>
      <tr style="background-color: rgba(50, 115, 220, 0.3);">
        <td>
          No Tel : +603-8230 8076
        </td>
        <td>
          Emel : booking@umrahclicks.my
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Tertakluk pada Terma dan Syarat. Rujuk '.$termsURL.'
        </td>
      </tr>
    </table>';

    require_once('../PHPMailer/PHPMailerAutoload.php');

    function sendEmail () {}

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
    $mail->addStringAttachment($pdf,'receipt.pdf');
    $mail->addAddress('m.anwaryazid@gmail.com');

    if(!$mail->send()) {
      echo 'Message was not sent.<br/>';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }

    if(!empty($result) && !empty($result2)) {
      echo '<br/>Paid';
    }
  }

  $conn->close();
}

?>