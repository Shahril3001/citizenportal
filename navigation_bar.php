					<!-- Navigation Bar -->
					<?php
					if(isset($_GET['role'])){
						$role=$_GET['role'];
						if($role=="admin"){
							// For admin
							$adminEmail=$_GET['adminEmail'];
							echo"
							<nav id='navbar'>
								<ul>
									<li><a href='admin-index.php?adminEmail=".$adminEmail."&role=".$role."'>Home</a></li>
									<div class='navmenu'>
										<li><a href='javascript:void(0)' onclick='myDropnav()' class='dropbtn'>Management &#9660</a>
											<div id='myDropdown' class='navmenu-navcontent'>
												<a href='admin-slideshowlist.php?adminEmail=".$adminEmail."&role=".$role."'>Slideshow</a>
												<a href='admin-departmentlist.php?adminEmail=".$adminEmail."&role=".$role."'>Department</a>
												<a href='admin-servicelist.php?adminEmail=".$adminEmail."&role=".$role."'>Service</a>
											</div>
										</li>
									</div>
									<div class='navmenu'>
										<li><a href='javascript:void(0)' onclick='myDropnav1()' class='dropbtn'>User &#9660</a>
											<div id='myDropdown1' class='navmenu-navcontent'>
												<a href='admin-stafflist.php?adminEmail=".$adminEmail."&role=".$role."'>Staff</a>
												<a href='admin-citizenlist.php?adminEmail=".$adminEmail."&role=".$role."'>Citizen</a>
											</div>
										</li>
									</div>
									<li><a href='admin-feedbacklist.php?adminEmail=".$adminEmail."&role=".$role."'>Feedback</a></li>
									<li><a href='logout-admin.php?adminEmail=".$adminEmail."&role=".$role."'>Log Out</a></li>
								</ul>
							</nav>
							";
						}else{
							// For registered-citizen
							$citizenIC=$_GET['citizenIC'];
							echo"
							<nav id='navbar'>
								<ul>
									<li><a href='citizen-index.php?citizenIC=".$citizenIC."&role=".$role."'>Home</a></li>
									<li><a href='citizen-profile.php?citizenIC=".$citizenIC."&role=".$role."'>My Profile</a></li>
									<li><a href='citizen-service.php?citizenIC=".$citizenIC."&role=".$role."'>Service</a></li>
									<li><a href='citizen-history.php?citizenIC=".$citizenIC."&role=".$role."'>History</a></li>
									<li><a href='citizen-contact.php?citizenIC=".$citizenIC."&role=".$role."'>Contact</a></li>
									<li><a href='logout-citizen.php?citizenIC=".$citizenIC."&role=".$role."'>Log Out</a></li>
								</ul>
							</nav>
							";
						}
					}
					else{
						// For unregistered-citizen or quest
						echo"
						<nav id='navbar'>
							<ul>
								<li><a href='index.php'>Home</a></li>
								<li><a href='about.php'>About</a></li>
								<div class='navmenu'>
									<li><a href='javascript:void(0)' onclick='myDropnav()' class='dropbtn'>Account &#9660</a>
										<div id='myDropdown' class='navmenu-navcontent'>
									    <a href='login.php'>Login</a>
									    <a href='citizen-registration.php'>Registration</a>
									  </div>
									</li>
								</div>
								<li><a href='department.php'>Department</a></li>
								<li><a href='services.php'>Service</a></li>
								<li><a href='contact.php'>Contact</a></li>
							</ul>
						</nav>
						";
					}
					?>
