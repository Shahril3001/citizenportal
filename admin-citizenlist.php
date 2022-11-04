<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Home</title>
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
							<?php
								echo"
								<a href='admin-addcitizen.php?adminEmail=".$adminEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>Add (+)</button></a>
								";
							?>
							<h2 class='statbox-title-h2'>Citizen List</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$citizenquery = dbConn()->prepare('SELECT * FROM citizen');
									$citizenquery->execute();
									$citizenlists = $citizenquery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Detail</th>
												<th width='20%'>Last Login</th>
												<th width='14%'>Action</th>
											</tr>";
											foreach($citizenlists as $citizenlist){
											$cloneID++;
											$citizenID = $citizenlist->citizenID;
											$citizenIC = $citizenlist->citizenIC;
											$citizenName = $citizenlist->citizenName;
											$citizenPhone = $citizenlist->citizenPhone;
											$citizenEmail = $citizenlist->citizenEmail;
											$lastLogin = $citizenlist->lastLogin;
											$lastLogin = date('d M Y H:i:sa',strtotime($lastLogin));

											echo "
											<tr>
												<td>$cloneID</td>
												<td class='justify-contents'>
													<b>Name:</b> $citizenName<br>
													<b>IC Number:</b> $citizenIC<br>
													<b>Phone:</b> $citizenPhone<br>
													<b>Email:</b> <a href='mailto:$citizenEmail'>$citizenEmail</a><br>
												</td>
												<td>$lastLogin</td>
												<td>
													<a href='admin-editcitizen.php?adminEmail=".$adminEmail."&citizenIC=".$citizenIC."&role=".$role."'><button class='button' id='editBtn'>&#10227; Edit</button></a>
													<a href='admin-deletecitizen.php?adminEmail=".$adminEmail."&citizenIC=".$citizenIC."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
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
