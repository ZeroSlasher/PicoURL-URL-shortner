<?php
require "connect.php";
require "session.php";

if(isset($_POST["submit"]))
{
	$username=$_POST['username'];
	$password=$_POST['pass'];
 	$qry="select * from tbl_login inner join tbl_registration on tbl_login.regid=tbl_registration.rid where email='$username' or username='$username' and password='$password'";
   	$res=mysqli_query($conn,$qry) or die("error");
   if(mysqli_num_rows($res)==0)
   {
   		echo('<script type="text/javascript">
   		alert("Check your Password and try again..");
   		        		header("location:login.php");

   		</script>');
   }
	 //admin=0 user=1 guest=?
   else //check status here, wether blocked or not- else if(mysqli_num_rows($res)==0 $$ status ==0/1)
   {
    	while($fetch=mysqli_fetch_array($res))
		{
    		if($fetch['utype']==0)
    		{
    			setSession('uname', $username);
    			setSession('uid', $fetch['uid']);
    			setSession('utype', 0);


       			echo '<script>alert("Admin login successfull")</script>';
        		header("location:adminhome.php");
    		}
     		if($fetch['utype']==1)
    		{
    			setSession('uname', $username);
    			setSession('utype', 1);
    			setSession('uid', $fetch['regid']);

        		header("location:home.php");
			}
   		}
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/login.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">





<header class="header trans_400">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<div class="logo"><a href="#">Pico<span>Share</span></a></div>
						<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about.html">About us</a></li>
								<li><a href="services.html">Services</a></li>
<!-- 								<li><a href="blog.html">News</a></li>
								<li><a href="contact.html">Contact</a></li> -->
							</ul>
						</nav>
						<div class="log_reg">
							<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
								<div class="register log_reg_text"><a href="signup.php">Register</a></div>
								<div class="login log_reg_text"><a href="Home.php">Home</a></div>

							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>



	<div class="home">
		<div class="home_background"></div>
		<!-- <div class="background_image background_city" style="background-image:url(images/city.png)"></div> -->
		<div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
		<div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>



		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic1 js-tilt" data-tilt>
					<img src="images/log.png" alt="Signin">
				</div>

					<form action="#" method="post">
					<span class="login100-form-title">
						Member Signin
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="username" required="true">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" required="true">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" id="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="signup.php">
							Create your Account
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
<!-- 	<script src="js/formvalidate.js"></script>
 -->
</body>
</html>
