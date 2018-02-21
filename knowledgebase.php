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
        <div class="main-content">
          <div class="col s12 m12 l12 table-header">
            <span class="table-title">Knowledge Base</span>
          </div>
          <div id="knowledge-base">
              <div class="row">
                  <div class="col s12 m4 l4">
                    <div class="card">
                      <div class="card-image">
                        <i class="large material-icons">storage</i>
                      </div>
                      <div class="card-content">
                        <span class="card-title">Technicals</span>

                        <p>Hardware, Mouse, Keyboard, Monitor, Printers, Scanners, Tablets, etc.</p>
                      </div>
                      <div class="card-action">
                        <a href="#">View Technicals FAQs</a>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m4 l4">
                    <div class="card">
                      <div class="card-image">
                        <i class="large material-icons">vpn_lock</i>
                      </div>
                      <div class="card-content">
                        <span class="card-title">Access</span>

                        <p>Hardware access, application access, password change</p>
                      </div>
                      <div class="card-action">
                        <a href="#">View Access FAQs</a>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m4 l4">
                    <div class="card">
                      <div class="card-image">
                        <i class="large material-icons">network_check</i>
                      </div>
                      <div class="card-content">
                        <span class="card-title">Network</span>
                        <p>Network/Internet Access, Network Equipment - routers, cables etc.</p>

                      </div>
                      <div class="card-action sev5" id="sev">
                        <a href="#">View Network FAQs</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>

        </div>

            <?php include 'templates/ticketforms.php'; ?>
      <!-- ****************************************************** -->
      <!-- HIDDEN FORMS -->
      </div>

    <?php include 'templates/js_resources.php'; ?>


    </body>
</html>
