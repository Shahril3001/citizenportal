<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$adminEmail=$_GET['adminEmail'];
			echo"
			<a href='admin-index.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Home</a>
			<a href='admin-stafflist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-staff-96.png' class='side-nav-icon' />Staff</a>
			<a href='admin-citizenlist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-citizen-64.png' class='side-nav-icon' />Citizen</a>
			<a href='admin-departmentlist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-department-48.png' class='side-nav-icon' />Department</a>
			<a href='admin-servicelist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-services-64.png' class='side-nav-icon' />Services</a>
			<a href='admin-feedbacklist.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-feedback-96.png' class='side-nav-icon' />Feedback</a>
			<a href='logout-admin.php?adminEmail=".$adminEmail."&role=".$role."'><img src='icon/icons8-logout-96.png' class='side-nav-icon' />Log Out</a>
			";
		}else{

		}
	}
	else{
		echo"
		<a href='index.php'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Home</a>
		<a href='about.php'><img src='icon/icons8-more-info-48.png' class='side-nav-icon' />About</a>
		<a href='login.php'><img src='icon/icons8-password-48.png' class='side-nav-icon' />Account</a>
		<a href='department.php'><img src='icon/icons8-department-48.png' class='side-nav-icon' />Department</a>
		<a href='services.php'><img src='icon/icons8-services-64.png' class='side-nav-icon' />Services</a>
		<a href='contact.php'><img src='icon/icons8-mailboxes-64.png' class='side-nav-icon' />Contact</a>";
	}
?>