<?php
session_start();
require 'connect.php';
// echo '1';
$uid=$_SESSION['uid'];
$url=$_POST['url'];
$urlid=$_POST['urlid'];
$token=$_POST['token'];
$val=0;

$qry1="SELECT `tocken_url` FROM `tbl_shorturl` WHERE tocken_url='$token'";
$res1=mysqli_query($conn,$qry1) or die("error while checking tocken");
if(mysqli_num_rows($res1)>0)
{
    $val==2; //existing
    echo $val;
  exit();

}
else if(mysqli_num_rows($res1)==0)
{
      $qry = "UPDATE `tbl_shorturl` SET `org_url`='$url',`tocken_url`='$token' WHERE `uid`='$uid' AND `urlid`='$urlid'";
      $res = mysqli_query($conn, $qry);
      if($res)
      {
      $val=1; //success
      // echo('<p style="font-size:25px; color:black;">update success</p>');
      }
      else
      {
      $val=0; //fail
      // echo('<p style="font-size:25px; color:black;">update fail</p>');
      }
}
echo $val;
