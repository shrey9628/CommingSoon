<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "GmailID";
$mail->Password   = "GmailPassword";
$mail->IsHTML(true);
$mail->AddAddress("shreysharma96280@gmail.com", "recipient-name"); //Jisse bhejni h
$mail->SetFrom("shreysharma9628@gmail.com", "Shrey Sharma");
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
$mail->AddCC("shreysharma9628@gmail.com", "Auto Generated mail");
$mail->Subject = "Thank you for contacting US";
$name = $_POST['bname']; // required
$email_from = $_POST['bemail']; // required
$number= $_POST['bphone']; // required
$businessName = $_POST['bbusinessName']; // required
$businessAddress= $_POST['baddress']; // required

 function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message ="";
    $email_message .= "<b>Name:</b> ".clean_string($name)."<br>";
    $email_message .= "<b>Number:</b> ".clean_string($number)."<br>";
    $email_message .= "<b>Email:</b> ".clean_string($email_from)."<br>";
    $email_message .= "<b>Number:</b> ".clean_string($businessName)."<br>";
    $email_message .= "<b>Email:</b> ".clean_string($businessAddress)."<br>";


//$content = "<b>Name</b>"+$name;
$mail->MsgHTML($email_message); 
if(!$mail->Send()) {

 echo "<script>alert('Something went wrong !!');document.location='http://localhost/comingsoon_06/'</script>";

  var_dump($mail);
} else {
 echo "<script>alert('We got you response...Thank you !!');document.location='http://localhost/comingsoon_06/'</script>";
}

?>
