<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Aduan Darussalam | Lodge a Complain on Behalf</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="style.css">
		<!--===============================================================================================-->
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="sßtylesheet" type="text/css" href="vendor/animate/animate.css">
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

			<!--===============================================================================================-->
				<div class="main-container">
					<h1 class="title-container">Lodge a Complain</h1>

					<p>If you are complaining for yourself, please click <?php echo "<a href='citizen-lodgecomplain.php?citizenIC=".$citizenIC."&role=".$role."'>"?> here.</a></p>
					<div class="task-container">
									<br>

									<?php
										echo "


											<h4>Before making a complain on someone's behalf:</h4>
											<ul>
												<li> Ensure that you have their consent before submitting a complaint </li>
												<li> Ensure that the complaint is about a matter you have no personal involvement in </li>
											</ul>


											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='citizen-lodgecomplainbehalf2.php?citizenIC=".$citizenIC."&role=".$role."'>
												<table id='formtable'>

												<!-- Details of the person -->

												<tr>
														<th colspan='2'>Details of the Person</th>
													</tr>

													<tr>
														<td><b>*Full Name of the Person:</b></td>
														<td><input type='text' name='behalfName' placeholder='Full name of the person...' minlength='5' size='50'></td>
													</tr>

													<tr>
														<td><b>*Reason Unable to Complain by Themselves:</b></td>
														<td><input type='text' name='reason' placeholder='Reason...' minlength='5' size='50'></td>
													</tr>

													<tr>
														<td><b>*Their Contact Number:</b></td>
														<td><input type='text' name='behalfContact' placeholder='Contact Number...' minlength='5' size='50'></td>
													</tr>

													<tr>
														<td><b>*Their Address:</b></td>
														<td><textarea name='behalfAddress' name='behalfAddress' id='editor1' rows='3' cols='50%' placeholder=' Address...' minlength='5'></textarea></td>
													</tr>



													<tr>
														<td><b>*Relationship with Said Person:</b></td>"?>
														<td>
															<input type="radio" name="relationship" <?php if (isset($relationship) && $relationship=="Child") echo "checked";?>value="Child"> Child <br>
															<input type="radio" name="relationship" <?php if (isset($relationship) && $relationship=="Parent") echo "checked";?>value="Parent"> Parent <br>
															<input type="radio" name="relationship" <?php if (isset($relationship) && $relationship=="Spouse") echo "checked";?>value="Spouse"> Spouse <br>

														</td>

													<?php
													echo "
													</tr>


													<!-- Complain Section -->

													<tr>
														<th colspan='2'>Complain on Someone's Behalf</th>
													</tr>

													<tr>
														<td><b>*Complaint:</b></td>
														<td><textarea name='complaint' name='complaint' id='editor1' rows='5' cols='50%' placeholder=' Complaint...' minlength='5'></textarea></td>
													</tr>

													<tr>
														<td><b>*Location of Accident / Event:</b></td>
														<td><input type='text' name='location' placeholder=' Location...' minlength='5' size='50'></td>
													</tr>

													<tr>
														<td><b>*Date of Accident / Event:</b></td>
														<td><input type='date' name='date' placeholder=' Date...' size='50'></td>
													</tr>

													<tr>
														<td><b>*Department concerned:</b></td>"?>
														<td>
															<input type="radio" name="department" <?php if (isset($department) && $department=="b&f") echo "checked";?>value="Business & Finance"> Business & Finance <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="e&l") echo "checked";?>value="Education & Learning"> Education & Learning <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="emp&l") echo "checked";?>value="Employment & Labour"> Employment & Labour <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="f&sl") echo "checked";?>value="Family & Social Welfare"> Family & Social Welfare <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="he&s") echo "checked";?>value="Health & Safety"> Health & Safety <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="hol&e") echo "checked";?>value="House, Land & Environment"> House, Land & Environment <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="imtrav") echo "checked";?>value="Immigration & Travel"> Immigration & Travel <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="law") echo "checked";?>value="Law"> Law <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="famsoc") echo "checked";?>value="Family & Social Welfare"> Family & Social Welfare <br>

															<input type="radio" name="department"<?php if (isset($department) && $department=="transportation") echo "checked";?>value="Transportation"> Transportation <br>

														</td>

													<?php
													echo "

													</tr>
													</tr>
													<tr>
														<td><b>Image:</b></td>
														<td><input type='file' name='complaintImage'></td>
													</tr>

													<tr>
														<td><b>Relevant Document:</b></td>
														<td><input type='file' name='complaintDocument'></td>
													</tr>

													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='resetBtn' class='button' type='reset' name='reset' value='Reset'/>
														</td>
													</tr>







												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
										";
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
