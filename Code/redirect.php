<?php
class redirect
{
	function query_db($sql, $key){

		 require "connect.php";

		$data = false;
		$res = mysqli_query($conn, $sql);
		//no errors in query and returns min. a row
		if($res && mysqli_num_rows($res) > 0){
			$data = mysqli_fetch_assoc($res);
			$data = $data['org_url'];
		}

		return $data;
	}


	function url_redir_($token){
		//query
		$sql = "SELECT `org_url`, `tocken_url` FROM `tbl_shorturl` WHERE `tocken_url` = '$token'";
		$url = $this->query_db($sql, 'org_url');
		//returns url or false
		return $url;
	}
}