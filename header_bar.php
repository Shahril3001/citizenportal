					<!-- Header Bar -->
					<?php
						echo"
						<header>
							<a href='index.php'>
								<h1 class='title-header'>
									<img src='icon/citizenlogo.png' id='title-header-logo' />
								</h1>
							</a>
							<div id='side'>
								<div class='header-side' id='currentdatetime'>
									<div id='date' class='datetime'></div>
									<div id='clock' class='datetime' onload='showTime()'></div>
								</div>
								<div class='header-side' id='side-nav-btn' onclick='openNav()'>
									&#9776;
								</div>
							</div>
						</header>
						";
					?>
