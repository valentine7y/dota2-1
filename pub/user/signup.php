<?php
session_start();

$title = "注册账号";
include ('../../lib/view/header.php');

if(!isset($_SESSION['signup_phase']))
{
	$_SESSION['signup_phase'] = 1;
}


if( $_SESSION['signup_phase'] == 1)
{
	if(isset($_POST['signup1_submit']))
	{
		include ('../../lib/controller/user.php');
		$ret = create_account_step1();
		if($ret != 0)
		{
			$err_msg = array(1=>'表单内容不能为空，请重新填写', '邮箱格式不正确，请重新输入', '密码长度过短，请重新输入6-20位密码',
				'密码不一致，请重新填写', '昵称过长，请重新输入8位中文或者16位英文昵称', '输入的检验码不正确，请重新输入',
				'数据库错误, 请稍后再试', '这个email账号已经注册了', '创建用户失败');
			include ('../../lib/view/signup1.php');
		}
		else
		{
			$_SESSION['signup_phase'] = 2;
			include ('../../lib/view/signup2.php');
		}
	}
	else
	{
			include ('../../lib/view/signup1.php');
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
		include ('../../lib/controller/user.php');
		$errmsg = '';
		$err = create_account_step2($errmsg); 
		if(!$err)
		{
			include ('../../lib/view/signup3.php');
			$_SESSION['signup_phase'] = 3;
		}
		else
		{
			echo '<h1 style="color:red">' . $errmsg . '</h1>';
		}
	}
	else if(isset($_POST['signup2_skip']))
	{
			include ('../../lib/view/signup3.php');
			$_SESSION['signup_phase'] = 3;
	}
	else
	{
			include ('../../lib/view/signup2.php');
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
		include ('../../lib/controller/user.php');
		$errmsg = '';
		$err = create_account_step3($errmsg);
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
		include ('../../lib/view/signup3.php');
	}
}
else if( $_SESSION['signup_phase'] == 4)
{
}

include "../../lib/view/footer.php";
?>

