<?php
require('session.php');

delSession('uname');
delSession('utype');
delSession('uid');


session_destroy();
header('location:home.php');
?>
