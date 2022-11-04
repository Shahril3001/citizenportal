<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$adminEmail=$_GET['adminEmail'];
			echo"
			<div class='footer-bottom'>
			 <div class='footer-menu'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 4 (Amaal & Shahril)</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
				</ul>
			 </div>
			<div class='footer-trademark'>
				<p>&copy; 2022 <a href='mailto:aduandarussalam.com.bn'>Aduan Darussalam</a>. All rights reserved.</p>
			</div>
		 </div>
			";
		}else{
			echo"
			<div class='footer-content'>
			 <h3>Connect with Us</h3>
			 <p>Connecting all government department allow you to communicate your grievance or suggestion.</p>
			 <ul class='socials'>
				<li><a href='#'><img src='icon/icons8-facebook-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-youtube-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-instagram-48.png'/></i></a></li>
				<li><a href='#'><img src='icon/icons8-twitter-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-telegram-app-48.png'/></i></a></li>
			 </ul>
			</div>
			<div class='footer-bottom'>
			 <div class='footer-menu'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 4 (Amaal & Shahril)</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
				</ul>
			 </div>
			<div class='footer-trademark'>
				<p>&copy; 2022 <a href='mailto:aduandarussalam.com.bn'>Aduan Darussalam</a>. All rights reserved.</p>
			</div>
			</div>
			";
		}
	}
	else{
		echo"
		<div class='footer-content'>
		 <h3>Connect with Us</h3>
		 <p>Connecting all government department allow you to communicate your grievance or suggestion.</p>
		 <ul class='socials'>
			<li><a href='#'><img src='icon/icons8-facebook-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-youtube-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-instagram-48.png'/></i></a></li>
			<li><a href='#'><img src='icon/icons8-twitter-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-telegram-app-48.png'/></i></a></li>
		 </ul>
		</div>
		<div class='footer-bottom'>
			<div class='footer-menu' id='footer-mobile'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 4 (Amaal & Shahril)</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
				</ul>
		 	</div>
			<div class='footer-trademark' id='footer-mobile'>
				<p>&copy; 2022 <a href='mailto:aduandarussalam.com.bn'>Aduan Darussalam</a>. All rights reserved.</p>
			</div>
		</div>
		";
	}
	echo"<script>
	function myDisclaimer() {
		alert('Disclaimer: All content and information on the website is for informational and educational purposes only.');
	}
	</script>";
	echo"<script>
	function myCreator() {
		alert('CREATED BY:- SHAHRIL RADZIMAN BIN SILAU (B20210020) & FATIN AMAAL BATRISYIA BTE HJ MOHD HUSSAINI (B20210142)');
	}
	</script>";
?>
