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
							<h2 class='statbox-title-h2'>Complaint (Self-Report)</h2>
							<hr>
							<?php
									$cloneID = 0;
									include 'connection.php';
									$complaintquery = dbConn()->prepare(	"SELECT * FROM complaints WHERE citizenIC='$citizenIC' AND  complaintStatus<>'Dropped' ");
									$complaintquery->execute();
									$complaintlists = $complaintquery->fetchAll(PDO::FETCH_OBJ);
									$num_count = $complaintquery->rowCount();
									if ($num_count !=0)
									{
									echo"<p><b>Result:</b> There are $num_count complaint(s) shown below:</p>
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
														<b>Category:</b> $serviceCategory<br>
														<b>Sender:</b> $citizenName ($citizenIC)<br>
														<b>Date:</b> $date<br>
													</td>
													<td width='20%'>$complaintStatus</td>
													<td width='14%'>
														<a href='admin-viewcomplaint-s.php?citizenIC=".$citizenIC."&complaintID=".$complaintID."&role=".$role."'><button class='button' id='viewBtn'>&#x1f441; View</button></a>
														<a href='citizen-deletecomplaint-s.php?citizenIC=".$citizenIC."&complaintID=".$complaintID."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
													</td>
												</tr>";
											}
										}
										echo"</table>";
										}else if ($num_count == 0){
											echo "<p><b>Result:</b> There are no results were found.</p>
											<p><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>
											<script>
												function goBack(){
													window.history.back();
												}
											</script>";
										}else{
											echo "<p>Something wrong on database.</p>";
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
