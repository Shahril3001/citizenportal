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
		<!--===============================================================================================-->
		<script src="ckeditor/ckeditor.js"></script>
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
							<h2 class='statbox-title-h2'>View Complaint(Self-Report)</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['adminEmail'])&& isset($_GET['role'])){
									$adminEmail=$_GET['adminEmail'];
									$role=$_GET['role'];
									$complaintID=$_GET['complaintID'];
									include 'connection.php';

									$query = dbConn()->prepare('SELECT * FROM complaints WHERE complaintID="'. $complaintID .'"');
									$query->execute();
									$complaints = $query->fetchAll(PDO::FETCH_OBJ);
									foreach($complaints as $complaint){
										$complaintSubject = $complaint->complaintSubject;
										$complaintDesc = $complaint->complaintDesc;
										$serviceTitle = $complaint->serviceTitle;
										$serviceCategory = $complaint->serviceCategory;
										$location = $complaint->location;
										$date = $complaint->date;
										$date = date('d M Y',strtotime($date));
										$complaintStatus = $complaint->complaintStatus;

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='admin-editcomplaint-s2.php?adminEmail=".$adminEmail."&role=".$role."&complaintID=".$complaintID."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Update Complaint</th>
													</tr>
													<tr>
														<td><b>Subject</b></td>
														<td><input type='text' name='complaintSubject'  class='forminput' placeholder='Subject...' value='$complaintSubject' readonly></td>
													</tr>
													<tr>
														<td><b>Title</b></td>
														<td><input type='text' class='forminput' placeholder='Title...' value='$serviceTitle' readonly></td>
													</tr>
													<tr>
														<td><b>Category</b></td>
														<td><input type='text' class='forminput' placeholder='Category...' value='$serviceCategory' readonly></td>
													</tr>
													<tr>
														<td><b>Description</b></td>
														<td><textarea name='complaintDesc' id='editor1' rows='10' cols='60%' placeholder='Description...' readonly>$complaintDesc</textarea></td>
													</tr>
													<tr>
														<td><b>Location</b></td>
														<td><input type='text' name='location' class='forminput' placeholder='Location...' value='$location' readonly></td>
													</tr>
													<tr>
														<td><b>Date</b></td>
														<td><input type='text' name='date' placeholder='Date...' value='$date' readonly></td>
													</tr>
													<tr>
														<td><b>Complaint Status</b></td>
														<td>
															<select name='complaintStatus' id='complaintStatus'>
																<option value='$complaintStatus'>Select a status...</option>
																<option value='Open'>Open</option>
																<option value='Closed'>Closed</option>
																<option value='Dropped'>Dropped</option>
															</select>
														</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
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
