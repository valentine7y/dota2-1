<?php
session_start();

if(isset($_SESSION['access']) && $_SESSION['access'] == TRUE)
{
	$url = 'Location: /user/' . $_SESSION['user_id'];
	header($url);
	exit();
}


$email = "";
$passwd = "";
if(isset($_COOKIE['user_email']))
{
	$email = $_COOKIE['user_email'];
}

if(isset($_COOKIE['user_passwd']))
{
	$passwd = $_COOKIE['user_passwd'];
}



$title = "登录";
include ('../../lib/view/header.php');
if(isset($_POST['login_submit']))
{
	if(empty($_POST['email']) || empty($_POST['password']))
	{
		$err_msg =  "邮箱和密码不能为空，请重新输入";
		$error = true;
		include "../../lib/view/login.php";
	}
	else
	{
		$err_msg = '';
		$error = false;
		$remember_login = 0;
		if(isset($_POST['remLogin']) && $_POST['remLogin'] == 1)
		{
			$remeber_login = true;
		}

		include ('../../lib/controller/user.php');
		user_login($_POST['email'], $_POST['password'], $remember_login, $err_msg, $error);
	}
	if($error)
	{
		include "../../lib/view/login.php";
	}
	else
	{
		$url = 'Location: /user/' . $_SESSION['user_id'];
		header($url);
		exit();
	}
}
else
{
	include "../../lib/view/login.php";
}


include "../../lib/view/footer.php";
?>

