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
							<h1 class="title-container">service categories</h1>
							<?php
							$cloneID = 0;
							include 'connection.php';
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
			?>
	</body>
</html>
