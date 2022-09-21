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
						<div>
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
									}

								echo"<h3>WELCOME ".strtoupper($adminName)."</h3></br>
								<p>[ Last Login: $lastLogin ]</p>";
							?>
						</div>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Admin Dashboard</h1>
							<img src='icon/icons8-complaints-96.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Complains Overview</h2><hr>
							<div class='statbox-item'>
								<div class='statbox-title'>Total complains</div>
								<div class='statbox-count-total'>20</div>
								<a href='#'><button class='button'>Go</button></a>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Open</div>
								<div class='statbox-count-total'>15</div>
								<a href='#'><button class='button'>Go</button></a>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Closed</div>
								<div class='statbox-count-total'>1</div>
								<a href='#'><button class='button'>Go</button></a>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Dropped</div>
								<div class='statbox-count-total'>4</div>
								<a href='#'><button class='button'>Go</button></a>
							</div><br><br>
							<img src='icon/icons8-feedback-96.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Feedbacks</h2><hr>
							<div class='statbox-item'>
								<div class='statbox-title'>Positive</div>
								<div class='statbox-count-total'>5</div>
								<a href='#'><button class='button'>Go</button></a>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Negative</div>
								<div class='statbox-count-total'>1</div>
								<a href='#'><button class='button'>Go</button></a>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Pending</div>
								<div class='statbox-count-total'>19</div>
								<a href='#'><button class='button'>Go</button></a>
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
