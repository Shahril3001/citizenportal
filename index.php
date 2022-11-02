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
								<center><h3> ~ WELCOME TO ADUAN DARUSSALAM SITE ~</h3></br></center>
							<div class="wave"></div>
						</div>

						<div id="slideshow">
								<div id="slides">
										<?php
										include 'connection.php';
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
							<h1 class="title-container">Service Categories</h1>
							<?php

							$query1 = dbConn()->prepare('SELECT * FROM service_category');
							$query1->execute();
							$service_cates = $query1->fetchAll(PDO::FETCH_OBJ);

							foreach($service_cates as $service_cate){
								$categoryID = $service_cate->categoryID;
								$categoryName = $service_cate->categoryName;
								$categoryDesc = $service_cate->categoryDesc;
								$categoryImg = $service_cate->categoryImg;

								echo "
								<div class='box-item' >
									<div class='box-img bounce-7'><img src='$categoryImg' alt='' width='48px' height='48px'></div>
									<div class='box-title'>$categoryName</div>
									<div class='box-desc'>$categoryDesc</div>
									<a href='department.php?categoryName=".$categoryName."'><button class='button'>Go</button></a>
								</div>
								";
							}
							?>
						</div>

						<!--===============================================================================================-->

						<!-- CORE VALUES -->

						<h1 class="title-container">Role</h1>

						<div class="aboutRow">
						 		<div class="aboutGoal">
						   		<h1>01)	Provide consultancy and facilitation services</h1>
									<img src='icon/icons8-integrity-64.png' alt='' width='48px' height='48px'>
						   		<p>Provide advisory and consulting services to government agencies in the field of management and administration as well as handling public complaints against government services to strengthen and further improve the level of service delivery</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>02)	Implement public sector performance grading evaluation</h1>
									<img src='icon/icons8-best-seller-48.png' alt='' width='48px' height='48px'>
						   		<p>Facilitate core management assessment of government agencies for official recognition support to improve governance excellence</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>03)	Conduct research and development</h1>
									<img src='icon/icons8-improvement-50.png' alt='' width='48px' height='48px'>
						   		<p>Conduct research and development to produce creative and innovative ideas to further strengthen the management and administration system of the Public Service</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>04)	Introducing innovation and management improvements</h1>
									<img src='icon/icons8-citizen-64.png' alt='' width='48px' height='48px'>
						   		<p>Introducing and promoting reform and improvement programs involving management and administration to ensure efficient, effective and responsive public services</p>
						  	</div>
						  </div>

						  	<p>
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

			<script>

			</script>
	</body>
</html>
