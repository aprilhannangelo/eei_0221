<?php
// include "../templates/dbconfig.php";
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");


//mailer start
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//varies per computer
require 'C:\xampp\htdocs\eei\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\eei\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\eei\PHPMailer-master\src\SMTP.php';

//donna's
// require '/Applications/XAMPP/xamppfiles/htdocs/eei_merged/PHPMailer-master/src/Exception.php';
// require '/Applications/XAMPP/xamppfiles/htdocs/eei_merged/PHPMailer-master/src/PHPMailer.php';
// require '/Applications/XAMPP/xamppfiles/htdocs/eei_merged/PHPMailer-master/src/SMTP.php';
$db = mysqli_connect("localhost", "root", "", "eei_db");

// $password = mysqli_real_escape_string($db, $_POST['password']);
$userid = mysqli_real_escape_string($db, $_POST['userid']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$type = mysqli_real_escape_string($db, $_POST['type']);
$name = $fname . " " . $lname;
// $request_details = mysqli_real_escape_string($db, $_POST['request_details']);

$query = "INSERT INTO user_t (user_id,userid,first_name,last_name,password,email_address,user_type) VALUES (DEFAULT,'$userid','$fname','$lname', MD5('usr@EEI1'),'$email','$type')";

if (!mysqli_query($db, $query))
{
  die('Error' . mysqli_error($db));
}

$latest_id = mysqli_insert_id($db);

$query4 = "SELECT CONCAT(first_name, ' ', last_name) as user_name from user_t where user_id = '$latest_id'";
$result = mysqli_query($db, $query4);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row['user_name']);


$accessmanager = "dondumaliang@gmail.com";
//mailer script
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings$mail->

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "aprilhannangelo@gmail.com";                 // SMTP username
    $mail->Password = "RABBITS11!!";                           // SMTP password
    $mail->Port = 587;

    //Recipients
    $mail->setFrom("aprilhannangelo@gmail.com", "April Angelo");
    $mail->addAddress($email,$name);     // Add a recipient
    $mail->addReplyTo("aprilhannangelo@gmail.com", "April Angelo");
    // $mail->AddCC($accessmanager);
    //Attachments
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->AddEmbeddedImage('../img/email-header.png', 'email-header');    //Content
    $mail->Subject = "EEI Service Desk User Details";
		$mail->Body = "<img src=\"cid:email-header\">" .
    "<div style=\"background-color: #f5f5f5;width: 662px;padding: 30px 40px 30px 40px;border-radius: 5px;font-size: 14px;\">" .
    "Hi <b>" . $name . "</b>," . "<br><br>" .
    "You have been granted access to the EEI Service Desk Application as a <b>" . $type . "</b>.<br><br>" .
    "The following are your login credentials: <br>" .
    "Username: <b>" . $userid . "</b><br>" .
    "Password: <b> usr@EEI1 </b>" . "<br><br>" .
    "You will be prompted to change your password on your first login. For inquiries, kindly reply to this email." .
    "<br><br>" .
    "<b>IT Service Desk Team</b>" . "</div>";
    $mail->send();


mysqli_close($db);
?>
