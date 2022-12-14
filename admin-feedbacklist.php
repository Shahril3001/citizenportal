<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Feedback</title>
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
							<h1 class="title-container">Feedback</h1>
							<img src='icon/icons8-feedback-96.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Feedback List</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$feedbackquery = dbConn()->prepare('SELECT * FROM feedback');
									$feedbackquery->execute();
									$feedbacklists = $feedbackquery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Detail</th>
												<th>Date</th>
												<th>Action</th>
											</tr>";
											foreach($feedbacklists as $feedbacklist){
											$cloneID++;
											$feedbackID  = $feedbacklist->feedbackID ;
											$citizenName = $feedbacklist->citizenName;
											$citizenIC = $feedbacklist->citizenIC;
											$subjectF = $feedbacklist->subjectF;
											$feedbackType = $feedbacklist->feedbackType;
											$emailF = $feedbacklist->emailF;
											$commentF = $feedbacklist->commentF;
											$dateF = $feedbacklist->dateF;
											$dateF = date('d M Y H:i:sa',strtotime($dateF));

											$citizenquery = dbConn()->prepare('SELECT * FROM citizen WHERE citizenName="'. $citizenName .'"');
											$citizenquery->execute();
											$citizenlists = $citizenquery->fetchAll(PDO::FETCH_OBJ);
											foreach($citizenlists as $citizenlist){
											$citizenIC = $citizenlist->citizenIC;

											echo "
											<tr>
												<td>$cloneID</td>
												<td class='justify-contents'>
													<b>Fullname:</b> <a href='admin-viewcitizen.php?adminEmail=".$adminEmail."&citizenIC=".$citizenIC."&role=".$role."'>$citizenName</a><br>
													<b>Email:</b> <a href='mailto:$emailF'>$emailF</a><br>
													<b>Subject:</b> $subjectF<br>
													<b>Type:</b> $feedbackType<br>
												</td>
												<td width='20%'>$dateF</td>
												<td width='14%'>
													<a href='admin-viewfeedback.php?adminEmail=".$adminEmail."&feedbackID=".$feedbackID."&role=".$role."'><button class='button' id='viewBtn'>&#x1f441; View</button></a>
													<a href='admin-deletefeedback.php?adminEmail=".$adminEmail."&feedbackID=".$feedbackID."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
												</td>
											</tr>";
											}
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
