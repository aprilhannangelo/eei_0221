<?php
  session_start();
  if(!isset($_SESSION['user_id'])){
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="img/eei-black.png" />
    <title>EEI Service Desk</title>
    <?php include 'templates/css_resources.php' ?>
  </head>
  <body>
    <?php include 'templates/navheader.php'; ?>
    <?php include 'templates/sidenav.php'; ?>
    <!-- ****************************************************** -->

    <!-- COL L10-->
    <div class="col s12 m12 l12" id="content">
      <?php include 'templates/ticketforms.php'; ?>
        <div class="main-content">
          <?php if($_SESSION['user_type'] == 'Administrator' OR $_SESSION['user_type'] == "Access Group Manager")
          {
            include 'templates/dashboard.php';
          } else {
            include 'templates/knowledge-base.php';
          } ?>
        </div>

    </div>
    <?php include 'templates/js_resources.php'; ?>
  </body>
</html>
