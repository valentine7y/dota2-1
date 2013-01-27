<?php
session_start();

$title = '忘记密码';
include ('../../lib/common/header.php');

if(isset($_SESSION['access']) && $_SESSION['access'] == TRUE)
{
	$url = BASE_URL . '404.php';
	header("Location: $url");
	exit();

}

if(isset($_POST['code_submit']))
{
	include ('../../lib/user.php');
	$err = FALSE;
	$err_msg = '';
	User::ResetPasswdPrepare($err, $err_msg);

	if($err == false)
	{
		echo '<h3 style="color:blue">' . $err_msg . '</h3>';
	}
	else
	{
		echo '<h3 style="color:red">' . $err_msg . '</h3>';
	}
}
else if(isset($_GET['code']) && !empty($_GET['code']))
{
	include ('../../lib/user.php');
	$err = FALSE;
	$err_msg = '';
	$code = $_GET['code'];
	User::ResetPasswdCheck($code, $err, $err_msg);

	if($err == false)
	{
		include ('../../lib/template/resetpw2.php');
	}
	else
	{
		echo '<h3 style="color:red">' . $err_msg . '</h3>';
	}
}
else if(isset($_POST['reset_submit']) && !empty($_POST['reset_submit']) 
	&& isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id']))
{
	include ('../../lib/user.php');
	$err = FALSE;
	$err_msg = '';
	User::ResetPasswd($err, $err_msg);

	if($err == false)
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
	include ('../../lib/template/resetpw.php');
}

include ('../../lib/common/footer.php');
?>

