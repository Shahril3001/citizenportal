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
		include 'js_connection.php';

		if(isset($_POST['Submit']))
		{
		$adminEmail=$_GET['adminEmail'];
		$role=$_GET['role'];

		$categoryName=$_POST['categoryName'];
		$categoryDesc=$_POST['categoryDesc'];

			// isEmpty field
			if(empty($categoryName) || empty($categoryDesc)) {
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Invalid Value!</h2>";
				echo "Some of fields is empty. You can't proceed.</br>
				<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
				echo "</div>";
			}
			else{
				$target_dir="data/img/service/";
				$target_dir=$target_dir. basename($_FILES["categoryImg"]["name"]);
				$fileimg_extension = pathinfo($target_dir, PATHINFO_EXTENSION);
				$fileimg_extension = strtolower($fileimg_extension);
				$valid_extension = array("png","jpeg","jpg");
				if(in_array($fileimg_extension, $valid_extension)) {
					move_uploaded_file($_FILES["categoryImg"]["tmp_name"],$target_dir);
					$imageup=$target_dir;
					$query = dbConn()->prepare("INSERT INTO service_category VALUE(null, '".$categoryName."', '".$categoryDesc."', '".$imageup."')");
					// Success
					if($query -> execute()){
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-success-64.png'/>";
						echo "<h2>Success!</h2>";
						echo "<p id='valid'>Slideshow is successfully added.</p>
						<p>Click <a href='admin-servicelist.php?adminEmail=".$adminEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
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
				}else{
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Invalid Image File!</h2>";
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
