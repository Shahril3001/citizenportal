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
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Staff</h1>
							<img src='icon/icons8-staff-96.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Edit Staff</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$adminEmail=$_GET['adminEmail'];
									$role=$_GET['role'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM admin WHERE adminEmail="'. $adminEmail .'"');
									$query->execute();
									$admins = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($admins as $admin){
										$adminName = $admin->adminName;
										$adminPhone = $admin->adminPhone;
										$adminEmail = $admin->adminEmail;
										$adminPassword = $admin->adminPassword;

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-editadmin2.php?adminEmail=".$adminEmail."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Staff</th>
													</tr>
													<tr>
														<td><b>*Name</b></td>
														<td><input type='text' name='adminName' class='forminput' placeholder='Name...' value='$adminName'></td>
													</tr>
													<tr>
														<td><b>Email</b></td>
														<td><input type='email' class='forminput' placeholder='Email...' value='$adminEmail' readonly></td>
													</tr>
													<tr>
														<td><b>*Phone</b></td>
														<td><input type='number' name='adminPhone'  class='forminput' id='removeNumpointer' placeholder='Phone No...' value='$adminPhone' minlength='7'></td>
													</tr>
													<tr>
														<td><b>*Password</b></td>
														<td><input type='password' name='adminPassword' placeholder='Password...' value='$adminPassword' minlength='8'></td>
													</tr>
													<tr>
														<td><b>Confirm Password</b></td>
														<td><input type='password' name='adminCPassword' placeholder='Password...' value='$adminPassword' minlength='8'></td>
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
