<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Complaint</title>
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
							<img src='icon/icons8-complain-64.png' class='statbox-title-img'/>
							<button class='button' id='statbox-printBtn' onclick='window.print()'>&#9113; Print This Page</button></a>
							<h2 class='statbox-title-h2'>Complaint (Self-Report)</h2>
							<hr>
							<?php
								include 'connection.php';

									echo"
									<div id='deptCategory'>
										<form method='POST' enctype='multipart/form-data' action='admin-findcomplaintlist-selfreport.php?adminEmail=".$adminEmail."&role=".$role."'>

										<select name='complaintStatus' id='complaintStatus' class='deptCategoryelement'>
											<option>Select a status...</option>
											<option value='Open'>Open</option>
											<option value='Closed'>Closed</option>
											<option value='Dropped'>Dropped</option>
										</select>

										<select name='serviceCategory' class='deptCategoryelement'>
										<option value=''>Select a category...</option>";
											$servicequery = dbConn()->prepare("SELECT * FROM service_category");
											$servicequery->execute();
											$servicelists = $servicequery->fetchAll(PDO::FETCH_OBJ);

											foreach($servicelists as $servicelist){
												$categoryID  = $servicelist->categoryID;
												$categoryName  = $servicelist->categoryName;
												echo"<option value='$categoryName'>$categoryName</option>";
											}
										echo"</select>";
										echo"
										<input id='returnBtn' class='button' type='submit' name='Submit' value='&#x1F50E; Search'>
										</form>
									</div>
									";

									$cloneID = 0;
									$complaintquery = dbConn()->prepare('SELECT * FROM complaints');
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
												$cloneID++;
												$citizenName = $citizenlist->citizenName;

												echo "
												<tr>
													<td>$cloneID</td>
													<td class='justify-contents'>
														<b>Subject:</b> $complaintSubject<br>
														<b>Title:</b> $serviceTitle<br>
														<b>Category:</b> $serviceCategory<br>
														<b>Sender:</b> $citizenName ($citizenIC)<br>
														<b>Date:</b> $date<br>
													</td>
													<td width='20%'>$complaintStatus</td>
													<td width='14%'>
														<a href='admin-viewcomplaint-s.php?adminEmail=".$adminEmail."&complaintID=".$complaintID."&role=".$role."'><button class='button' id='viewBtn'>&#x1f441; View</button></a>
														<a href='admin-editcomplaint-s.php?adminEmail=".$adminEmail."&complaintID=".$complaintID."&role=".$role."'><button class='button' id='editBtn'>&#10227; Update</button></a>
														<a href='admin-deletecomplaint-s.php?adminEmail=".$adminEmail."&complaintID=".$complaintID."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
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
