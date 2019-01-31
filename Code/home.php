<?php
require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PicoShare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>
		<script src="js/formvalidate1.js"></script>
<div class="super_container">

	<!-- Header -->

	<header class="header trans_400">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<div class="logo"><a href="#">Pico<span>Share</span></a></div>
						<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="Home.php">Home</a></li>
								<li><a href="about.html">About us</a></li>
								<li><a href="services.html">Services</a></li>
<!-- 								<li><a href="blog.html">News</a></li>
								<li><a href="contact.html">Contact</a></li> -->
							</ul>
						</nav>
						<div class="log_reg">
							<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
								<?php
								$utype = getSession('utype');
								$uname = getSession('uname');

									if($utype==null){
										echo '<div class="login log_reg_text"><a href="login.php">Login</a></div>
								<div class="register log_reg_text"><a href="signup.php">Register</a></div>';
									}
									else if($utype==0){
										echo  '<div class="login log_reg_text"><a href="adminhome.php">'.$uname.'</a></div>';
										echo  '<div class="login log_reg_text"><a href="logout.php">logout</a></div>';
									}
									else if($utype==1){
										echo  '<div class="login log_reg_text"><a href="uprof.php">'.$uname.'</a></div>';
										echo  '<div class="login log_reg_text"><a href="logout.php">logout</a></div>';
									}
									else{
								// 		echo '<div class="login log_reg_text"><a href="login.php">Login</a></div>
								// <div class="register log_reg_text"><a href="signup.php">Register</a></div>';
									}

								?>

							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="log_reg">
			<div class="log_reg_content d-flex flex-row align-items-center justify-content-end">
				<div class="login log_reg_text"><a href="login.php">Login</a></div>
				<div class="register log_reg_text"><a href="signup.php">Register</a></div>
			</div>
		</div>
		<nav class="menu_nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="#">About us</a></li>
				<li><a href="#">Services</a></li>
<!-- 				<li><a href="blog.html">News</a></li>
				<li><a href="contact.html">Contact</a></li> -->
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background"></div>
		<div class="background_image background_city" style="background-image:url(images/city.png)"></div>
		<div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
		<div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Welcome to PicoShare</div>
							<div class="home_text">Are you sick of posting URLs in emails only to have it break when sent causing the recipient to have to cut and paste it back together? Then you've come to the right place. By entering in a URL in the text field below, we will create a Pico URL that will be easy to manage and will not break in any postings</div>
 							<div class="home_text"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="container">
							<form name="form" action="#" id="form" method="post" class="">
								<div class="row">
									<div class="col-md-8">
										<input type="url" class="domain_search_input" data-type="url" id="url" name="url" value="http://">
									</div>
									<div class="col-md-4">
										<input type="submit" class="domain_search_button d-flex flex-row align-items-center justify-content-center" value="Shrink" id="short_url" name="short_url">
									</div>
								</div>


</br><input type="text" class="domain_search_inputi" data-type="alt" id="alt" name="alt" pattern="[a-zA-Z0-9]+" maxlength="7" placeholder="Custom alias (optional)">
<!-- <input type="text" name="hh" id="hh"> -->

							</form>
<!-- 						<center><p id="gurl" style="display: none;"></p></center>
 -->
				<div class="text-center" id="surl" style="display: none;"></div>

										<center><p id="head" style="display: none;font-size:25px;color:white; margin-top:30px;font-color:white;">Enter a URL to Shrink</p></center>
										<center><p id="p1" style="display: none;font-size:25px; color:white;margin-top:30px;font-color:white;">Invalid URL</p></center>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col magic_fade_in">
					<div class="section_title text-center"><h2>How to get started</h2></div>
				</div>
			</div>
			<div class="row intro_row">
				<div class="intro_dots magic_fade_in" style="background-image:url(images/dots.png)"></div>

				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_1.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">GET URL</div>
							<div class="intro_item_text">
								<p>Get the URL that you want to compress</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_2.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">Shorten the URL</div>
							<div class="intro_item_text">
								<p>Paste the URL here and get a PicoURL, Use custom alias for easy access</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_3.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">Become a Member</div>
							<div class="intro_item_text">
								<p>Create an account for unlocking more features</p>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/services.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col magic_fade_in">
					<div class="section_title text-center"><h2>Our Services</h2></div>
				</div>
			</div>
			<div class="row services_row">

				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_4.svg" alt="PicoURL"></div>
						<div class="service_title"><h3>PicoURL</h3></div>
						<div class="service_text">
							<p>New age, Customizable URL shortening service</p>
						</div>
						<div class="service_button trans_200"><a>Read More</a></div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_5.svg" alt="PicoBin"></div>
						<div class="service_title"><h3>PicoBin</h3></div>
						<div class="service_text">
							<p>Online content hosting service where users can store plain text</p>
						</div>
						<div class="service_button trans_200"><a >Read More</a></div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_6.svg" alt="PicoHost"></div>
						<div class="service_title"><h3>PicoHost</h3></div>
						<div class="service_text">
							<p>File hosting service</p>
						</div>
						<div class="service_button trans_200"><a >Read More</a></div>
					</div>
				</div>

			</div>
		</div>
	</div>



	<!-- Footer -->

	<footer class="footer magic_fade_in">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 footer_col magic_fade_in">
					<div class="footer_about">
						<div class="footer_logo">Pico<span>Share</span></div>
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a>Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="footer_text">
							<p>Thank you for using PicoShare Services. If you have any queries related to the site feel free to reach out to us.. Also your feedbacks and suggestions are very much important to us. Please share them here. Looking forward for your comments and support!</p>
						</div>
						<div class="contact_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="contact_input" placeholder="Your Name" required="required">
									</div>
									<div class="col-md-6">
										<input type="email" class="contact_input" placeholder="Your e-mail" required="required">
									</div>
								</div>
								<div>
									<textarea class="contact_input contact_textarea" placeholder="Message" required="required"></textarea>
								</div>
								<button class="contact_button" disabled>Send</button>
							</form>
						</div>
					</div>
				</div>



			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
