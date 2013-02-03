<?php
require_once('config.php');
require_once('cache.php');

function get_array_ref($arr)
{
	$refs = array();
	foreach($arr as $key => $value)
	{
		$refs[$key] = &$arr[$key];
	}
	
	return $refs;
}


//$str='2012-12-24'
function check_date($str)
{
	$stamp = strtotime($str);
	if(!is_numeric($stamp)) return false;

	if(checkdate(date('m', $stamp), date('d', $stamp), date('Y', $stamp)))
	{
		return true;
	}
	return false;

}

function check_isset($form_vars)
{
	foreach($form_vars as $key => $value)
	{
		if(!isset($key)) return false; 
	}
	return true;
}

function check_not_empty($form_vars)
{
	foreach($form_vars as $key => $value)
	{
		if(!isset($key) || ($value == '')) return false; 
	}
	return true;
}


function validate_email($address) {
  // check an email address is possibly valid
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
    return true;
  } else {
    return false;
  }
}


function validate_email2($address)
{
	return filter_var($address , FILTER_VALIDATE_EMAIL);
}


function do_serialize($obj)
{
	return base64_encode(gzcompress(serialize($obj)));
}

function do_unserialize($test)
{
	return unserialize(gzuncompress(base64_decode($text)));
}

function get_key($key_type, $key_id)
{
	return $key_type . ':' .  $key_id;
}

function set_cache($key, $value)
{
	$cache = new Cache();
	return $cache->set($key, $value);
}

function get_cache($key)
{
	$cache = new Cache();
	return $cache->get($key);
}

function clr_cache($key)
{
	$cache = new Cache();
	return $cache->delete($key);
}

function try_login()
{
		if(isset($_SESSION['access']) && $_SESSION['access'] == TRUE)
		{
			echo '<a href=' . DOMAIN_MAIN . 'user/logout.php rel="nofollow">注销</a>';
		}
		else
		{
			echo '<a href=' . DOMAIN_MAIN . 'user/login.php rel="nofollow">登陆</a>';
			echo '<a href=' . DOMAIN_MAIN . 'user/signup.php rel="nofollow">注册</a>';
		}
}

function error_page()
{
	$title = '碰见大姨妈';
	include ('../../lib/view/header.php');
	echo "发生未知错误";
    include ('../../lib/view/footer.php');
	exit();
}

function log_error($level, $err_msg)
{
	if($level >= LOG_LEVEL)
	{
		echo $err_msg; 
		echo "<br \>";
	} 
}


function send_activate_mail($uid, $username, $email, $token)
{
	$body = "$username, 你好!\n";
	$body .= "感谢你注册新账户, 你使用的邮箱地址是: $email\n";
	$body .= "请点击下面的链接完成验证:\n";
	$body .= BASE_URL . 'user/activate.php?x=' . $uid . "&y=$token\n";
	$body .= "如果邮箱里不能打开链接，也可以将它复制到浏览器地址栏里打开。\n";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=utf-8\r\n";
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
	$headers .= "From: admin@9dota.cn";

	$subject = $username . ',请验证你在9dota上注册的Email';
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

	@mail($email, $subject, $body, $headers);
}

?>
