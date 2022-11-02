<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="style.css">
		<!--===============================================================================================-->
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
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
					<div class="main-container">
						<?php
							include 'breadcrumbs.php';
						?>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Department</h1>
							<img src='icon/icons8-department-48.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Add Department</h2>
							<hr>
							<div class="task-container">
								<?php
										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-adddeptlist2.php?adminEmail=".$adminEmail."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Add Department</th>
													</tr>
													<tr>
														<td><b>Title:</b></td>
														<td><input type='text' name='listTitle'  class='forminput' placeholder='Your Title...'></td>
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
																	$categoryName  = $servicelist->categoryName;
																  	echo"<option value='$categoryName'>$categoryName</option>";
																}
																echo"</select>
														</td>
													</tr>
													<tr>
														<td><b>Description:</b></td>
														<td><textarea name='listDesc' id='editor' rows='10' cols='60%' placeholder='Your Description...'></textarea></td>
													</tr>
													<tr>
														<td><b>Guideline Description:</b></td>
														<td><textarea name='listGuideline'  id='editor1' rows='10' cols='60%' placeholder='Your Guideline...'></textarea></td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center>
																<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
																<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
															</center>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace('editor');
												CKEDITOR.replace('editor1');
											</script>
										";
								?>
							</div>
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
