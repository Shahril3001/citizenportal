<!DOCTYPE html>
<html>
	<head>
		<title>Error</title>
			<link rel="icon" href="icon/icons8-improvement-64.png">
			<link rel="stylesheet" href="style.css">
			<script>
				var countDownDate = new Date();
				countDownDate.setTime(countDownDate.getTime() + 15000)
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countDownDate - now;
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("countDown").innerHTML = seconds + "<span>s</span>";

				if (distance < 0) {
					clearInterval(x);
					document.getElementById("countDown").innerHTML = "End";
				}
				}, 1000);
			</script>
	</head>
	<body class="bgcover">
<?php
session_start();
include 'connection.php';
echo "<center>";
if(isset($_POST['Submit1'])){
	$citizenIC = $_POST['citizenIC'];
	$citizenPassword = $_POST['citizenPassword'];
	if(empty($citizenIC) || empty($citizenPassword)) {
	echo "<div class='pos'>";
	echo "<img src='icon/icons8-error-96.png'/>";
	echo "<h2>Empty field!</h2>";
	echo "<p>Some of fields is empty. You can't proceed.</p>
	<p>Please click <a href='login.php'><button id='backBtn' class='button'>Back</button></a> to re-login.</p>";
	echo "</div>";
	} else {
		$query = dbConn()->prepare("SELECT * FROM citizen WHERE citizenIC='$citizenIC' AND  citizenPassword='$citizenPassword' ");
		$query->execute(array());

		if($query->rowCount() >= 1) {
		  $_SESSION['citizenIC'] = $citizenIC;
			$query1 = dbConn()->prepare('SELECT * FROM citizen WHERE citizenIC="'.$citizenIC.'"');
			$query1->execute();
			$citizens = $query1->fetchAll(PDO::FETCH_OBJ);
			foreach($citizens as $citizen){
				$citizenIC  = $citizen->citizenIC;
				$role = $citizen->role;
			}
		$_SESSION['user-valid']=0;
    header("location:citizen-index.php?citizenIC=".$citizenIC."&role=".$role."");
		} else {

		if(!isset($_SESSION["user-valid"])){
			$_SESSION['user-valid']=0;
		}
		$_SESSION['user-valid']++;
			if($_SESSION['user-valid']<=2){
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Invalid Login Attempt!</h2>";
			  echo "<p>Username/Password is wrong. You have attempt ".$_SESSION['user-valid']."x for login.</p>
				<p>Please click <a href='login.php'><button id='backBtn' class='button'>Back</button></a>.</p>";
				echo "</div>";
			}
			else{
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-timer-64.png'/>";
				echo "<h2>Invalid Login Attempt!</h2>";
				$_SESSION['user-valid']=0;
				echo "<p id='invalid'>Opps! Sorry, Username/Password is wrong. You have to wait for 15 seconds for re-login.</p>";
				echo" <div id='countDown'></div>";
				echo "<meta http-equiv='refresh' content='15; url=login.php'/>";
				echo "</div>";
			}
		}
	}
}
echo "<//center>";
?>
</body>
</html>
