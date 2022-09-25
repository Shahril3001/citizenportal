<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Service</title>
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
						<?php
							include 'breadcrumbs.php';
						?>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Service</h1>
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$slideshowID=$_GET['slideshowID'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM slideshow WHERE slideshowID="'. $slideshowID .'"');
									$query->execute();
									$slideshows = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($slideshows as $slideshow){
										$slideshowImg = $slideshow->slideshowImg;
										$slideshowCaption = $slideshow->slideshowCaption;

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' enctype='multipart/form-data' action='admin-editslideshow2.php?adminEmail=".$adminEmail."&role=".$role."&slideshowID=".$slideshowID."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Service</th>
													</tr>
													<tr>
														<td><b>*Caption</b></td>
														<td><input type='text' name='slideshowCaption' placeholder='Title...' value='$slideshowCaption'></td>
													</tr>
													<tr>
														<td><b>*Slideshow Image</b></td>
															<td><p><input type='file' name='slideshowImg'>Old picture: <img src='$slideshowImg' alt='' height='50px' width='120px'></p></td>
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
