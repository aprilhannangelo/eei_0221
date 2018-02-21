<?php
// include "../templates/dbconfig.php";
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");

$status = mysqli_real_escape_string($db, $_POST['status']);
$category = mysqli_real_escape_string($db, $_POST['category']);
$id = mysqli_real_escape_string($db, $_POST['id']);
$severity= mysqli_real_escape_string($db,$_POST['severity']);

  $query1 = "UPDATE ticket_t SET ticket_status='$status', ticket_category='$category', severity_level='$severity' WHERE ticket_id = $id";
  if (!mysqli_query($db, $query1))
  {
    die('Error' . mysqli_error($db));
  }
  
  //date required
  $datePrepared = "SELECT date_assigned FROM ticket_t WHERE ticket_id = $id";
  $row4 =mysqli_fetch_array(mysqli_query($db, $datePrepared),MYSQLI_ASSOC);
  $datePrepared = $row4['date_assigned'];
  $date = $datePrepared;

  $sql = "SELECT resolution_time FROM sla_t WHERE id = '$severity'";
  $row3 = mysqli_fetch_array(mysqli_query($db, $sql),MYSQLI_ASSOC);
  $interval = $row3['resolution_time'];

  $dateRequired = "UPDATE ticket_t set date_required = DATE_ADD('$date', INTERVAL $interval  HOUR) WHERE ticket_id = $id";
  $run = mysqli_query($db, $dateRequired);


  if ($status == 7) {
  $query = "SELECT * FROM ticket_t WHERE ticket_id = $id ";
  $result  = mysqli_query($db, $query);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $ticketNo = $row['ticket_number'];
  $user = $row['user_id'];
  //nav notification

  $notifSql = "INSERT INTO notification_t (notification_id,ticket_id, user_id, notification_description, isRead) VALUES(DEFAULT, $id,$user,'Your ticket $ticketNo has been resolved',0)";
  if (!mysqli_query($db, $notifSql))
  {
    die('Error' . mysqli_error($db));
  }

}

mysqli_close($db);
?>
