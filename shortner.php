<?php
require ("session.php");
include("connect.php");

if(isset($_POST['url']))
{
  $input_url=$_POST["url"];
  $alt=$_POST["alt"];
  $uid=getSession('uid');
  if(!$uid){
    $uid = '2';
  }

  if(isset($_POST['alt']) && $_POST['alt']!='err')
  {
    //check if alt exists//
    $qry="SELECT `tocken_url` FROM `tbl_shorturl` WHERE tocken_url='$alt'";
    $res=mysqli_query($conn,$qry) or die("error while checking tocken");
    if(mysqli_num_rows($res)==0)
    {
      //if exists
      $short_url = $alt;
    }
    else
    {
      $short_url = false;
      echo('<p style="font-size:25px; color:white; margin-top:30px">Alias unavailable, Please try again</p>');
    }
  }

  else
  {
    //shorten url function
    $short_url_t=substr(md5($input_url.mt_rand()),0,7);
    $qry="SELECT `tocken_url` FROM `tbl_shorturl` WHERE tocken_url='$short_url_t'";
    $res=mysqli_query($conn,$qry) or die("error while checking tocken");
    if(mysqli_num_rows($res)==0)
    {
      $short_url = $short_url_t;

    }
    else
    {
      //return error
      echo('<p style="font-size:25px;color:white; margin-top:30px">Tocken exists, Please try again</p>');
    }

  }

  if($short_url!=false){

    $qry="INSERT INTO `tbl_shorturl`(`uid`, `org_url`, `tocken_url`) VALUES ('$uid','$input_url','$short_url')";
    $res = mysqli_query($conn,$qry) or die("SQL error while inserting to tbl_shorturl");;
    echo '<p style="font-size:25px;color:white;  margin-top:30px">Your New URL Is:</p><br>
    <p style="font-size:10px;color:white;  margin-top:-40px"><a target="_blank" class="display-4 d-block" href="http://localhost/PicoShare/'.$short_url.'">http://localhost/PicoShare/'.$short_url.'</a></p>';

  }
}
// }
