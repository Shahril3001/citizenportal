<?php
	echo"
	<!--===============================================================================================-->
		<script type='text/javascript' src='vendor/jquery/jquery-3.2.1.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/animsition/js/animsition.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/bootstrap/js/popper.js'></script>
		<script type='text/javascript'  src='vendor/bootstrap/js/bootstrap.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/select2/select2.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/slick/slick.min.js'></script>
		<script type='text/javascript'  src='js/slick-custom.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/parallax100/parallax100.js'></script>
		<script type='text/javascript' >
	        $('.parallax100').parallax100();
		</script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/countdowntime/countdowntime.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/lightbox2/js/lightbox.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/isotope/isotope.pkgd.min.js'></script>
	<!--===============================================================================================-->
		<script src='ckeditor/ckeditor.js'></script>
	<!--===============================================================================================-->
		<script src='js/main.js'></script>
		<script>
		// Get the button
		let mybutton = document.getElementById('myBtn');

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = 'block';
			} else {
				mybutton.style.display = 'none';
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}

			function openNav() {
				document.getElementById('mySidenav').style.width = '250px';
			}

			function closeNav() {
				document.getElementById('mySidenav').style.width = '0';
			}

			$(document).ready(function(){
				$('#citizenTab').show();
				$('#adminTab').hide();
			});
			$(document).ready(function(){
				$('#citizenLogBtn').click(function(){
				$('#citizenTab').show();
				$('#adminTab').hide();
				});
				$('#adminLogBtn').click(function(){
				$('#adminTab').show();
				$('#citizenTab').hide();
				});
			});
	      // The function below will start the confirmation dialog
	      function confirmAction() {
	        let confirmAction = confirm('Are you sure to execute this action?');
	        if (confirmAction) {
	          alert('Action successfully executed');
	        } else {
	          alert('Action canceled');
	        }
	      }

			function goBack(){
				window.history.back();
			}
		</script>
	";
?>
