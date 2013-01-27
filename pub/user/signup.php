<?php
session_start();

$title = "注册账号";
include ('../../lib/common/header.php');

if(!isset($_SESSION['signup_phase']))
{
	$_SESSION['signup_phase'] = 1;
}


if( $_SESSION['signup_phase'] == 1)
{
	if(isset($_POST['signup1_submit']))
	{
		include ('../../lib/user.php');
		$ret = User::CreateAccountStep1();
		if($ret != 0)
		{
			$err_msg = array(1=>'表单内容不能为空，请重新填写', '邮箱格式不正确，请重新输入', '密码长度过短，请重新输入6-20位密码',
				'密码不一致，请重新填写', '昵称过长，请重新输入8位中文或者16位英文昵称', '输入的检验码不正确，请重新输入',
				'数据库错误, 请稍后再试', '这个email账号已经注册了', '创建用户失败');

			echo '<h3 style="color:red">' . $err_msg[$ret] . '</h3>';
		}
		else
		{
			$_SESSION['signup_phase'] = 2;
			include ('../../lib/template/signup2.php');
		}
	}
	else
	{
			include ('../../lib/template/signup1.php');
	}
}
else if( $_SESSION['signup_phase'] == 2)
{
	if(!isset($_SESSION['access']) ||  $_SESSION['access'] == false)
	{
		$url = BASE_URL . '404.php';
		header("Location: $url");
		exit();
	}

	if(isset($_POST['signup2_submit']))
	{
		include ('../../lib/user.php');
		$errmsg = '';
		$err = User::CreateAccountStep2($errmsg);
		if(!$err)
		{
			include ('../../lib/template/signup3.php');
			$_SESSION['signup_phase'] = 3;
		}
		else
		{
			echo '<h1 style="color:red">' . $errmsg . '</h1>';
		}
	}
	else if(isset($_POST['signup2_skip']))
	{
			include ('../../lib/template/signup3.php');
			$_SESSION['signup_phase'] = 3;
	}
	else
	{
			include ('../../lib/template/signup2.php');
	}
}
else if( $_SESSION['signup_phase'] == 3)
{
	if(!isset($_SESSION['access']) ||  $_SESSION['access'] == false)
	{
		$url = BASE_URL . '404.php';
		header("Location: $url");
		exit();
	}

	if(isset($_POST['signup3_submit']))
	{
		include ('../../lib/user.php');
		$errmsg = '';
		$err = User::CreateAccountStep3($errmsg);
		$_SESSION['signup_phase'] = 4;

		if(!$err)
		{
			echo '<h1 style="color:red">' . '注册成功了' . '</h1>';
		}
		else
		{
			echo '<h1 style="color:red">' . $errmsg . '</h1>';
		}
	}
	else if(isset($_POST['signup3_skip']))
	{
		$url = '/user/' .  $_SESSION[user_id];
		header("Location: $url");
		exit();
	}
	else
	{
		include ('../../lib/template/signup3.php');
	}
}
else if( $_SESSION['signup_phase'] == 4)
{
}

include "../../lib/common/footer.php";
?>

