<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Feedback</title>
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
						<?php
							include 'breadcrumbs.php';
						?>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Feedback</h1>
							<div class="task-container">
								<?php
										$feedbackID=$_GET['feedbackID'];
										include 'connection.php';
										$feedBackquery = dbConn()->prepare("SELECT * FROM feedback WHERE feedbackID='$feedbackID'");
										$feedBackquery->execute();
										$feedbacks = $feedBackquery->fetchAll(PDO::FETCH_OBJ);

										foreach($feedbacks as $feedback){
											$feedbackID = $feedback->feedbackID;
											$senderF = $feedback->senderF;
											$subjectF = $feedback->subjectF;
											$emailF = $feedback->emailF;
											$commentF = $feedback->commentF;
											$dateF = $feedback->dateF;

										echo "
											<p>Feedback details.</p>
											<form>
												<table id='formtable'>
													<tr>
														<th colspan='2'>View Feedback</th>
													</tr>
													<tr>
														<td width='30%'><b>Sender</b></td>
														<td>$senderF</td>
													</tr>
													<tr>
														<td><b>Subject</b></td>
														<td>$subjectF</td>
													</tr>
													<tr>
														<td><b>Email</b></td>
														<td>$emailF</td>
													</tr>
													<tr>
														<td><b>Comment</b></td>
														<td>$commentF</td>
													</tr>
													<tr>
														<td><b>Date</b></td>
														<td>$dateF</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></center>
														</td>
													</tr>
												</table>
											</form>
										";
									}
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
