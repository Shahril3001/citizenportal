<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log Out - Admin</title>
  </head>
  <body>

  <?php
    include 'connection.php';
    $date=date("Y-m-d h:i:s");
    $adminEmail=$_GET['adminEmail'];
    $query = dbConn()->prepare("UPDATE admin SET lastLogin=:date WHERE adminEmail='".$adminEmail."'");
    $query->bindParam(":date", $date);
    $query -> execute();
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
    exit();
  ?>
  </body>
</html>
