<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | View Department List</title>
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

				<!--===============================================================================================-->

				<main>
					<div class="main-container">
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Department</h1>
							<img src='icon/icons8-department-48.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>View Department</h2>
							<hr>
							<div class="task-container">
								<?php
										$listID=$_GET['listID'];
										include 'connection.php';
										$serviceDeptquery = dbConn()->prepare("SELECT * FROM service_list WHERE listID='$listID'");
										$serviceDeptquery->execute();
										$serviceDeptlists = $serviceDeptquery->fetchAll(PDO::FETCH_OBJ);

										foreach($serviceDeptlists as $serviceDeptlist){
											$listID = $serviceDeptlist->listID;
											$listTitle = $serviceDeptlist->listTitle;
											$listCategory = $serviceDeptlist->listCategory;
											$listDesc = $serviceDeptlist->listDesc;
											$listGuideline = $serviceDeptlist->listGuideline;

										echo "
											<p>Department details.</p>
											<form>
												<table id='formtable'>
													<tr>
														<th colspan='2'>View Department</th>
													</tr>
													<tr>
														<td width='30%'><b>Title</b></td>
														<td>$listTitle</td>
													</tr>
													<tr>
														<td><b>Category</b></td>
														<td>$listCategory</td>
													</tr>
													<tr>
														<td><b>Description</b></td>
														<td>$listDesc</td>
													</tr>
													<tr>
														<td><b>Guideline Description</b></td>
														<td>$listGuideline</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center>";
																echo"<a href='citizen-lodgecomplain.php?listID=".$listID."&citizenIC=".$citizenIC."&role=".$role."'><input id='selfreportBtn' class='button' type='button' name='back' value='Self Report'></a>";
																echo"<a href='citizen-lodgecomplainbehalf.php?listID=".$listID."&citizenIC=".$citizenIC."&role=".$role."'><input id='onbehalfBtn' class='button' type='button' name='back' value='On Behalf'></a>";
																echo"<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
															</center>
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
