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
								if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$adminemail=$_GET['adminEmail'];
									$role=$_GET['role'];
									include 'connection.php';
									$query1 = dbConn()->prepare('SELECT * FROM admin WHERE adminEmail="'. $adminEmail .'"');
									$query1->execute();
									$admins = $query1->fetchAll(PDO::FETCH_OBJ);
									foreach($admins as $admin){
										$adminName = $admin->adminName;
										$adminPhone = $admin->adminPhone;
										$adminEmail = $admin->adminEmail;
										$adminPassword = $admin->adminPassword;
										$lastLogin = $admin->lastLogin;
										$lastLogin = date('d F Y H:i:s A',strtotime($lastLogin));
									}

								echo"<center><h3>~ WELCOME, ".strtoupper($adminName)." ~</h3></br>
								<p>[ Last Login: $lastLogin ]</p></center>";
							?>
							<div class="wave"></div>
						</div>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Admin Dashboard</h1>
							<img src='icon/icons8-complain-64.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Complains Overview (Self-Report)</h2><hr>
							<?php
								function countTotalstatus($complaintStatus) {
									$conditionquery = dbConn()->prepare("SELECT * FROM complaints WHERE complaintStatus='$complaintStatus'");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();

									$overallquery = dbConn()->prepare("SELECT * FROM complaints");
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
									$conditionquery = dbConn()->prepare("SELECT * FROM complaintsbehalf WHERE complaintStatus='$complaintStatus'");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();


									$overallquery = dbConn()->prepare("SELECT * FROM complaintsbehalf");
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
									$conditionquery = dbConn()->prepare("SELECT * FROM feedback WHERE feedbackType='$feedbackType' ");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();


									$overallquery = dbConn()->prepare("SELECT * FROM feedback");
									$overallquery->execute();
									$overallnum_count = $overallquery->rowCount();

									$counttotal= $conditionnum_count/$overallnum_count * 100;

									return number_format($counttotal);
								}
							?>
							<div class='statbox-item'>
								<div class='statbox-title'>Positive</div>
								<?php
									$feedbackType="Positive";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Negative</div>
								<?php
									$feedbackType="Negative";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Pending</div>
								<?php
									$feedbackType="Pending";
									echo "<div class='statbox-pie' style='--p:". countTotal($feedbackType) .";'>". countTotal($feedbackType) ."%</div>";
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
				}
			?>
	</body>
</html>
