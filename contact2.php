<!DOCTYPE html>
<html>
	<head>
		<title>Contact Submission Process</title>
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bgcover">
	<?php
		echo "<center>";
		include 'connection.php';
		if(isset($_POST['Submit']))
		{
		$citizenName=$_POST['citizenName'];
		$citizenIC=$_POST['citizenIC'];
		$subjectF=$_POST['subjectF'];
		$feedbackType=$_POST['feedbackType'];
		$emailF=$_POST['emailF'];
		$commentF=$_POST['commentF'];
		$dateF=date("Y-m-d h:i:sa");

			// isEmpty field
			if(empty($citizenName) || empty($citizenIC) || empty($subjectF) || empty($feedbackType) ||empty($emailF) || empty($commentF)) {
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Invalid Value!</h2>";
				echo "Some of fields is empty. You can't proceed.</br>
				<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
				<script>
				function goBack(){
				window.history.back();
				}
				</script>";
				echo "</div>";
			}
			else{
				$query = dbConn()->prepare("INSERT INTO feedback VALUE(null, '".$citizenName."', '".$citizenIC."', '".$subjectF."', '".$feedbackType."', '".$emailF."', '".$commentF."', '".$dateF."')");
				// Success
				if($query -> execute()){
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-success-64.png'/>";
					echo "<h2>Success!</h2>";
					echo "<p id='valid'>Feedback is successfully added.</p>
					<p>Click <a href='contact.php'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
					";
					echo "</div>";
				}
				// Error
				else{
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Invalid Value!</h2>";
					echo "<p id='invalid'>Unable to submit. Please try again.</p>
					<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
					<script>
						function goBack(){
							window.history.back();
						}
					</script></p>";
					echo "</div>";
				}
			}
		}
		echo "</center>";
	?>

	</body>
</html>
