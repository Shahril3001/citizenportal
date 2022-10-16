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
										echo "
											<p>Required fields are marked with an asterisk (*). If you are on someone's behalf, please click <a href='citizen-lodgecomplainbehalf.php?citizenIC=".$citizenIC."&role=".$role."'>here.</a></p>
											<form method='POST' enctype='multipart/form-data' action='citizen-lodgecomplain2.php?citizenIC=".$citizenIC."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Complain</th>
													</tr>
													<tr>
														<td><b>*Subject:</b></td>
														<td><input type='text' name='complaintSubject' placeholder=' Subject...'></td>
													</tr>
													<tr>
														<td><b>*Complaint:</b></td>
														<td><textarea name='complaint' name='complaint' id='editor1' rows='5' cols='50%' placeholder=' Complaint...' minlength='5'></textarea></td>
													</tr>

													<tr>
														<td><b>*Location of Accident / Event:</b></td>
														<td><input type='text' name='location' placeholder=' Location...' minlength='5' size='50'></td>
													</tr>

													<tr>
														<td><b>*Date of Accident / Event:</b></td>
														<td><input type='date' name='date' placeholder=' Date...' size='50'></td>
													</tr>

													<tr>
														<td><b>Category Service:</b></td>
														<td><select name='listCategory' id='listCategory'>";
																echo"<option>Select a category...</option>";
																include 'connection.php';
																$servicequery = dbConn()->prepare("SELECT * FROM service_category");
																$servicequery->execute();
																$servicelists = $servicequery->fetchAll(PDO::FETCH_OBJ);

																foreach($servicelists as $servicelist){
																	$categoryID  = $servicelist->categoryID;
																	$categoryName  = $servicelist->categoryName;
																  	echo"<option value='$categoryName'>$categoryName</option>";
																}
																echo"</select>
														</td>
													</tr>
													<tr>
														<td><b>Image:</b></td>
														<td><input type='file' name='complaintImage'></td>
													</tr>

													<tr>
														<td><b>Relevant Document:</b></td>
														<td><input type='file' name='complaintDocument'></td>
													</tr>

													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='resetBtn' class='button' type='reset' name='reset' value='Reset'/>
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
