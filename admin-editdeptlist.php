<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Department</title>
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
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Department</h1>
							<img src='icon/icons8-department-48.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Edit Department</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$listID=$_GET['listID'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM service_list WHERE listID="'. $listID .'"');
									$query->execute();
									$departments = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($departments as $department){
										$listTitle = $department->listTitle;
										$listCategory = $department->listCategory;
										$listDesc = $department->listDesc;
										$listGuideline = $department->listGuideline;
										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-editdeptlist2.php?adminEmail=".$adminEmail."&role=".$role."&listID=".$listID."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Department</th>
													</tr>
													<tr>
														<td><b>Title:</b></td>
														<td><input type='text' name='listTitle' class='forminput' placeholder='Title...' value='$listTitle' required></td>
													</tr>
													<tr>
														<td><b>Category Service:</b></td>
														<td><select name='listCategory' id='listCategory' required>";
																echo"<option value='$listCategory'>Select a category...</option>";
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
														<td><textarea name='listDesc' id='editor' rows='5' cols='40%' placeholder='Description...'>$listDesc</textarea></td>
													</tr>
													<tr>
														<td><b>Guideline Description:</b></td>
														<td><textarea name='listGuideline'  id='editor1' rows='5' cols='40%' placeholder='Guideline...'>$listGuideline</textarea></td>
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
												CKEDITOR.replace( 'editor' );
												CKEDITOR.replace( 'editor1' );
											</script>
										";
										}
									}
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
