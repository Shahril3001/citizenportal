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
							<h1 class="title-container">Slideshow</h1>
							<img src='icon/icons8-slideshow-64.png' class='statbox-title-img'/>
							<?php
								echo"
								<a href='admin-addslideshow.php?adminEmail=".$adminEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>Add (+)</button></a>
								";
							?>
							<h2 class='statbox-title-h2'>Slideshow List</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$slideshowquery = dbConn()->prepare('SELECT * FROM slideshow');
									$slideshowquery->execute();
									$slideshows = $slideshowquery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th width='20%'>Image</th>
												<th>Detail</th>
												<th width='10%'>Action</th>
											</tr>";
											foreach($slideshows as $slideshow){
											$cloneID++;
											$slideshowID  = $slideshow->slideshowID ;
											$slideshowImg = $slideshow->slideshowImg;
											$slideshowCaption = $slideshow->slideshowCaption;
											$addedBy = $slideshow->addedBy;
											$dateAdded  = $slideshow->dateAdded;

											echo "
											<tr>
												<td>$cloneID</td>
												<td><img src='$slideshowImg' alt='' width='200px' height='90px'></td>
												<td class='justify-contents'>
													<b>Caption:</b> $slideshowCaption<br>
													<b>Date Added:</b> $dateAdded<br>
													<b>Added By:</b> $addedBy<br>
												</td>
												<td>
													<a href='admin-editslideshow.php?adminEmail=".$adminEmail."&slideshowID=".$slideshowID."&role=".$role."'><button class='button' id='editBtn'>Edit</button></a>
													<a href='admin-deleteslideshow.php?adminEmail=".$adminEmail."&slideshowID=".$slideshowID."&role=".$role."'><button class='button' id='deleteBtn'>Delete</button></a>
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
