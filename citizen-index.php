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
						<div class='greeting'>
							<?php
								if(isset($_GET['citizenIC'])&& isset($_GET['role'])){
									$citizenIC=$_GET['citizenIC'];
									$role=$_GET['role'];
									include 'connection.php';
									$query1 = dbConn()->prepare('SELECT * FROM citizen WHERE citizenIC="'. $citizenIC .'"');
									$query1->execute();
									$citizens = $query1->fetchAll(PDO::FETCH_OBJ);
									foreach($citizens as $citizen){
										$citizenID = $citizen->citizenID;
										$citizenIC = $citizen->citizenIC;
										$citizenName = $citizen->citizenName;
										$citizenPhone = $citizen->citizenPhone;
										$citizenEmail = $citizen->citizenEmail;
										$lastLogin = $citizen->lastLogin;
										$lastLogin = date('d F Y H:i:s A',strtotime($lastLogin));
									}
								echo"<center><h3> ~ WELCOME, ".strtoupper($citizenName)." ~ </h3></br>
								<p>[ Last Login: $lastLogin ]</p></center>";
							?>
							<div class="wave"></div>
						</div>
						<!--===============================================================================================-->
						<div id="slideshow">
								<div id="slides">
										<?php
										$cloneID = 0;
										$query = dbConn()->prepare('SELECT * FROM slideshow ORDER BY dateAdded LIMIT 5');
										$query->execute();
										$slideshows = $query->fetchAll(PDO::FETCH_OBJ);
										$num_count = $query->rowCount();

										foreach($slideshows as $slideshow){
											$cloneID++;
											$slideshowID = $slideshow->slideshowID;
											$slideshowImg = $slideshow->slideshowImg;
											$slideshowCaption = $slideshow->slideshowCaption;

											echo"<div class='slide show' data-slide='$cloneID'>
													<img src='$slideshowImg' alt='$slideshowCaption'>

													<div class='slide-content'>
															<span class='slide-title'>$slideshowCaption</span>
													</div>
											</div>";
										}
										?>

										<div class="slide-btn next">
												<span>&raquo;</span>
										</div>

										<div class="slide-btn prev">
												<span>&laquo;</span>
										</div>
								</div>

								<div id="gallery">
										<?php
										foreach($slideshows as $slideshow){
											$slideshowID = $slideshow->slideshowID;
											$slideshowImg = $slideshow->slideshowImg;
											$slideshowCaption = $slideshow->slideshowCaption;

											echo"<div class='thumbnail' data-slide='$cloneID'>
														<img src='$slideshowImg' alt='$slideshowCaption'>

														<div class='slide-content'>
																<span class='slide-title'>$slideshowCaption</span>
														</div>
												</div>";
											}
										?>
								</div>
						</div>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Citizen Dashboard</h1>
							<img src='icon/icons8-complain-64.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Complains Overview (Self-Report)</h2><hr>
							<?php
								function countTotalstatus($complaintStatus) {
									$citizenIC=$_GET['citizenIC'];
									$conditionquery = dbConn()->prepare("SELECT * FROM complaints WHERE citizenIC='$citizenIC' AND  complaintStatus='$complaintStatus'");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();


									$overallquery = dbConn()->prepare("SELECT * FROM complaints WHERE citizenIC='$citizenIC'");
									$overallquery->execute();
									$overallnum_count = $overallquery->rowCount();

									$counttotal= $conditionnum_count/$overallnum_count * 100;

									return number_format($counttotal);
								}
							?>
							<div class='statbox-item'>
								<div class='statbox-title'>Open</div>
								<?php
									$complaintStatus="Open";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus($complaintStatus) .";'>". countTotalstatus($complaintStatus) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Closed</div>
								<?php
									$complaintStatus="Closed";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus($complaintStatus) .";'>". countTotalstatus($complaintStatus) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Dropped</div>
								<?php
									$complaintStatus="Dropped";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus($complaintStatus) .";'>". countTotalstatus($complaintStatus) ."%</div>";
								?>
							</div><br><br>


							<img src='icon/icons8-complain-64-1.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Complains Overview (On Behalf)</h2><hr>
							<?php
								function countTotalstatus2($complaintStatus) {
									$citizenIC=$_GET['citizenIC'];
									$conditionquery = dbConn()->prepare("SELECT * FROM complaintsbehalf WHERE citizenIC='$citizenIC' AND  complaintStatus='$complaintStatus'");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();

									$overallquery = dbConn()->prepare("SELECT * FROM complaintsbehalf WHERE citizenIC='$citizenIC'");
									$overallquery->execute();
									$overallnum_count = $overallquery->rowCount();

									$counttotal= $conditionnum_count/$overallnum_count * 100;

									return number_format($counttotal);
								}
							?>
							<div class='statbox-item'>
								<div class='statbox-title'>Open</div>
								<?php
									$complaintStatus="Open";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus2($complaintStatus) .";'>". countTotalstatus2($complaintStatus) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Closed</div>
								<?php
									$complaintStatus="Closed";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus2($complaintStatus) .";'>". countTotalstatus2($complaintStatus) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Dropped</div>
								<?php
									$complaintStatus="Dropped";
									echo "<div class='statbox-pie' style='--p:". countTotalstatus2($complaintStatus) .";'>". countTotalstatus2($complaintStatus) ."%</div>";
								?>
							</div><br><br>


							<img src='icon/icons8-feedback-96.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Feedbacks</h2><hr>
							<?php
							function countTotal($feedbackType) {
								$citizenIC=$_GET['citizenIC'];

								$conditionquery = dbConn()->prepare("SELECT * FROM feedback WHERE citizenIC='$citizenIC' AND  feedbackType='$feedbackType' ");
								$conditionquery->execute();
								$conditionnum_count = $conditionquery->rowCount();

								$overallquery = dbConn()->prepare("SELECT * FROM feedback WHERE citizenIC='$citizenIC'");
								$overallquery->execute();
								$overallnum_count = $overallquery->rowCount();

								$counttotal= $conditionnum_count/$overallnum_count * 100;

								return number_format($counttotal);
							}
							?>
							<div class='statbox-item'>
								<div class='statbox-title'>Suggestion</div>
								<?php
									$feedbackType="Suggestion";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Complaint</div>
								<?php
									$feedbackType="Complaint";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Report</div>
								<?php
									$feedbackType="Report";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
								?>
							</div>

						</div>
						<div>
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
				include 'slideshow_connection.php';
				}
			?>
	</body>
</html>
