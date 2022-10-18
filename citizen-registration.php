<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Registration</title>
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
						<?php
							include 'breadcrumbs.php';
						?>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Registration</h1>
							<img src='icon/icons8-add-user-male-96.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Registration</h2>
							<hr>
							<div class="task-container">
								<?php
										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='citizen-registration2.php'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Registration</th>
													</tr>
													<tr>
														<td><b>*Name:</b></td>
														<td><input type='text' name='citizenName' placeholder=' Name...' minlength='10'></td>
													</tr>
													<tr>
														<td><b>*IC Number:</b></td>
														<td><input type='number' name='citizenIC' class='removeNumpointer' placeholder='IC Number...' minlength='8'></td>
													</tr>
													<tr>
														<td><b>*Email:</b></td>
														<td><input type='email' name='citizenEmail' placeholder='Email...'></td>
													</tr>
													<tr>
														<td><b>*Phone:</b></td>
														<td><input type='number' name='citizenPhone' class='removeNumpointer' placeholder='Phone No...' minlength='7'></td>
													</tr>

													<tr>
														<td><b>*Address:</b></td>
														<td><textarea name='citizenAddress' id='editor1' rows='5' cols='40%' placeholder='Address...'></textarea></td>
													</tr>
													<tr>
														<td><b>*Password:</b></td>
														<td><input type='password' name='citizenPassword' placeholder='Password...' minlength='8'></td>
													</tr>
													<tr>
														<td><b>Confirm Password:</b></td>
														<td><input type='password' name='citizenCPassword' placeholder='Password...' minlength='8'></td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='resetBtn' class='button' type='reset' name='reset' value='Reset'/>
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
