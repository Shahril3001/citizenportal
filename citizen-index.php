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
									$adminemail=$_GET['citizenIC'];
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
									}
								echo"<center><h3> ~ WELCOME, ".strtoupper($citizenName)." ~ </h3></br>
								<p>[ Last Login: $lastLogin ]</p></center>";
							?>
							<div class="wave"></div>
						</div>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Citizen Dashboard</h1>
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
						<div>
							<h1 class="title-container">service categories</h1>
							<?php
							$cloneID = 0;
							$query = dbConn()->prepare('SELECT * FROM slideshow');
							$query->execute();
							$slideshows = $query->fetchAll(PDO::FETCH_OBJ);
							$num_count = $query->rowCount();

							foreach($slideshows as $slideshow){
								$cloneID++;
								$slideshowID = $slideshow->slideshowID;
								$slideshowImg = $slideshow->slideshowImg;
								$slideshowCaption = $slideshow->slideshowCaption;

							echo"
							<div class='slideshow-container'>
								<div class='mySlides fade'>
								<div class='slideshow-numbertext'>$cloneID / $num_count</div>
								<img class='slideshow-img' src='$slideshowImg'>
								<div class='slideshow-caption'>$slideshowCaption</div>
							</div>
							";
							}
							echo"<div class='slideshow-container-dot'>";
							for ($x = 0; $x <= ($num_count-1); $x++) {
							  echo "<span class='slideshow-dot'></span>";
							}
							echo"</div>";
							?>
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
				include 'slideshow_connection.php';
				}
			?>
	</body>
</html>
