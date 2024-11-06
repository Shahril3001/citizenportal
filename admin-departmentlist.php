<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Department</title>
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
							<?php
								echo"
								<a href='admin-adddeptlist.php?adminEmail=".$adminEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>Add (+)</button></a>
								";
							?>
							<h2 class='statbox-title-h2'>Department List</h2>
							<hr>
							<?php
								include 'connection.php';
									echo"
									<div id='deptCategory'>
										<form method='POST' enctype='multipart/form-data' action='admin-finddepartment.php?adminEmail=".$adminEmail."&role=".$role."'>
										<input type='text' name='listTitle' placeholder='Title...' class='deptCategoryelement'>
										<select name='listCategory' class='deptCategoryelement'>
										<option>Select a category...</option>";
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
									$serviceDeptquery = dbConn()->prepare("SELECT * FROM service_list");
									$serviceDeptquery->execute();
									$serviceDeptlists = $serviceDeptquery->fetchAll(PDO::FETCH_OBJ);
									$num_count = $serviceDeptquery->rowCount();
									if ($num_count !=0)
									{
									echo"<p><b>Result:</b> There are $num_count department(s) shown below:</p>
									<div class='row'>
										<table id='listtable'>
											<tr>
												<th width='20px'>#</th>
												<th>Detail</th>
												<th width='14%'>Action</th>
											</tr>";
											foreach($serviceDeptlists as $serviceDeptlist){
												$cloneID++;
												$listID = $serviceDeptlist->listID;
												$listTitle = $serviceDeptlist->listTitle;
												$listCategory = $serviceDeptlist->listCategory;
												$listDesc = $serviceDeptlist->listDesc;
												$listGuideline = $serviceDeptlist->listGuideline;

												echo "
												<tr>
													<td>$cloneID</td>
													<td class='justify-contents'>
														<b>Title:</b> $listTitle<br>
														<b>Category:</b> $listCategory<br>
														<b>Description:</b> ".substr($listDesc,0,250)."..... <i><a href='admin-viewdeptlist.php?adminEmail=".$adminEmail."&listID=".$listID."&role=".$role."'>(More)</a></i>
													</td>
													<td>
														<a href='admin-viewdeptlist.php?adminEmail=".$adminEmail."&listID=".$listID."&role=".$role."'><button class='button' id='viewBtn'>&#x1f441; View</button></a>
														<a href='admin-editdeptlist.php?adminEmail=".$adminEmail."&listID=".$listID."&role=".$role."'><button class='button' id='editBtn'>&#10227; Edit</button></a>
														<a href='admin-deletedeptlist.php?adminEmail=".$adminEmail."&listID=".$listID."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
													</td>
												</tr>";
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
