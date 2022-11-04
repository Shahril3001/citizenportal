<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | About</title>
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
				<!-- ABOUT SECTION -->


				<div class="main-container">
					<h1 class="title-container">About</h1>
					<img src='icon/icons8-history-64-1.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>History Background</h2>
					<hr>
						<div class="aboutRow">
							<div class="aboutColumn">
								 <img class='aboutimg' src="img/building.jpg" alt="Aduan Darussalam Headquarter" height='254em' width='100%'/>
								 <figcaption>Caption: Aduan Darussalam Headquarter</figcaption>
							</div>
							<div class="aboutColumn">
								<h1>Establishment of the Department</h1>
								<hr>
								<p>
									Management Services Unit (MSU) was established under the Personnel Office on 1 January 1982. Starting on 1 August 1993 MSU was known as the Management Service Department (MSD). Since its establishment, several main programs / projects towards reform and improvement have been planned and implemented, including the Performance Evaluation System for Public Service Officers and Staff, the Civil Service Review Program (CSR), the establishment of the Public Service Reform Committee (JPPA), the establishment of the Workers' Trust fund, the Outstanding Public Service Award, Public Service Day and the Determination of Public Concern (TPOR).
								</p>
							</div>
							<div class="aboutColumn">
								<p>
									The public's expectations of the quality of service delivery by government agencies are increasing and becoming more sophisticated. Therefore, the role of MSD also increased and focused on the introduction of initiatives that emphasize customer-oriented services including updating and strengthening systems / procedures through Business Process Reengineering (BPR) and encouraging coordination between government agencies in achieving 21st Century Public Service 	Vision and Brunei Vision 2035.<br><br>
									MSD has also received the recognition and certification of PBD ISO 9001:2008 Quality Management System on 20 March 2012. With the certification, MSD continues to strive to improve the level of service delivery comparable to international standards, in addition to giving more confidence to interested parties (stakeholders) towards responsible service.
								</p>
							</div>
							<div class="aboutColumn">
								<p>
									In order to ensure that MSD citizens are always ready to face various challenges, the priority is to provide improvement, strengthening the capabilities and skills of officers through capacity development programs such as Certificate Management Consulting Essential (CMCE), attending short or long-term courses / training either domestically or abroad.
								</p>
							</div>
						</div>
						<img src='icon/icons8-goal-96.png' class='statbox-title-img'/>
						<h2 class='statbox-title-h2'>Mission & Vision</h2>
						<hr>
						<div class="aboutRow">
						 		<div class="aboutGoal">
						   		<h1>Mission</h1>
									<img src='icon/icons8-mission-96.png' alt='' width='48px' height='48px'>
						   		<p>Providing High Quality Management Consulting Services To Stakeholders To Achieve Public Service Excellence</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>Vision</h1>
									<img src='icon/icons8-vision-64.png' alt='' width='48px' height='48px'>
						   		<p>Become a Public Service Main Choice Management Consultant</p>
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
