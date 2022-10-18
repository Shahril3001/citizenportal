<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Contact</title>
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
			<!-- Sidebar -->
			<!--===============================================================================================-->
			<main>
				<!--===============================================================================================-->
				<div class="main-container">
					<h1 class="title-container">Login</h1>
						<div class="row">
							<div class="logincontainer">
								<button class="logintab" id="citizenLogBtn"><h5>Citizen</h5></button>
								<button class="logintab" id="adminLogBtn"><h5>Employee</h5></button>
								<div class="detail" id="citizenTab">
									<p>Required fields are marked with an asterisk (*).</p>
									<form method="POST" action="login-citizen.php">
										<table id="formtable" width='97%'>
											<tr>
												<th colspan="2">Citizen</th>
											</tr>
											<tr>
												<td><b>IC Number:</b></td>
												<td><input type="text" name="citizenIC"></td>
											</tr>
											<tr>
												<td><b>Password:</b></td>
												<td><input type="password" name="citizenPassword"></td>
											</tr>
											<tr>
												<td style="border:none;" colspan="2"  id="buttonrow">
													<input id="submitBtn" class="button" type="submit" name="Submit1" value="Submit">
													<input id="resetBtn" class="button" type="reset" name="reset" value="Reset"/>
												</td>
											</tr>
										</table>
									</form>
									<p>Forgot username or password? Please click <a href='find-account.php'>Find Account</a>.</p>
									<p>Don't have any account yet? Click <a href='citizen-registration.php'>Register</a> to create new account.</p>
								</div>
								<div class="detail" id="adminTab">
									<p>Required fields are marked with an asterisk (*).
										<span id='onlyforAdmin'> #Restricted site. Only for administrators.</span>
									</p>
									<form method="POST" action="login-admin.php">
										<table id="formtable" width='97%'>
											<tr>
												<th colspan="2">Employee</th>
											</tr>
											<tr>
												<td><b>Name:</b></td>
												<td><input type="text" name="adminName"></td>
											</tr>
											<tr>
												<td><b>Password:</b></td>
												<td><input type="password" name="adminPassword"></td>
											</tr>
											<tr>
												<td style="border:none;" colspan="2"  id="buttonrow">
													<input id="submitBtn" class="button" type="submit" name="Submit" value="Submit">
													<input id="resetBtn" class="button" type="reset" name="reset" value="Reset"/>
												</td>
											</tr>
										</table>
									</form>
								</div>
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
