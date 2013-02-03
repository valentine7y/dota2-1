<?php
require_once('../../lib/model/user.php');
require_once('../../lib/common/util.php');

function create_account_step1()
{
	if(empty($_POST['email']) || empty($_POST['passwd1']) || empty($_POST['passwd2']) || empty($_POST['username']) || empty($_POST['captcha']))
	{
		return 1;
	}

	if(!validate_email($_POST['email'])) return 2;

	$passwd1_len = strlen($_POST['passwd1']);
	$passwd2_len = strlen($_POST['passwd2']);
	if($passwd1_len < 6 || $passwd2_len < 6) return 3;

	if($_POST['passwd1'] != $_POST['passwd2']) return 4;

	//tbd: 中文utf8占用3个字节, 怎么检查不超过8个中文或者16个英文
	if(strlen($_POST['username']) > 24) 
	{
		return 5;
	}

	//检查检验码
	if(!isset($_POST['captcha']) || $_POST['captcha'] != $_SESSION['captcha']) return 6;
	
	//检查账号是否已经注册了
	if(User::isEmailExist($_POST['email']))
	{
		return 8;
	}

	$user = new User();
	$user->email = $_POST['email'];
	$passwd = $_POST['passwd1'];
	$user->password = sha1($passwd);
	$user->username = $_POST['username'];

	if(!$user->create())
	{
		return 9;
	}


	$_SESSION['access'] = TRUE;
	$_SESSION['user_id'] = $user->user_id; 
	$_SESSION['username'] = $user->username;
	$_SESSION['email'] = $user->email;
	return 0;
}


function create_account_step2(&$err_msg)
{
	$err = false;
	$gender = 0;
	if(!empty($_POST['gender']) && is_numeric($_POST['gender']))
	{
		$gender = (int) ($_POST['gender']);
	}

	$city_id = 0;
	if(!empty($_POST['province_city']) && is_numeric($_POST['province_city']))
	{
		$city_id = (int) ($_POST['province_city']);
	}

	if($gender != 0 || $city_id != 0)
	{
		$user_id = $_SESSION['user_id'];
		$user = new User();
		if(!$user->create_step2($gender, $city_id, $user_id))
		{
				$err = true;
				$err_msg = '当前站点发生未知错误';
		}
	}
	return $err;
}


function create_account_step3(&$err_msg)
{
	$err = false;
	if(!isset($_FILES['avastar']['name']) || empty($_FILES['avastar']['name']) || empty($_FILES['avastar']['tmp_name']))
	{
		$err_msg =  '上传图片失败，请重新尝试';
		$err = true;
		return $err;
	}

	$filename = $_FILES['avastar']['tmp_name'];

	// Get new dimensions
	list($width, $height) = getimagesize($filename);
	$image = imagecreatefromjpeg($filename);

	// Resample
	$image_p1 = imagecreatetruecolor(160, 160);
	$image_p2 = imagecreatetruecolor(48, 48);

	imagecopyresampled($image_p1, $image, 0, 0, 0, 0, 160, 160, $width, $height);
	imagecopyresampled($image_p2, $image, 0, 0, 0, 0, 48, 48, $width, $height);

	//output
	$outputname1 = '../../pub/images/avastar/' . $_SESSION['user_id'] . 'l.jpg';
	$outputname2 = '../../pub/images/avastar/' . $_SESSION['user_id'] . 'm.jpg';

	imagejpeg($image_p1, $outputname1, 100);
	imagejpeg($image_p2, $outputname2, 100);

	$url = "/images/avastar/" . $_SESSION['user_id']; 

	$user_id = $_SESSION['user_id'];
	$user = new User();
	if(!$user->create_step3($user_id, $url))
	{
		@unlink($outputname1);
		@unlink($outputname2);
		$err = true;
		$err_msg = '当前站点发生未知错误';
		return $err; 
	}


/*
	$url = '/user/' .  $_SESSION['user_id'];
	header("Location: $url");
*/
	return $err;
}

function user_login($email, $password, $remember_login, &$msg, &$error)
{
	$user = new User;
	$user->load_by_email($email);
	if($user->user_id == 0)
	{
		$msg = '该用户不存在';
		$error = true;
		return;
	}

	if($user->password == sha1($password))
	{
		$_SESSION['access'] = TRUE;
		$_SESSION['user_id'] = $user->user_id;
		$_SESSION['username'] = $user->username;
		$_SESSION['email'] = $user->email;

		if($remember_login == 1)
		{
			if(!isset($_COOKIE['user_email']) || !isset($_COOKIE['user_passwd']))
			{
				setcookie('user_email', $_POST['email']);  
				setcookie('user_passwd', $_POST['password']);  
			}
		}
		$msg = '登陆成功';
		$error = false;
	}
	else
	{
		$msg = '输入的密码不正确'; 
		$error = true;
	}
	return;
}

?>

