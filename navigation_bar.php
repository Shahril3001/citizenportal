					<!-- Navigation Bar -->
					<?php
					if(isset($_GET['role'])){
						$role=$_GET['role'];
						if($role=="admin"){
							// For admin
							$adminEmail=$_GET['adminEmail'];
							echo"
							<nav>
								<ul>
									<li><a href='admin-index.php?adminEmail=".$adminEmail."&role=".$role."'>Home</a></li>
									<li><a href='admin-stafflist.php?adminEmail=".$adminEmail."&role=".$role."'>Staff</a></li>
									<li><a href='admin-citizenlist.php?adminEmail=".$adminEmail."&role=".$role."'>Citizen</a></li>
									<li><a href='admin-departmentlist.php?adminEmail=".$adminEmail."&role=".$role."'>Department</a></li>
									<li><a href='admin-servicelist.php?adminEmail=".$adminEmail."&role=".$role."'>Service</a></li>
									<li><a href='admin-feedbacklist.php?adminEmail=".$adminEmail."&role=".$role."'>Feedback</a></li>
									<li><a href='logout-admin.php?adminEmail=".$adminEmail."&role=".$role."'>Log Out</a></li>
								</ul>
							</nav>
							";
						}else{
							// For registered-citizen

						}
					}
					else{
						// For unregistered-citizen or quest
						echo"
						<nav>
							<ul>
								<li><a href='index.php'>Home</a></li>
								<li><a href='about.php'>About</a></li>
								<li><a href='#'>Account &#9660</a>
									<ul>
										<li><a href='login.php'>Login</a></li>
										<li><a href='citizen-registration.php'>Registration</a></li>
									</ul>
								</li>
								<li><a href='department.php'>Department</a></li>
								<li><a href='services.php'>Service</a></li>
								<li><a href='contact.php'>Contact</a></li>
							</ul>
						</nav>
						";
					}
					?>
