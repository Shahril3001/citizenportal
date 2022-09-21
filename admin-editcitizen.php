<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Citizen</title>
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
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$citizenID=$_GET['citizenID'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM citizen WHERE citizenID="'. $citizenID .'"');
									$query->execute();
									$citizens = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($citizens as $citizen){
										$citizenID = $citizen->citizenID;
										$citizenIC = $citizen->citizenIC;
										$citizenName = $citizen->citizenName;
										$citizenEmail = $citizen->citizenEmail;
										$citizenPhone = $citizen->citizenPhone;
										$citizenAddress = $citizen->citizenAddress;
										$citizenPassword = $citizen->citizenPassword;

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-editcitizen2.php?adminEmail=".$adminEmail."&role=".$role."&citizenID=".$citizenID."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Citizen</th>
													</tr>
													<tr>
														<td><b>*Name</b></td>
														<td><input type='text' name='citizenName' placeholder='Name...' value='$citizenName'></td>
													</tr>
													<tr>
														<td><b>IC Number</b></td>
														<td><input type='number' class='removeNumpointer' placeholder='IC Number...' value='$citizenIC' readonly></td>
													</tr>
													<tr>
														<td><b>Email</b></td>
														<td><input type='email' placeholder='Email...' value='$citizenEmail' readonly></td>
													</tr>
													<tr>
														<td><b>*Phone</b></td>
														<td><input type='number' name='citizenPhone' class='removeNumpointer' placeholder='Phone No...' value='$citizenPhone' minlength='7'></td>
													</tr>
													<tr>
														<td><b>*Address</b></td>
														<td>
															<textarea name='citizenAddress' rows='4' cols='46%'>$citizenAddress</textarea>
														</td>
													</tr>
													<tr>
														<td><b>*Password</b></td>
														<td><input type='password' name='citizenPassword' placeholder='Password...' value='$citizenPassword' minlength='8'></td>
													</tr>
													<tr>
														<td><b>Confirm Password</b></td>
														<td><input type='password' name='citizenCPassword' placeholder='Password...' value='$citizenPassword' minlength='8'></td>
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
