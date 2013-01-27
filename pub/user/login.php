<?php
session_start();

if(isset($_SESSION['access']) && $_SESSION['access'] == TRUE)
{
	$url = 'Location: /user/' . $_SESSION['user_id'];
	header($url);
	exit();
}

$title = "登录";
include ('../../lib/common/header.php');

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



if(isset($_POST['login_submit']))
{
	if(empty($_POST['email']) || empty($_POST['password']))
	{
		$msg =  "邮箱和密码不能为空，请重新输入";
		$error = true;
	}
	else
	{
		$msg = '';
		$error = false;
		$remember_login = 0;
		if(isset($_POST['remLogin']) && $_POST['remLogin'] == 1)
		{
			$remeber_login = true;
		}

		include ('../../lib/user.php');
		User::Login($_POST['email'], $_POST['password'], $remember_login, $msg, $error);
	}
	if($error)
	{
		echo $msg;
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
	include "../../lib/template/login.php";
}


include "../../lib/common/footer.php";
?>
