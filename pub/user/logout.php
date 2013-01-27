<?php
session_start();

if(!isset($_SESSION['access']) || $_SESSION['access'] == FALSE)
{
	$url = 'Location: /404.php';
	header($url);
	exit();
}


$_SESSION = array();
session_destroy();

if(isset($_COOKIE[session_name()]))
{
	setcookie(session_name(), '', time()-42000, '/');
}


$title = "注销";
$msg = '注销成功';

include ('../../lib/common/header.php');
echo $msg;
include ('../../lib/common/footer.php');
?>
