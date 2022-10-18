
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $id; ?></title>
	<style>
	.slideshow {
	  position: relative;
	}

	.slide {
	  position: relative;
	  display: none;
	}

	.slide-number {
	  position: absolute;
	  top: 12px;
	  left: 12px;
	  z-index: 1;
	  font-size: 1.6rem;
	  color: white;
	}

	.slide-image {
	  position: relative;
	  display: flex;
	  width: 100%;
	  max-width: 1000px;
	}

	.slide-image img {
	  width: 100%;
	}

	.slide-image figcaption {
	  position: absolute;
	  right: 0;
	  bottom: 8px;
	  left: 0;
	  margin: 0 auto;
	  text-align: center;
	  color: white;
	}

	.slide.is-active {
	  display: block;
	}

	.controls {
	  position: absolute;
	  top: calc(50% - 50px);
	  display: flex;
	  justify-content: space-between;
	  position: absolute;
	  width: 100%;
	}

	.controls button {
	  padding: 16px;
	  border: none;
	  font-size: 1.8rem;
	  color: white;
	  background-color: transparent;
	  cursor: pointer;
	  transition: 0.3s ease;
	}

	.controls button:hover {
	  background-color: rgba(0, 0, 0, 0.8);
	}

	.dots-container {
	  height: 20px;
	  margin-top: 16px;
	  text-align: center;
	}

	.dot {
	  display: inline-block;
	  width: 15px;
	  height: 15px;
	  padding: 4px;
	  margin: 0 4px;
	  background-color: #bbb;
	  border-radius: 50%;
	  transition: 0.6s ease;
	  cursor: pointer;
	}

	.dot.is-active,
	.dot:hover {
	  background-color: #717171;
	}

	.fade {
	  animation-name: fade;
	  animation-duration: 0.4s;
	}

	@keyframes fade {
	  from {
	    opacity: 0.4;
	  }
	  to {
	    opacity: 1;
	  }
	}
	</style>
 </head>
 <body>
	 <section class="slideshow">
	<div class="slide fade is-active">
		<span class="slide-number">1 / 3</span>
		<figure class="slide-image">
			<img
				src="https://www.w3schools.com/howto/img_nature_wide.jpg"
				alt="Mountain"
			/>
			<figcaption>First image</figcaption>
		</figure>
	</div>

	<div class="slide fade">
		<span class="slide-number">2 / 3</span>
		<figure class="slide-image">
			<img
				src="https://www.w3schools.com/howto/img_snow_wide.jpg"
				alt="Snow"
			/>
			<figcaption>Second image</figcaption>
		</figure>
	</div>

	<div class="slide fade">
		<span class="slide-number">3 / 3</span>
		<figure class="slide-image">
			<img
				src="https://www.w3schools.com/howto/img_mountains_wide.jpg"
				alt="Snow"
			/>
			<figcaption>Third image</figcaption>
		</figure>
	</div>

	<div class="controls">
		<button class="prev">&#10094;</button>
		<button class="next">&#10095;</button>
	</div>

	<div class="dots-container">
		<span class="dot is-active" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>
</section>
		<?php
			include 'slideshow_connection.php';
		?>
 </body>
 </html>
