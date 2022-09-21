<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Staff</title>
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
							<h1 class="title-container">Staff</h1>
							<div class="task-container">
								<?php
										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-addstaff2.php?adminEmail=".$adminEmail."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Add Staff</th>
													</tr>
													<tr>
														<td><b>*Name</b></td>
														<td><input type='text' name='adminName' placeholder=' Name...'></td>
													</tr>
													<tr>
														<td><b>*Email</b></td>
														<td><input type='email' name='adminEmail' placeholder='Email...'></td>
													</tr>
													<tr>
														<td><b>*Phone</b></td>
														<td><input type='number' name='adminPhone' class='removeNumpointer' placeholder='Phone No...' minlength='7'></td>
													</tr>
													<tr>
														<td><b>*Password</b></td>
														<td><input type='password' name='adminPassword' placeholder='Password...' minlength='8'></td>
													</tr>
													<tr>
														<td><b>Confirm Password</b></td>
														<td><input type='password' name='adminCPassword' placeholder='Password...' minlength='8'></td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center>
																<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
																<input id='resetBtn' class='button' type='reset' name='reset' value='Reset'/>
															</center>
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
