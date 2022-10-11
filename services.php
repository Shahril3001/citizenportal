<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Services</title>
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
			<!-- Sidebar -->
			<!--===============================================================================================-->
			<main>
				<!--===============================================================================================-->
				<div class="main-container">
					<div>
						<h1 class="title-container">service</h1>
						<img src='icon/icons8-services-64.png' class='statbox-title-img'/>
						<h2 class='statbox-title-h2'>Service List</h2>
						<hr>
						<div class="search-container">
							<form method='POST' action=''>
						   	<input class="search-input" type="text" placeholder="Search">
							</form>
						</div>
						<?php
						include 'connection.php';
						$query1 = dbConn()->prepare('SELECT * FROM service_category ORDER BY  categoryName ASC');
						$query1->execute();
						$service_cates = $query1->fetchAll(PDO::FETCH_OBJ);

						foreach($service_cates as $service_cate){
							$categoryID = $service_cate->categoryID;
							$categoryName = $service_cate->categoryName;
							$categoryDesc = $service_cate->categoryDesc;
							$categoryImg = $service_cate->categoryImg;

							echo "
							<div class='box-item'>
								<div class='box-img bounce-7'><img src='$categoryImg' alt='' width='48px' height='48px'></div>
								<div class='box-title'>$categoryName</div>
								<div class='box-desc'>$categoryDesc</div>
								<a href='login.php'><button class='button'>Click</button></a>
							</div>
							";
							}
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
		?>
	</body>
</html>
