<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css?<?php echo time(); ?>"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <form id="reset-password" name="reset-password" method="post">
              <div class="row">
                <div class="input-field col s12" id="login">
                  <input id="password" name="password" type="text" class="validate">
                       <input  id="token" name = "token" type="hidden" value="<?php $id = $_GET['token']; echo $id?>">
                  <label for="new-password" id="new-password">New Password</label>
                </div>
              </div>

              <div class="row">
                 <input class="waves-effect waves-light btn-login" id="request-form-row" name="submit" type="submit" value="Update Password">
                 <br>
              </div>

              </form>

            </div>
        </div>
    </div>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
      <?php include 'templates/js_resources.php' ?>
  </body>
</html>
