<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Citizen Portal Brunei | Login</title>
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
				<div class="main-container">
					<h1 class="title-container">Login</h1>
					<img src='icon/icons8-find-user-96.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Find Account</h2>
					<hr>
						<?php
						$citizenName = $_POST['citizenName'];
						$citizenIC = $_POST['citizenIC'];
						include 'connection.php';
						$query = dbConn()->prepare("SELECT * FROM citizen where citizenName LIKE '%".$citizenName."%' AND citizenIC LIKE '%".$citizenIC."%'");
						$query->execute();
						$citizenlists = $query->fetchAll(PDO::FETCH_OBJ);
						$num_count = $query->rowCount();
						if ($num_count !=0)
						{
						echo"<p><b>Result:</b> There is $num_count that match your search and are shown below:</p></br>
						<div class='row'>";
						foreach($citizenlists as $citizenlist){
							$citizenID = $citizenlist->citizenID;
							$citizenIC = $citizenlist->citizenIC;
							$citizenName = $citizenlist->citizenName;
							$citizenPhone = $citizenlist->citizenPhone;
							$citizenEmail = $citizenlist->citizenEmail;
							$citizenAddress = $citizenlist->citizenAddress;
							$citizenPassword = $citizenlist->citizenPassword;
							echo"<table id='formtable'>
								<tr>
									<th colspan='2'>Profile</th>
								</tr>
								<tr>
									<td width='240px'><b>Name:</b></td>
									<td>$citizenName</td>
								</tr>
								<tr>
									<td width='240px'><b>IC Number:</b></td>
									<td>$citizenIC</td>
								</tr>
								<tr>
									<td><b>Phone:</b></td>
									<td>$citizenPhone</td>
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td>$citizenEmail</td>
								</tr>
								<tr>
									<td><b>Address:</b></td>
									<td>$citizenAddress</td>
								</tr>
								<tr>
									<td><b>Password:</b></td>
									<td>$citizenPassword</td>
								</tr>
								<tr>
									<td style='border:none;' colspan='2'  id='buttonrow'><a href='login.php'><button id='buttonclick' class='button'>Login</button></a></td>
								</tr>
								</table>";

						}
						}else if ($num_count == 0){
						echo "<p><b>Result:</b> There are no results were founded.</p>";
						}else{
						echo "<p>Something wrong on database.</p>";
						}
						?>
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
