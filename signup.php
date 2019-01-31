<?php
    require "connect.php";
          session_start();

    if(isset($_POST["submit1"]))
    {
       $email=$_POST['email'];
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
       $uname=$_POST['uname'];
       $password=$_POST['pass'];
       //check if email and uname already exists

	  		// else
	  		// {
		       $qury="INSERT INTO tbl_registration (`fname`, `lname`, `email`, `username`) VALUES('$fname','$lname','$email','$uname')";
		       $obj=mysqli_query($conn,$qury) or die("SQL error while inserting data to regestration table");
		       $id=mysqli_insert_id($conn);
		       $qury1 = "INSERT INTO tbl_login (`regid`, `password`, `utype`, `status`)  VALUES ($id,'$password',1,0)";
		       //user=1 & admin=0 & guest=2 &unblock=0 block=1
		       $obj1 = mysqli_query($conn, $qury1);
		       if($obj && $obj1 )
		       	{
		       		    			 $_SESSION['uname'] = $uname;//uname
    			  $_SESSION['utype'] = $utype;//utype
		       		echo ('<script language="javascript">
					alert("Registration Success")
					</script>');
		      		header('location:home.php');
		    	}
		    	else
		    	{
		      		mysqli_error($conn);
		    	}
		    // }
	    }
    // }
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/add-user.png"/>
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
  <div class="home_background"></div>
  <!-- <div class="background_image background_city" style="background-image:url(images/city.png)"></div> -->
  <div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
  <div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
  <div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
  <div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
	<div class="limiter">



<header class="header trans_400">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<div class="logo"><a href="home.php">Pico<span>Share</span></a></div>
						<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="Home.php">Home</a></li>
								<li><a href="#">About us</a></li>
								<li><a href="#">Services</a></li>
<!-- 								<li><a href="blog.html">News</a></li>
								<li><a href="contact.html">Contact</a></li> -->
							</ul>
						</nav>
						<div class="log_reg">
							<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
								<div class="register log_reg_text"><a href="login.php">Login</a></div>
								<div class="login log_reg_text"><a href="home.php">Home</a></div>

							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>




		<div class="container-login100">
			<div class="wrap-login100" style="padding-top: 30px;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/reg.png" alt="Signup">
				</div>

				<!-- <form class="login100-form validate-form"> -->
					<form name="form" action="#" method="post" onsubmit="return formValidation()">
					<span class="login100-form-title">
						Member Regestration
					</span>
					<center><p id="head" style="display: none;">All details are mandatory</p></center>

					<div class="wrap-input100 validate-input" >
						<input class="input100 validate" type="text"  data-type="email" name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<p id="p3"></p>
				<div id="eval" style="display: none;"></div>

        <div class="wrap-input100 validate-input" data-validate = "Enter a valid Username">
          <input class="input100 validate" type="text" data-type="uname" name="uname" id="uname" placeholder="Username">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-drivers-license" aria-hidden="true"></i>
          </span>
        </div>
        <p id="p4"></p>
      <div id="uval" style="display: none;"></div>

					<div class="wrap-input100 validate-input" data-validate = "Enter a valid name">
						<input class="input100 validate" type="text" data-type="fname" name="fname" data-type="fname" id="fname" placeholder="First name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
						</span>
					</div>
					<p id="p1"></p>

					<div class="wrap-input100 validate-input" data-validate = "Enter a valid name">
						<input class="input100 validate" type="text" data-type="lname" name="lname" id="lname" placeholder="Last name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
						</span>
					</div>
					<p id="p2"></p>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 validate" type="password" data-type="pass" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password not matching">
						<input class="input100 validate" type="password" data-type="cpass" name="cpass" id="cpass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="	fa fa-check" aria-hidden="true"></i>
						</span>
					</div>
					<p id="p5"></p>


					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Register" id='submit1' name="submit1">

					</div>


				</form>
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
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		});
	</script>
<!--===============================================================================================validation below-->
	<!-- <script src="js/main.js"></script>  -->
		<script src="js/formvalidate.js"></script>

<script src="js/custom.js"></script>

</body>
</html>
