<?php
require("connect.php");

function doesExist($sql)
{
	require "connect.php";
	$res = mysqli_query($conn, $sql);
	//no errors in query and returns min. a row
	if($res && mysqli_num_rows($res) > 0)
	{
		return false;
	}
	return true;
}


if(isset($_POST['uname']))
{
	$uname = $_POST['uname'];
	$sql = "select * from tbl_registration where Username='$uname'";
	if(doesExist($sql)){
		echo '0';
	}else{
			echo '1';
	}

}
elseif(isset($_POST['email']))
{
	$email = $_POST['email'];
	$sql = "select * from tbl_registration where email='$email'";
	if(doesExist($sql)){
		echo '0';
	}else{
			echo '1';
	}
}


// $sel=("select * from tbl_registration where email='$email'");
//        $res=mysqli_query($conn,$sel) or die("SQL error While Checking for existing data in DB");
// 	   if(mysqli_num_rows($res)>0)
// 	   {
// 	   		echo('<script type="text/javascript">
// 	   		alert("Email Already taken");
// 	   		</script>');
// 	   }
// 	   else
// 	   {
// 	   		$sel=("select * from tbl_registration where username='$uname'");
//        		$res=mysqli_query($conn,$sel) or die("SQL error While Checking for existing data in DB");
// 	   		if(mysqli_num_rows($res)>0)
// 	   		{
// 	   		echo('<script type="text/javascript">
// 	   		alert("Username Already taken");
// 	   		</script>');
// 	   		}
