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
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Complaint</h1>
							<img src='icon/icons8-complain-64-1.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Complaint (On Behalf)</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$complaintquery = dbConn()->prepare("SELECT * FROM complaintsbehalf WHERE citizenIC='$citizenIC' AND  complaintStatus<>'Dropped'");
									$complaintquery->execute();
									$complaintlists = $complaintquery->fetchAll(PDO::FETCH_OBJ);
									echo"
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Detail</th>
												<th>Status</th>
												<th>Action</th>
											</tr>";
											foreach($complaintlists as $complaintlist){
												$behalfComplaintID  = $complaintlist->behalfComplaintID;
												$behalfName = $complaintlist->behalfName;
												$complaintSubject = $complaintlist->complaintSubject;
												$complaintDesc = $complaintlist->complaintDesc;
												$location = $complaintlist->location;

												$date = $complaintlist->date;
												$date = date('d M Y',strtotime($date));

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
												$cloneID++;
												$citizenName = $citizenlist->citizenName;

												echo "
												<tr>
													<td>$cloneID</td>
													<td class='justify-contents'>
														<b>Subject:</b> $complaintSubject<br>
														<b>Description:</b> $complaintDesc<br>
														<b>Category:</b> $serviceCategory<br>
														<b>Behalf Name:</b> $behalfName<br>
														<b>Sender:</b> $citizenName ($citizenIC)<br>
														<b>Date:</b> $date<br>
													</td>
													<td width='20%'>$complaintStatus</td>
													<td width='10%'>
														<a href='admin-viewcomplaint-b.php?citizenIC=".$citizenIC."&behalfComplaintID=".$behalfComplaintID."&role=".$role."'><button class='button' id='viewBtn'>View</button></a>
														<a href='citizen-deletecomplaint-b.php?citizenIC=".$citizenIC."&behalfComplaintID=".$behalfComplaintID."&role=".$role."'><button class='button' id='deleteBtn'>Delete</button></a>
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
