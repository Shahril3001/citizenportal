<!DOCTYPE html>
<html>
	<head>
		<title>Delete Process</title>
			<link rel="icon" href="icon/icons8-improvement-64.png">
			<link rel="stylesheet" href="style.css">
	</head>
	<body class="bgcover">
	<?php
		include 'connection.php';
		include 'js_connection.php';

		$adminEmail=$_GET['adminEmail'];
		$role=$_GET['role'];
		$adminID = $_GET["adminID"];
		// check total admin
		$checktotalQuery = dbConn()->prepare("SELECT * FROM admin");
		$checktotalQuery->execute();
		$countRow = $checktotalQuery->rowCount();
		
		// if there only 1 admin left
		if($countRow==1){
			echo "<div class='pos'>";
			echo "<img src='icon/icons8-error-96.png'/>";
			echo "<h2>Invalid Delete Data!</h2>";
			echo "<p>Failed to delete data due to only 1 staff left in database.</p>
			<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
			echo "</div>";
		}else{
			$query = dbConn()->prepare("DELETE  FROM admin WHERE adminID='".$adminID."'");
			if($query->execute()){
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-success-64.png'/>";
				echo "<h2>Success!</h2>";
				echo "<p id='valid'>Data is successfully deleted.</p>
				<p>Click <a href='admin-stafflist.php?adminEmail=".$adminEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
				";
				echo "</div>";
			}
			else{
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Failed to Delete Data!</h2>";
				echo "<p>Failed to delete data.</p>
				<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
				echo "</div>";
			}
		}
	?>
	</body>
</html>
