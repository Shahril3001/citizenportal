<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Complaint</title>
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
							<h1 class="title-container">Complaint</h1>
							<img src='icon/icons8-complain-64.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>View Complaint(Self-Report)</h2>
							<hr>
							<div class="task-container">
								<?php
										$complaintID=$_GET['complaintID'];
										include 'connection.php';
										$complaintquery = dbConn()->prepare("SELECT * FROM complaints WHERE complaintID='$complaintID'");
										$complaintquery->execute();
										$complaintlists = $complaintquery->fetchAll(PDO::FETCH_OBJ);

										foreach($complaintlists as $complaintlist){
											$complaintID  = $complaintlist->complaintID ;
											$complaintSubject = $complaintlist->complaintSubject;
											$complaintDesc = $complaintlist->complaintDesc;
											$location = $complaintlist->location;

											$date = $complaintlist->date;
											$date = date('d M Y',strtotime($date));

											$serviceTitle = $complaintlist->serviceTitle;
											$serviceCategory = $complaintlist->serviceCategory;
											$complaintImage = $complaintlist->complaintImage;
											$document = $complaintlist->document;
											$citizenIC = $complaintlist->citizenIC;
											$complaintStatus = $complaintlist->complaintStatus;

											$complaintDate = $complaintlist->complaintDate;
											$complaintDate = date('d M Y H:i:sa',strtotime($complaintDate));

											$citizenquery = dbConn()->prepare('SELECT * FROM citizen WHERE citizenIC="'. $citizenIC .'"');
											$citizenquery->execute();
											$citizenlists = $citizenquery->fetchAll(PDO::FETCH_OBJ);
											foreach($citizenlists as $citizenlist){
											$citizenName = $citizenlist->citizenName;

										echo "
											<p>Complaint details.</p>
											<form>
												<table id='formtable'>
													<tr>
														<th colspan='2'>View Complaint</th>
													</tr>
													<tr>
														<td width='30%'><b>Subject:</b></td>
														<td>$complaintSubject</td>
													</tr>
													<tr>
														<td><b>Description:</b></td>
														<td>$complaintDesc</td>
													</tr>
													<tr>
														<td><b>Location:</b></td>
														<td>$location</td>
													</tr>
													<tr>
														<td><b>Date:</b></td>
														<td>$date</td>
													</tr>
													<tr>
														<td><b>Title:</b></td>
														<td>$serviceTitle</td>
													</tr>
													<tr>
														<td><b>Category:</b></td>
														<td>$serviceCategory</td>
													</tr>
													<tr>
														<td><b>Image:</b></td>
														<td><a href='$complaintImage'><img src='$complaintImage' alt='' width='30%' height='30%'></a></td>
													</tr>
													<tr>
														<td><b>Document:</b></td>
														<td><a href='$document'>$document</a></td>
													</tr>
													<tr>
														<td><b>Sender:</b></td>
														<td>$citizenName</td>
													</tr>
													<tr>
														<td><b>Complaint Status:</b></td>
														<td>$complaintStatus</td>
													</tr>
													<tr>
														<td><b>Complaint Date:</b></td>
														<td>$complaintDate</td>
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
