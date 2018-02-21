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
  <script>
  function deleteUser($id){
          swal({
          title: "Delete this user?",
          text: "You will not be able to undo the action.",
          icon: "warning",
          buttons: ["Cancel", "Delete"],
          dangerMode: true,
         })
         .then((willDelete) => {
          if (willDelete) {
          //get the input value
          $.ajax({
              //the url to send the data to
              url: "php_processes/delete-user.php",
              //the data to send to
              data: {id : $id},
              //type. for eg: GET, POST
              type: "POST",
              success: function()
               {
                 swal({
                    title: "User deleted",
                    type: "success",
                    icon: "success"
                }).then(function(){
                  window.location="manageUsers.php";
                });
               }
              })
              } else {
                   swal("", "User is not deleted!","error");
                 }
                });
               };

  </script>
  </head>

  <body>
    <?php include 'templates/navheader.php'; ?>
    <?php include 'templates/sidenav.php'; ?>

    <!-- ****************************************************** -->

    <!--body-->
    <div class="col s12 m12 l12" id="content">
      <div class="main-content">
        <div class="col s12 m12 l12 table-header">
          <span class="table-title">User Profile</span>
          <?php
          $db = mysqli_connect("localhost", "root", "", "eei_db");
          $id = $_GET["id"];

          $query1 = "SELECT * from user_t where user_id = $id";

          if (!mysqli_query($db, $query1))
          {
            die('Error' . mysqli_error($db));
          }

          $result = mysqli_query($db, $query1);
          $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

          mysqli_close($db);
          ?>
          <input onclick="deleteUser(<?php echo $row['user_id']?>)" id="delete" name="submit" type="submit" value="Delete">
          <div class="col s12" id="breadcrumb">
            <a href="#!" class="breadcrumb">Manage Users</a>
            <a href="#!" class="breadcrumb">User Profile</a>
          </div>
        </div>
        <div class="profile-body">
          <h4 class="body-header"><b><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></b></h4>
          <h6 class="body-header" id="line2"><b><?php echo $row['user_type'] ?></b></h6>

              <table id="profile">
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td class = "pflBody" contenteditable="false"><?php echo $row['first_name']?></td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td class = "pflBody" contenteditable="false"><?php echo $row['last_name']?></td>
                  </tr>
                  <tr>
                    <td>Userid</td>
                    <td class = "pflBody" contenteditable="false"><?php echo $row['userid']?></td>
                  </tr>
                  <tr>
                    <td>E-mail Address</td>
                    <td class = "pflBody" contenteditable="false"><?php echo $row['email_address']?></td>
                  </tr>
                  <tr>
                    <td>User Type</td>
                    <td class = "pflBody" contenteditable="false" ><?php echo $row['user_type']?></td>
                  </tr>

                </tbody>
              </table>
            </div>

            <!-- ****************************************************** -->
            <!-- HIDDEN FORMS -->
            <?php include 'templates/ticketforms.php'; ?>
          </div> <!-- End of main container of col 10 -->
        </div> <!-- End of wrapper of col l10 -->

    <?php include 'templates/js_resources.php' ?>
  </body>
</html>
