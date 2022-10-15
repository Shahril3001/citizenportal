<html>
<head>
<title>Log Out</title>
</head>
<body>

<?php
include 'connection.php';
$date=date("Y-m-d h:i:s");
$citizenIC=$_GET['citizenIC'];
$query = dbConn()->prepare("UPDATE citizen SET lastLogin=:date WHERE citizenIC='".$citizenIC."'");
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
