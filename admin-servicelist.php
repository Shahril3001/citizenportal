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
							<h1 class="title-container">Service</h1>
							<img src='icon/icons8-services-64.png' class='statbox-title-img'/>
							<?php
								echo"
								<a href='admin-addservice.php?adminEmail=".$adminEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>Add (+)</button></a>
								";
							?>
							<h2 class='statbox-title-h2'>Service List</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$servicequery = dbConn()->prepare('SELECT * FROM service_category');
									$servicequery->execute();
									$servicelists = $servicequery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Name</th>
												<th>Image Icon</th>
												<th>Description</th>
												<th>Action</th>
											</tr>";
											foreach($servicelists as $servicelist){
											$cloneID++;
											$categoryID  = $servicelist->categoryID ;
											$categoryName = $servicelist->categoryName;
											$categoryDesc = $servicelist->categoryDesc;
											$categoryImg = $servicelist->categoryImg;

											echo "
											<tr>
												<td>$cloneID</td>
												<td width='25%'>$categoryName</td>
												<td width='20%'><img src='$categoryImg' alt='' width='48px' height='48px'></td>
												<td class='justify-contents'>$categoryDesc</td>
												<td width='10%'>
													<a href='admin-editservice.php?adminEmail=".$adminEmail."&categoryID=".$categoryID."&role=".$role."'><button class='button' id='editBtn'>Edit</button></a>
													<a href='admin-deleteservice.php?adminEmail=".$adminEmail."&categoryID=".$categoryID."&role=".$role."'><button class='button' id='deleteBtn'>Delete</button></a>
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
