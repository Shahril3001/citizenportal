<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Home</title>
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
							<img src='icon/icons8-staff-96.png' class='statbox-title-img'/>
							<?php
								echo"
									<a href='admin-addstaff.php?adminEmail=".$adminEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>Add (+)</button></a>
								";
							?>
							<h2 class='statbox-title-h2'>Staff List</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$adminquery = dbConn()->prepare('SELECT * FROM admin');
									$adminquery->execute();
									$adminlists = $adminquery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Last Login</th>
												<th>Action</th>
											</tr>";
											foreach($adminlists as $adminlist){
											$cloneID++;
											$adminID = $adminlist->adminID;
											$adminName = $adminlist->adminName;
											$adminPhone = $adminlist->adminPhone;
											$adminEmail = $adminlist->adminEmail;
											$lastLogin = $adminlist->lastLogin;

											echo "
											<tr>
												<td>$cloneID</td>
												<td width='25%'>$adminName</td>
												<td>$adminPhone</td>
												<td width='20%'>$adminEmail</td>
												<td>$lastLogin</td>
												<td width='10%'>
													<a href='admin-viewadmin.php?adminEmail=".$adminEmail."&adminID=".$adminID."&role=".$role."'><button class='button' id='viewBtn'>View</button></a>
													<a href='admin-editadmin.php?adminEmail=".$adminEmail."&adminID=".$adminID."&role=".$role."'><button class='button' id='editBtn'>Edit</button></a>
													<a href='admin-deleteadmin.php?adminEmail=".$adminEmail."&adminID=".$adminID."&role=".$role."'><button class='button' id='deleteBtn'>Delete</button></a>
												</td>
											</tr>";
											}
											echo"</table>";
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