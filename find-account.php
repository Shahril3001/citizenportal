<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Login</title>
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
					<img src='icon/icons8-find-user-96.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Find Account</h2>
					<hr>
					<form method="POST" action="find-account2.php" id="formpage">
						<table id="formtable">
							<tr>
								<th colspan="2">Find Account</th>
							</tr>
							<tr>
								<td><b>Name:</b></td>
								<td><input type='text' name='citizenName' class='forminput' placeholder='Name...' minlength='10'></td>
							</tr>
							<tr>
								<td><b>IC Number:</b></td>
								<td><input type='number' name='citizenIC' class='forminput' id='removeNumpointer' placeholder='IC Number...' minlength='8'></td>
							</tr>
							<tr>
								<td colspan="2"  id="buttonrow">
									<input id="submitBtn" class="button" type="submit" name="Submit" value="Submit">
									<input id="resetBtn" class="button" type="reset" name="reset" value="Reset"/></td>
							</tr>
						</table>
					</form>
					<script>
					CKEDITOR.replace( 'editor1' );
					</script>
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
