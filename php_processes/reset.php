<?php
  //file reset.php
  //title:Build your own Forgot Password PHP Script
  session_start();
  $db = mysqli_connect("localhost", "root", "", "eei_db");

  $token = mysqli_real_escape_string($db, $_POST['token']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $query="SELECT email_address from token_t where token='$token' and is_used=0";
  $result = mysqli_query($db, $query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $email=$row['email_address'];
    echo json_encode($token);

  $query2 = "UPDATE user_t SET password = MD5('$password') WHERE email_address = '$email'";
  if (!mysqli_query($db, $query2))
  {
    die('Error' . mysqli_error($db));
  }

  $query3 = "UPDATE token_t SET is_used = 1 WHERE token = '$token'";
    if (!mysqli_query($db, $query3))
    {
      die('Error' . mysqli_error($db));
    }

mysqli_close($db);
?>
