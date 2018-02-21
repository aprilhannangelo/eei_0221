
<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");

$request_title = mysqli_real_escape_string($db, $_POST['title']);
$company = mysqli_real_escape_string($db, $_POST['company']);
$dp = mysqli_real_escape_string($db, $_POST['dp']);
$rc = mysqli_real_escape_string($db, $_POST['rc_no']);
$names = mysqli_real_escape_string($db, $_POST['names']);
$access_request = mysqli_real_escape_string($db, $_POST['access_type']);
$app = mysqli_real_escape_string($db, $_POST['app_name']);
$approver = mysqli_real_escape_string($db, $_POST['approver']);
$checker = mysqli_real_escape_string($db, $_POST['checker']);


$query1 = "INSERT INTO ticket_t (ticket_id, ticket_title, ticket_type, date_prepared, ticket_status, user_id) VALUES(DEFAULT, '$request_title', 'User Access', CURDATE(), '1', '{$_SESSION['user_id']}')";

if (!mysqli_query($db, $query1))
{
  die('Error' . mysqli_error($db));
}

$latest_id = mysqli_insert_id($db);
$query2 = "UPDATE ticket_t SET ticket_number= CONCAT(EXTRACT(YEAR FROM date_prepared), ticket_id)  WHERE ticket_id = '$latest_id'";
if (!mysqli_query($db, $query2))
{
  die('Error' . mysqli_error($db));
}

$query5= "SELECT user_id from user_t WHERE CONCAT(first_name,' ',last_name)='$approver'";
$result2=mysqli_query($db, $query5);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$approverID= $row2['user_id'];

$query6= "SELECT user_id,email_address from user_t WHERE CONCAT(first_name,' ',last_name)='$checker'";
$result3=mysqli_query($db, $query6);
$row3= mysqli_fetch_array($result3,MYSQLI_ASSOC);
$checkerID= $row3['user_id'];
$checkerEmail = $row3['email_address'];

$query3 = "INSERT INTO user_access_ticket_t (ticket_id, company, dept_proj, rc_no, name, access_type, application_name,  approver, checker) VALUES('$latest_id', '$company', '$dp', '$rc', '$names', '$access_request', '$app', '$approverID', '$checkerID')";

if (!mysqli_query($db, $query3))
{
  die('Error' . mysqli_error($db));
}


//nav notification
$query3= "SELECT user_id, ticket_number from ticket_t WHERE ticket_id = '$latest_id'";
$result=mysqli_query($db, $query3);
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);

//nav notification
$notifSql = "INSERT INTO notification_t (notification_id,ticket_id, user_id, notification_description, isRead) VALUES(DEFAULT, '$latest_id',$checkerID,'Ticket No. : $row[ticket_number] needs your review',0)";
if (!mysqli_query($db, $notifSql))
{
  die('Error' . mysqli_error($db));
}
$query4 = "SELECT CONCAT(first_name, ' ', last_name) as name FROM user_t u left join ticket_t t on u.user_id = t.user_id WHERE t.ticket_id = '$latest_id'";
$result4 = mysqli_query($db, $query4);
$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);

//email notif to checker
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
//
// require 'C:\xampp\htdocs\eei\PHPMailer-master\src\Exception.php';
// require 'C:\xampp\htdocs\eei\PHPMailer-master\src\PHPMailer.php';
// require 'C:\xampp\htdocs\eei\PHPMailer-master\src\SMTP.php';


$query4 = "SELECT ticket_number from ticket_t where ticket_id = '$latest_id'";

$result = mysqli_query($db, $query4);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

echo json_encode($row['ticket_number']);

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
    $mail->addAddress($checkerEmail, $checker);     // Add a recipient
    $mail->addReplyTo("dondumaliang@gmail.com", "Donna Dumaliang");

    //Attachments

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Access Request for Review";
    $mail->AddEmbeddedImage('../img/email-header.png', 'email-header');    //Content
		$mail->Body = "<img src=\"cid:email-header\">" .
    "<div style=\"background-color: #f5f5f5;width: 662px;padding: 30px 40px 30px 40px;border-radius: 5px;font-size: 14px;\">" .
    "Hi <b>" . $checker . "</b>," . "<br><br>" .
    $row4['name'] . " is requesting for " . $access_request  . " access" . "<br><br> As the checker assigned, kindly view and check access request details through the EEI Service Desk website http://localhost/eei0219-master/details.php?id=" . $latest_id . "</b>.<br><br>" .
    "--<br><b>IT Service Desk Team</b>" . "</div>";
    $mail->Body =
    $mail->send();

mysqli_close($db);
?>
