<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Services</title>
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
							<h1 class="title-container">Service</h1>
							<img src='icon/icons8-services-64.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Edit Service</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$categoryID=$_GET['categoryID'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM service_category WHERE categoryID="'. $categoryID .'"');
									$query->execute();
									$services = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($services as $service){
										$categoryName = $service->categoryName;
										$categoryDesc = $service->categoryDesc;
										$categoryImg = $service->categoryImg;

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' enctype='multipart/form-data' action='admin-editservice2.php?adminEmail=".$adminEmail."&role=".$role."&categoryID=".$categoryID."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Service</th>
													</tr>
													<tr>
														<td><b>*Category Name:</b></td>
														<td><input type='text' name='categoryName' class='forminput' placeholder='Title...' value='$categoryName'></td>
													</tr>
													<tr>
														<td><b>*Category Icon:</b></td>
															<td><p><input type='file' name='categoryImg'>Old picture:<img src='$categoryImg' alt='' height='50px' width='50px'></p>*PNG/JPG/JPEG file only.</td>
													</tr>
													<tr>
														<td><b>*Category Description:</b></td>
														<td><textarea name='categoryDesc' id='editor1' rows='5' cols='40%' placeholder='Description...'>$categoryDesc</textarea></td>
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
