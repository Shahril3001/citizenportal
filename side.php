<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$adminEmail=$_GET['adminEmail'];
			echo"
			<a href='admin-index.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Dashboard</a>

			<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-setting-64.png' class='side-nav-icon' />Management <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='admin-slideshowlist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-slideshow-64.png' class='side-nav-icon' />Slideshow</a>
				<a href='admin-departmentlist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-department-48.png' class='side-nav-icon' />Department</a>
				<a href='admin-servicelist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-services-64.png' class='side-nav-icon' />Services</a>
			</div>

			<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-management-96.png' class='side-nav-icon' />User <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='admin-stafflist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-staff-96.png' class='side-nav-icon' />Staff</a>
				<a href='admin-citizenlist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-citizen-64.png' class='side-nav-icon' />Citizen</a>
			</div>

			<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-suggestion-64.png' class='side-nav-icon' />Complaint <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='admin-complaintlist-selfreport.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-complain-64.png' class='side-nav-icon' />Self-report</a>
				<a href='admin-complaintlist-onbehalf.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-complain-64-1.png' class='side-nav-icon' />On behalf</a>
			</div>

			<a href='admin-feedbacklist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-feedback-96.png' class='side-nav-icon' />Feedback</a>
			<a href='logout-admin.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-logout-96.png' class='side-nav-icon' />Log Out</a>
			";
		}else{
			$citizenIC=$_GET['citizenIC'];
			echo"
			<a href='citizen-index.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Dashboard</a>
			<a href='citizen-myprofile.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-test-account-96.png' class='side-nav-icon' />My Profile</a>
			<a href='citizen-services.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-services-64.png' class='side-nav-icon' />Services</a>
			<a href='citizen-contact.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-mailboxes-64.png' class='side-nav-icon' />Contact</a>

			<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-history-64.png' class='side-nav-icon' />History<i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='citizen-complaintlist-selfreport.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-complain-64.png' class='side-nav-icon' />Complaint (Self-Report)</a>
				<a href='citizen-complaintlist-selfreport.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-complain-64-1.png' class='side-nav-icon' />Complaint (On Behalf)</a>
				<a href='citizen-feedbacklist.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-feedback-96.png' class='side-nav-icon' />Feedback</a>
			</div>

			<a href='logout-citizen.php?citizenIC=".$citizenIC."&role=".$role."'><img src='icon/icons8-logout-96.png' class='side-nav-icon' />Log Out</a>
			";
		}
	}
	else{
		echo"
		<a href='index.php'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Home</a>
		<a href='about.php'><img src='icon/icons8-more-info-48.png' class='side-nav-icon' />About</a>
		<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-account-64.png' class='side-nav-icon' />Account <i class='arrowdown'>&#9660</i></a>
		<div class='dropdown-sidenav'>
			<a href='login.php'><img src='icon/icons8-password-48.png' class='side-nav-icon' />Login</a>
			<a href='citizen-registration.php'><img src='icon/icons8-add-user-male-96.png' class='side-nav-icon' />Registration</a>
		</div>
		<a href='department.php'><img src='icon/icons8-department-48.png' class='side-nav-icon' />Department</a>
		<a href='services.php'><img src='icon/icons8-services-64.png' class='side-nav-icon' />Services</a>
		<a href='contact.php'><img src='icon/icons8-mailboxes-64.png' class='side-nav-icon' />Contact</a>";
	}
?>
