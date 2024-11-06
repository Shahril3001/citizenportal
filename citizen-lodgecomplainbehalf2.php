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
		$citizenIC=$_GET['citizenIC'];
		$role=$_GET['role'];

		$behalfName=$_POST['behalfName'];
		$reason=$_POST['reason'];
		$behalfContact=$_POST['behalfContact'];
		$behalfAddress=$_POST['behalfAddress'];
		$relationship=$_POST['relationship'];

		$complaintSubject=$_POST['complaintSubject'];
		$complaint=$_POST['complaint'];
		$location=$_POST['location'];
		$date=$_POST["date"];
		$listID=$_POST['listID'];
		$complaintDate=date("Y-m-d h:i:sa");


			// isEmpty field
			if(empty($behalfName) || empty($reason) || empty($behalfContact) || empty($behalfAddress) || empty($relationship) || empty($complaintSubject) || empty($complaint) || empty($location) || empty($date) || empty($listID)) {
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
				$target_dir="complaint/image/";
				$target_dir=$target_dir. basename($_FILES["complaintImage"]["name"]);
				$fileimg_extension = pathinfo($target_dir, PATHINFO_EXTENSION);
				$fileimg_extension = strtolower($fileimg_extension);
				$validimg_extension = array("png","jpeg","jpg");

				$target_dir1="complaint/document/";
				$target_dir1=$target_dir1. basename($_FILES["complaintDocument"]["name"]);
				$filedoc_extension = pathinfo($target_dir1, PATHINFO_EXTENSION);
				$filedoc_extension = strtolower($filedoc_extension);
				$validdoc_extension = array("rar","docx","doc","pdf");

				if(in_array($fileimg_extension, $validimg_extension) && in_array($filedoc_extension, $validdoc_extension)) {
						move_uploaded_file($_FILES["complaintImage"]["tmp_name"],$target_dir);
						$imageup=$target_dir;
						move_uploaded_file($_FILES["complaintDocument"]["tmp_name"],$target_dir1);
						$documentup=$target_dir1;

						$servicelistquery = dbConn()->prepare("SELECT * FROM service_list WHERE listID='$listID'");
						$servicelistquery->execute();
						$servicelists = $servicelistquery->fetchAll(PDO::FETCH_OBJ);

						foreach($servicelists as $servicelist){
							$listTitle   = $servicelist->listTitle;
							$listCategory    = $servicelist->listCategory;

							$query = dbConn()->prepare("INSERT INTO complaintsBehalf VALUE(null, '".$behalfName."', '".$reason."', '".$behalfContact."', '".$behalfAddress."', '".$relationship."', '".$complaintSubject."', '".$complaint."', '".$location."', '".$date."', '".$listTitle."', '".$listCategory."','".$imageup."', '".$documentup."','".$citizenIC."','Open','".$complaintDate."')");
						}// Success
						if($query -> execute()){
							echo "<div class='pos'>";
							echo "<img src='icon/icons8-success-64.png'/>";
							echo "<h2>Success!</h2>";
							echo "<p id='valid'>Complaint is successfully added.</p>
							<p>Click <a href='citizen-lodgecomplainbehalf.php?citizenIC=".$citizenIC."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
							";
							echo "</div>";
						}
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
						echo "<h2>Invalid File!</h2>";
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
