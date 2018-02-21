<?php
// include "../templates/dbconfig.php";
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");

$email = mysqli_real_escape_string($db, $_POST['email']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$sql = "SELECT email_address from user_t WHERE email_address = '$email'";
if (!mysqli_query($db, $sql))
{
  die('Error' . mysqli_error($db));
  echo 'Email not registered';
}
else {
  $token=getRandomString(10);
  $query="INSERT INTO token_t (token,email_address) values ('$token','$email')";
  mysqli_query($db, $query);




  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

      //Server settings
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = "dondumaliang@gmail.com";                 // SMTP username
      $mail->Password = "tritondrive";                           // SMTP password
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom("dondumaliang@gmail.com", "Donna Dumaliang");
      $mail->addAddress($email);     // Add a recipient
      $mail->addReplyTo("dondumaliang@gmail.com", "Donna Dumaliang");

      //Attachments

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = "Change Password";
      $mail->Body ="Click reset link to change password http://localhost/eei_merged/reset-password.php?token=" . $token ;
      $mail->send();
}

function getRandomString($length)
	   {
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
	return $result;}


mysqli_close($db);
?>
