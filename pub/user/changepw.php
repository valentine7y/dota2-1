<?php
session_start();

if(!isset($_SESSION['access']) || $_SESSION['access'] != TRUE || !isset($_SESSION['user_id']))
{
	$url = "/404.php";
	header("Location: $url");
	exit();
}


$title = '修改密码';
include ('../../lib/common/header.php');

if(isset($_POST['submit']))
{
	include ('../../lib/user.php');
	$err_msg = '';
	$error = FALSE;
	User::TryChangePW($err_msg, $error);
	if($error == FALSE)
	{
		echo '<h3 style="color:blue">' . $err_msg .'</h3>'; 
	}
	else
	{
		echo '<h3 style="color:red">' . $err_msg .'</h3>'; 
	}
	
}
else
{
	include ('../../lib/template/changepw.php');
}

include ('../../lib/common/footer.php');
?>

