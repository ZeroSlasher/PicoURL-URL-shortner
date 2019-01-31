<?php
session_start();
require 'connect.php';
$uid=$_SESSION['uid'];
$response = "";


  $fname=$_POST['first_name'];
  $lname=$_POST['last_name'];
  $mobile=$_POST['mobile'];
  // $email=$_POST['email'];
  // $uname=$_POST['user_name'];
  // $photo=time().$_FILES['photo']['name'];
  // move_uploaded_file($_FILES['photo']['tmp_name'],"images/profile/".$photo);
  $sql="UPDATE `tbl_registration` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile' WHERE `rid`='$uid'";
  $res=mysqli_query($conn,$sql);
  if($res){
    $response = "001";
  }
  else {
    $response = "err";
  }

  echo $response;

 ?>
