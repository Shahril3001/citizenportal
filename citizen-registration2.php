<!DOCTYPE html>
<html>
	<head>
		<title>Add Submission Process</title>
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
		$citizenEmail=$_POST['citizenEmail'];
		$citizenPhone=$_POST['citizenPhone'];
		$citizenAddress=$_POST['citizenAddress'];
		$citizenPassword=$_POST['citizenPassword'];
		$citizenCPassword=$_POST['citizenCPassword'];

			// isEmpty field
			if(empty($citizenName) || empty($citizenIC) || empty($citizenEmail) || empty($citizenPhone) || empty($citizenAddress) || empty($citizenPassword)) {
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
				if($citizenPassword==$citizenCPassword){
					$checkCitizen = dbConn()->prepare("SELECT * FROM citizen where citizenName LIKE '%".$citizenName."%' AND citizenIC LIKE '%".$citizenIC."%'");
					$checkCitizen->execute();
					$num_count = $checkCitizen->rowCount();
					if ($num_count !=0)
					{
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-error-96.png'/>";
						echo "<h2>User Account is already created.</h2>";
						echo "<p id='invalid'>Unable to submit. Please try again.</p>
						<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'> to re-attempt new account OR<br>
							click <a href='login.php'><input class='button' type='button' name='login' value='Login'></a> to login.</p>
						<script>
							function goBack(){
								window.history.back();
							}
						</script></p>";
						echo "</div>";
					}else{
						$query = dbConn()->prepare("INSERT INTO citizen VALUE(null, '".$citizenName."', '".$citizenIC."', '".$citizenEmail."', '".$citizenPhone."', '".$citizenAddress."', '".$citizenPassword."', 'citizen', '00/00/0000')");
						// Success
						if($query -> execute()){
							echo "<div class='pos'>";
							echo "<img src='icon/icons8-success-64.png'/>";
							echo "<h2>Success!</h2>";
							echo "<p id='valid'>Citizen is successfully added.</p>
							<p>Click <a href='login.php'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
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
				else{
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Password doesn't match.</h2>";
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
