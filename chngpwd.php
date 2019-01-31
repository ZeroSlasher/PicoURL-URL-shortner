<?php
session_start();
require 'connect.php';
  $uid=$_SESSION['uid'];
  $curpass=$_POST['curpass'];
  $npass=$_POST['npass'];

  $response = "";


    $qurypwd = "SELECT password FROM `tbl_login` WHERE `regid` = '$uid'";
    $respwd=mysqli_query($conn, $qurypwd);
    $respwd = mysqli_fetch_assoc($respwd);
    if($curpass == $respwd['password'])
    {
      $qurychng="UPDATE `tbl_login` SET `password`='$npass' WHERE `regid`='$uid'";
      $reschng=mysqli_query($conn,$qurychng);

      $response = "001";
      // echo('<p style="font-size:25px; color:white; margin-top:30px">Password Changed Successfully</p>');
    }else{
      $response = "err";
      // echo('<p style="font-size:25px; color:white; margin-top:30px">Check Your Password</p>');
    }


echo $response;
?>
