<!DOCTYPE html>
<html>
	<head>
		<title>Update Submission Process</title>
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bgcover">
	<?php
		echo "<center>";
		include 'connection.php';
		include 'js_connection.php';
		if(isset($_POST['Submit']))
		{
		$adminEmail=$_GET['adminEmail'];
		$role=$_GET['role'];
		$listID=$_GET['listID'];

		$listTitle=$_POST['listTitle'];
		$listCategory=$_POST['listCategory'];
		$listDesc=$_POST['listDesc'];
		$listGuideline=$_POST['listGuideline'];

			// isEmpty field
			if(empty($listTitle) || empty($listCategory)) {
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Invalid Value!</h2>";
				echo "Some of fields is empty. You can't proceed.</br>
				<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
				echo "</div>";
			}
			else{
				$query = dbConn()->prepare("UPDATE service_list SET listTitle='$listTitle', listCategory='$listCategory', listDesc='$listDesc', listGuideline='$listGuideline' WHERE listID='".$listID."'");
				// Success
				if($query -> execute()){
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-success-64.png'/>";
					echo "<h2>Success!</h2>";
					echo "<p id='valid'>Department is successfully updated.</p>
					<p>Click <a href='admin-departmentlist.php?adminEmail=".$adminEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
					";
					echo "</div>";
				}
				// Error
				else{
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Invalid Value!</h2>";
					echo "<p id='invalid'>Unable to submit. Please try again.</p>
					<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
					echo "</div>";
				}
			}
		}
		echo "</center>";
	?>
	</body>
</html>
