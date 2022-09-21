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
				$categoryID=$_GET['categoryID'];

				$categoryName=$_POST['categoryName'];
				$categoryDesc=$_POST['categoryDesc'];

				$target_dir = "data/img/service/";
				$target_dir = $target_dir . basename( $_FILES["categoryImg"]["name"]);
				$uploadOk=1;

				if (file_exists($target_dir . $_FILES["categoryImg"]["name"])){
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}

				// isEmpty field
				if(empty($categoryName) || empty($categoryDesc) || $uploadOk==0) {
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Invalid Value!</h2>";
					echo "Some of fields is empty. You can't proceed.</br>
					Sorry, your file was not uploaded.</br>
					<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
					echo "</div>";
				}
				else{
					if (move_uploaded_file($_FILES["categoryImg"]["tmp_name"], $target_dir)){
						$imageup = $target_dir;
						$query = dbConn()->prepare("UPDATE service_category SET categoryName='$categoryName', categoryDesc='$categoryDesc', categoryImg='$imageup' WHERE categoryID='".$categoryID."'");
						// Success
						if($query -> execute()){
							echo "<div class='pos'>";
							echo "<img src='icon/icons8-success-64.png'/>";
							echo "<h2>Success!</h2>";
							echo "<p id='valid'>Service is successfully updated.</p>
							<p>Image File is successfully uploaded.</p>
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
							<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
							echo "</div>";
						}
					}
					else {
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-error-96.png'/>";
						echo "<h2>Error!</h2>";
						echo "<p id='invalid'>Sorry, there was an error uploading your file.</p>
						<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
						echo "</div>";
					}
				}
			}
			echo "</center>";
		?>
	</body>
</html>
