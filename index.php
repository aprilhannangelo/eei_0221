<!DOCTYPE html>
<html>
  <head>
    <head>
      <link rel="shortcut icon" type="image/x-icon" href="img/eei-black.png" />
      <title>EEI Service Desk</title>
      <?php include 'templates/css_resources.php' ?>
    </head>
  </head>

  <body id="login-page" class="valign-wrapper">
  <div class="container">
      <div class="valign-wrapper">
          <div class="card-panel" id="login" class="row">
            <div class="card-content white-text">
              <div class="row">
              <img src="img/EEI.png" class="login-logo">
            </div>
                <span class="card-title"><h5>EEI Corporation's Service Desk</h5></span>
            </div>
            <form method="post">
              <div class="row">
                <div class="input-field col s12" id="login">
                  <input id="userid" name="userid" type="text" class="validate">
                  <label for="userid" id="login">Userid</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password" id="login">Password</label>
                </div>
              </div>
              <div class="row" id="controls">
                 <input type="checkbox" id="remember" name="remember" />
                 <label for="test5">Remember Me</label>
                <a class="password-forgot modal-trigger" href="#modal2">Forgot Password?</a>
              </div>
              <div class="row">
                 <input class="waves-effect waves-light btn-login" id="button-login" name="submit" type="submit" value="Login">
                 <br>
              </div>

              </form>
              <!-- Modal Structure -->
              <div id="modal2" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h6>Enter registered email address</h6>
                  <br>
                  <form id="forgot-password" name="forgot-password" method="post">
                    <div class="col s12 m12 l12 forgot-password-box" id="forgot-password-box">
                      <div class="input-field forgot-password" id="request-form-row2">
                        <div class="input-field" id="request-form">
                          <input placeholder=" " class="title" name="email" type="text" data-length="40" class="validate" required>
                          <label for="title">Email Address</label>
                        </div>

                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <input class="modal-action modal-close btn-flat" id="request-form-row" name="submit" type="submit" value="Save">
                </div>
              </form>
              </div>
              <!-- end of modal -->

            </div>
        </div>
    </div>


    <!--LOGIN PROCESS-->
    <?php
    include "templates/dbconfig.php";
    if(isset($_POST['userid']) && isset($_POST['password'])){
      $username = $_POST['userid'];
      $password = md5($_POST['password']);
      $stmt = $db->prepare("SELECT * FROM user_t WHERE userid=? AND password=? ");
      $stmt->bindParam(1, $username);
      $stmt->bindParam(2, $password);
      $stmt->execute();
      $row = $stmt->fetch();
      $user = $row['userid'];
      $pass = $row['password'];
      $id = $row['user_id'];
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $email = $row['email_address'];
      $user_type = $row['user_type'];
      $firstlogin = $row['is_firstlogin'];
      if($username==$user && $password==$pass){
        session_start();
        $_SESSION['userid'] = $user;
        $_SESSION['password'] = $pass;
        $_SESSION['user_id'] = $id;
        $_SESSION['user_type'] = $user_type;
        $_SESSION['first_name'] = $fname;
        $_SESSION['last_name'] = $lname;
        $_SESSION['email_address'] = $email;

        if($firstlogin === NULL){ ?>
          <?php
            $db = mysqli_connect("localhost", "root", "", "eei_db");
            $usersession = $_SESSION['userid'];
            $islogin = "UPDATE user_t SET is_firstlogin = true WHERE userid = '$usersession'";
            if (!mysqli_query($db, $islogin))
            {
              die('Error' . mysqli_error($db));
            }
            ?>
            <script>window.location.assign('changepassword.php')</script>

            <!-- <script>window.location.assign('changepassword.php')</script> -->
          <?php } else { ?>
            <script>window.location.assign('home.php')</script>

          <?php
          }}}
        ?>
    <!-- END OF LOGIN PROCESS -->


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
      <?php include 'templates/js_resources.php' ?>
  </body>
</html>
