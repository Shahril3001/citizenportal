<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Citizen</title>
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
							<h1 class="title-container">Citizen</h1>
							<img src='icon/icons8-citizen-64.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>View Citizen</h2>
							<hr>
							<div class="task-container">
								<?php
										$citizenIC=$_GET['citizenIC'];
										include 'connection.php';

											$citizenquery = dbConn()->prepare('SELECT * FROM citizen WHERE citizenIC="'. $citizenIC .'"');
											$citizenquery->execute();
											$citizenlists = $citizenquery->fetchAll(PDO::FETCH_OBJ);
											foreach($citizenlists as $citizenlist){
											$citizenName = $citizenlist->citizenName;
											$citizenIC = $citizenlist->citizenIC;
											$citizenEmail = $citizenlist->citizenEmail;
											$citizenPhone = $citizenlist->citizenPhone;
											$citizenAddress = $citizenlist->citizenAddress;

										echo "
											<p>Citizen details.</p>
											<form>
												<table id='formtable'>
													<tr>
														<th colspan='2'>View Citizen</th>
													</tr>
													<tr>
														<td width='30%'><b>Name:</b></td>
														<td>$citizenName</td>
													</tr>
													<tr>
														<td><b>IC Number:</b></td>
														<td>$citizenIC</td>
													</tr>
													<tr>
														<td><b>Email:</b></td>
														<td>$citizenEmail</td>
													</tr>
													<tr>
														<td><b>Phone:</b></td>
														<td>$citizenPhone</td>
													</tr>
													<tr>
														<td><b>Address:</b></td>
														<td>$citizenAddress</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></center>
														</td>
													</tr>
												</table>
											</form>
										";
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
