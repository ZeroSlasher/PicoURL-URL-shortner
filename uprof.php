<?php
require "session.php";
require "connect.php";

$rid=$_SESSION['uid'];
$qryurl="SELECT * from tbl_shorturl WHERE `uid`='$rid'";
$resurl=mysqli_query($conn,$qryurl);
$rowcount=mysqli_num_rows($resurl);

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
                <!-- 	<li><a href="blog.html">News</a></li>
                <li><a href="contact.html">Contact</a></li> -->
              </ul>
            </nav>
            <div class="log_reg">
              <div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
                <?php
                $uname = getSession('uname');
                if (!$uname) {
                  echo '<div class="login log_reg_text"><a href="login.php">Login</a></div>
                  <div class="register log_reg_text"><a href="signup.php">Register</a></div>';
                }else{

                  echo  '<div class="login log_reg_text"><a href="uprof.php">'.$uname.'</a></div>';
                  echo  '<div class="login log_reg_text"><a href="logout.php">logout</a></div>';

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


  <div class="home_background"></div>
  <div class="background_image1 background_city" style="background-image:url(images/city.png)"></div>
  <div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
  <div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
  <div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
  <div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1><?php echo $uname; ?></h1></div>

      <div class="row">
        <div class="col-sm-3"><!--left col-->


          <?php
          if(isset($_POST['save']))
          {
            $fname=$_POST['first_name'];
            $lname=$_POST['last_name'];
            $mobile=$_POST['mobile'];
            // $email=$_POST['email'];
            // $uname=$_POST['user_name'];

            if($_FILES['photo']['name'] !=="")
            {
            $photo=time().$_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'],"images/profile/".$photo);
            $sql="UPDATE `tbl_registration` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile',`photo`='$photo' WHERE `rid`='$rid'";
          }
          else {
            $sql="UPDATE `tbl_registration` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile' WHERE `rid`='$rid'";
          }
            $res=mysqli_query($conn,$sql);
            if($res){
          	echo ("Profile Update Successfull");
            // .show().delay(1000).fadeOut();
            }
            else{
            echo ("Profile Update Failed");
            // .show().delay(1000).fadeOut();

            }

          }
          ?>
          <?php

          $sql="SELECT * FROM `tbl_registration` where rid='$rid'";
          $res=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($res)
          ?>
          <form class="form_uprof" action="#" method="post" id="registrationForm" onsubmit="return update()" enctype="multipart/form-data">
            <div class="text-center">
              <?php
              $fileName="";
              $pic=$row['photo'];
              $pic1="avatar.jpg";
              if(file_exists("images/profile/$pic"))
              {
              $fileName = $pic;
              }
              else if($pic=="")
              {
              $fileName = $pic1;
              }
              else {
              $fileName = $pic1;
              }
              // echo $fileName;
              ?>
              <img src="images/profile/<?php echo $fileName; ?>" class="avatar img-circle img-thumbnail" alt="avatar">

              <h6>Upload a different photo...</h6>
              <!-- if photo is uploaded hide this heading -->
              <input type="file" name="photo" class="text-center center-block file-upload" accept=".jpg, .jpeg, .png">
            </div></hr><br>


            <!-- <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div> -->


          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>PicoURLs</strong></span> <?php echo $rowcount ?></li>

            <!-- optional: like in tinyurl show the length of orginal url with shorturl. whenevre a url is shortened add that length to a vbariable and show it here as length of urls shrinkmed as activity -->
          </ul>



        </div><!--/col-3-->
        <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li class="active tab text-center"><a data-toggle="tab" href="#home">Home</a></li>
            <li class="active tab text-center"><a data-toggle="tab" href="#My_url">My URLs</a></li>
            <li class="active tab text-center"><a data-toggle="tab" href="#change_pwd">Change password</a></li>
            <li class="active tab text-center"><a data-toggle="tab" href="#Notifications">Notifications</a></li>
          </ul>
          <!-- <div class="col-sm-9">
          <button class="active tab text-center" href="#home">Home</button>
          <button class="active tab text-center" href="#My_url">My URLs</button>
          <button class="active tab text-center" href="#change_pwd">Change password</button>
        </div> -->

        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <hr>
            <center><p id="head" style="display: none;">All details are mandatory</p></center>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="first_name"><h4>First name</h4></label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row['fname']; ?>" title="enter your first name if any." >
              </div>
            </div>
            <p id="p1"></p>

            <div class="form-group">

              <div class="col-xs-6">
                <label for="last_name"><h4>Last name</h4></label>
                <input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo $row['lname']; ?>" title="enter your last name if any." >
              </div>
            </div>
            <p id="p2"></p>

            <div class="form-group">
              <div class="col-xs-6">
                <label for="mobile"><h4>Mobile</h4></label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" placeholder="enter mobile number" title="enter your mobile number if any.">
              </div>
            </div>
            <div class="form-group">
              <p id="p3"></p>

              <div class="col-xs-6">
                <label for="email"><h4>Email</h4></label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" title="enter your email." disabled>
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="user_name"><h4>Username</h4></label>
                <input type="text" class="form-control" name="user_name" id="user_name"  value="<?php echo $row['username']; ?>" title="enter your Username" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <button class="btn btn-lg btn-success" type="submit" name="save"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                <center><p id="rightp" style="display: none; color:black;font-color:black;">Profile Update Successfull</p></center>
                <center><p id="wrongp" style="display: none; color:black;font-color:black;">Profile Update Successfull</p></center>
                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
              </div>
            </div>


          </form>

          <hr>

        </div><!--/tab-pane-->
        <div class="tab-pane" id="My_url">
          <hr>



          <table>
            <tr>
              <th>Orginal URL</th>
              <th>Tocken</th>
              <?php
              $uid=$_SESSION['uid'];
              $qryurl="SELECT * from tbl_shorturl WHERE `uid`='$uid'";
              $resurl=mysqli_query($conn,$qryurl);
              $rowcount=mysqli_num_rows($resurl);
              while($row = mysqli_fetch_array($resurl))
              {
                echo"<tr>";
                echo"<td width=\"400px\"><input  id=\"url$row[0]\" type=\"text\" class=\"form-control1\" value='$row[2]'></td> <td><input  id=\"token$row[0]\" type=\"text\" class=\"form-control1\" value='$row[3]'><br/></td>";
                echo "<td><input type=\"button\" class=\"form-control1 urlupdate\" value=\"update\" data-urlid=\"$row[0]\"></td>";
                echo"</tr>";
                // echo "<tr><td>".$row[2]."</td><td>".$row[3]."</td><td><a href='uprof.php?delete=$row[0]'>delete</a>
                // <a href='index.php?updateid=$row[0]&name=$row[1]&course=$row[2]'>update</a></td></tr>";
              }

              ?>
              <center><p id="success" style="display: none; color:black;font-color:black;">URL Update Successfull</p></center>
              <center><p id="fail" style="display: none; color:black;font-color:black;">URL Update Failed</p></center>
              <!-- </tr> -->
            </table>

            <!-- fetch urls shortened by the current user and put them in text boxes with add update and delete -->

          </div><!--/tab-pane-->
          <div class="tab-pane" id="change_pwd">
            <hr>
            <center><p id="head1" style="display: none;">All details are mandatory</p></center>
            <!-- password validation and save to db -->
            <form class="form1" action="#" method="post" id="chngpwd" name="chngpwd" onsubmit="return check_pwd()" enctype="multipart/form-data">
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="curpass"><h4>Current Password</h4></label>
                  <input type="password" class="form-control" name="curpass" id="curpass" placeholder="Current Password" title="enter your current password.">
                </div>
              </div>
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="npass"><h4>New Password</h4></label>
                  <input type="password" class="form-control" name="npass" id="npass" placeholder="New password" title="enter your new password.">
                </div>
              </div>
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="cpass"><h4>Confirm Password</h4></label>
                  <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm password" title="confirm your new password.">
                </div>
              </div>
              <center><p id="right" style="display: none; color:black;font-color:black;">Password Update Successfull</p></center>
              <center><p id="wrong" style="display: none; color:black;font-color:black;">Password Update Failed</p></center>
              <div class="form-group">
                <div class="col-xs-12">
                  <br>
                  <button class="btn btn-lg btn-success" type="submit" id="savepwd" name="savepwd"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                  <!-- clear all fields when pressed-->


                </div>
              </div>


            </form>
          </div>
          <div class="tab-pane" id="Notifications">
            <h3>Notifications</h3>
            <hr></div>
        </div><!--/tab-pane-->
      </div><!--/tab-content-->

    </div><!--/col-9-->
  </div><!--/row-->
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
<script src="js/formvalidate1.js"></script>


<script>
$(document).ready(function() {
  var readURL = function(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.avatar').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }


  $(".file-upload").on('change', function(){
    readURL(this);
  });
});

</script>

</body>
</html>
