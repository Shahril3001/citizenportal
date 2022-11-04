<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Staff</title>
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
												<th>Detail</th>
												<th width='20%'>Last Login</th>
												<th width='14%'>Action</th>
											</tr>";
											foreach($adminlists as $adminlist){
											$cloneID++;
											$adminID = $adminlist->adminID;
											$adminName = $adminlist->adminName;
											$adminPhone = $adminlist->adminPhone;
											$adminEmail = $adminlist->adminEmail;
											$lastLogin = $adminlist->lastLogin;
											$lastLogin = date('d M Y H:i:sa',strtotime($lastLogin));

											echo "
											<tr>
												<td>$cloneID</td>
												<td class='justify-contents'>
													<b>Name:</b> $adminName<br>
													<b>Phone:</b> $adminPhone<br>
													<b>Email:</b> $adminEmail<br>
												</td>
												<td>$lastLogin</td>
												<td>
													<a href='admin-editadmin.php?adminEmail=".$adminEmail."&adminID=".$adminID."&role=".$role."'><button class='button' id='editBtn'>&#10227; Edit</button></a>
													<a href='admin-deleteadmin.php?adminEmail=".$adminEmail."&adminID=".$adminID."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
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
