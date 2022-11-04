<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Lodge a Complain</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="style.css">
		<!--===============================================================================================-->
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="sßtylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
		<!--===============================================================================================-->
		<script src="ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<!--===============================================================================================-->
		<div id="wrapper">
			<?php
				include 'header_bar.php';
				include 'navigation_bar.php';
			?>

			<!-- Sidebar -->

			<div id="mySidenav" class="side-nav"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<!-- - -->
				<?php
				include 'side.php';
				?>
				<!-- - -->
			</div>

			<!--===============================================================================================-->
			<main>

			<!--===============================================================================================-->
				<div class="main-container">
					<h1 class="title-container">Lodge a Complain</h1>
					<img src='icon/icons8-complain-64.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Complaint(Self-Report)</h2>
					<hr>
					<div class="task-container">
									<br>

									<?php
											if(isset($_GET['listID'])){
												$listID=$_GET['listID'];
												echo "<p>Required fields are marked with an asterisk (*). If you are on someone's behalf, please click <a href='citizen-lodgecomplainbehalf.php?listID=".$listID."&citizenIC=".$citizenIC."&role=".$role."'>here.</a></p>";
											}else{
												echo "<p>Required fields are marked with an asterisk (*). If you are on someone's behalf, please click <a href='citizen-lodgecomplainbehalf.php?citizenIC=".$citizenIC."&role=".$role."'>here.</a></p>";
											}
											echo"
											<form method='POST' enctype='multipart/form-data' action='citizen-lodgecomplain2.php?citizenIC=".$citizenIC."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Complain</th>
													</tr>
													<tr>
														<td><b>*Subject:</b></td>
														<td><input type='text' name='complaintSubject' class='forminput' placeholder=' Subject...' required></td>
													</tr>
													<tr>
														<td><b>*Complaint:</b></td>
														<td><textarea name='complaint' name='complaint' id='editor1' rows='5' cols='50%' placeholder=' Complaint...' minlength='5' required></textarea></td>
													</tr>

													<tr>
														<td><b>Complaint Department:</b></td>
														<td><select name='listID' id='listID' class='forminput' required>";
																include 'connection.php';
																if(isset($_GET['listID'])){
																	$selectservicelistquery = dbConn()->prepare("SELECT * FROM service_list WHERE  listID='$listID'");
																	$selectservicelistquery->execute();
																	$selectservicelists = $selectservicelistquery->fetchAll(PDO::FETCH_OBJ);
																	foreach($selectservicelists as $selectservicelist){
																		$listID  = $selectservicelist->listID;
																		$listTitle   = $selectservicelist->listTitle;
																		$listCategory    = $selectservicelist->listCategory;
																	  echo"<option value='$listID'>$listCategory | $listTitle</option>";
																	}
																	echo"<option>Select a department...</option>";
																}else{
																	echo"<option>Select a department...</option>";
																}

																$servicelistquery = dbConn()->prepare("SELECT * FROM service_list ORDER BY listCategory ASC");
																$servicelistquery->execute();
																$servicelists = $servicelistquery->fetchAll(PDO::FETCH_OBJ);

																foreach($servicelists as $servicelist){
																	$listID  = $servicelist->listID;
																	$listTitle   = $servicelist->listTitle;
																	$listCategory    = $servicelist->listCategory;
																  echo"<option value='$listID'>$listCategory | $listTitle</option>";
																}
																echo"</select>
														</td>
													</tr>

													<tr>
														<td><b>*Location of Accident / Event:</b></td>
														<td><input type='text' name='location' class='forminput' placeholder=' Location...' minlength='5' size='50' required></td>
													</tr>

													<tr>
														<td><b>*Date of Accident / Event:</b></td>
														<td><input type='date' name='date' placeholder=' Date...' size='50' required></td>
													</tr>

													<tr>
														<td><b>*Image:</b></td>
														<td><input type='file' name='complaintImage' required> *PNG/JPG/JPEG file only.</td>
													</tr>

													<tr>
														<td><b>*Relevant Document:</b></td>
														<td><input type='file' name='complaintDocument' required> *RAR/DOC/DOCX/PDF file only.</td>
													</tr>

													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
										";
								?>


				</div>
			</div>

			</main>


			<!--===============================================================================================-->
			<footer>
				<?php
					include 'footer_bar.php';
				?>
	    </footer>
			<!--===============================================================================================-->
		</div>

		<!-- Back to top -->
		<?php
			include 'btnBacktoTop.php';
			include 'js_connection.php';
		?>
	</body>
</html>
