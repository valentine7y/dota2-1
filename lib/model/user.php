<?php
require_once ('common/db.php');

class User
{
	public $uid;
	public $emailAddr;
	public $password;
	public $username;
	public $active;
	public $nickname;
	public $gender;
	public $city;
	public $avastar;
	public $create_date;

	public function __construct()
	{
		$this->uid = 0;
		$this->emailAddr = '';
		$this->password = '';
		$this->username = '';
		$this->active = 0;
		$this->nickname = '';
		$this->gender = 0;
		$this->city = 0;
		$this->avastar = '';
	}

	public function __get($field)
	{
		return $this->field;
	}

	public function __set($field, $value)
	{
		$this->field = $value;
	}

	public static function validateEmailAddr($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public static function getById($user_id, $db_link)
	{
		$user = new User();
		$query = sprintf('select email, password, username, active from user where id = %d', $user_id);
		$result = mysql_query($query, $db_link);
		
		if(mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_assoc($result);
			$user->username = $row['username'];
			$user->password = $row['password'];
			$user->emailAddr = $row['email'];
			$user->active = $row['active'];
			$user->uid = $user_id;

		}
		mysql_free_result($result);
		return $user;
	}

	public static function getByUserMail($usermail, $db_link)
	{
		$user = new User();
		$query = sprintf('select user_id, password, username, active from user where email = "%s"', 
				mysql_real_escape_string($usermail));

		$result = mysql_query($query, $db_link);
		
		if(mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_assoc($result);
			$user->username = $row['username'];
			$user->password = $row['password'];
			$user->active = $row['active'];
			$user->emailAddr = $usermail;
			$user->uid = $row['user_id'];

		}
		mysql_free_result($result);
		return $user;

	}

	public static function send_activate_mail($uid, $username, $email, $token)
	{
		$body = "$username, 你好!\n";
		$body .= "感谢你在17lol上注册新账户, 你使用的邮箱地址是: $email\n";
		$body .= "请点击下面的链接完成验证:\n";
		$body .= BASE_URL . 'user/activate.php?x=' . $uid . "&y=$token\n";
		$body .= "如果邮箱里不能打开链接，也可以将它复制到浏览器地址栏里打开。\n";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$headers .= "From: niba@niba.com";

		$subject = $username . ',请验证你在17lol上注册的Email';
		$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

	  @mail($email, $subject, $body, $headers);

	}

	public static function send_resetpw_mail($email, $code)
	{
		$body = "你好!\n";
		$body .= " 请访问下方链接来重置你在17lol的密码（该链接48小时内有效）：\n"; 
		$body .= BASE_URL . 'user/resetpw.php?code=' . $code . "\n";
		$body .= "如果你没有使用“忘记密码”功能，请忽略此邮件。\n";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$headers .= "From: niba@niba.com";

		$subject =  '重置密码';
		$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

	  @mail($email, $subject, $body, $headers);
	}

	public function create($db_link)
	{
		$query = sprintf('insert into user (username, password, email) values("%s", "%s", "%s")',
				mysql_real_escape_string($this->username), 
				mysql_real_escape_string($this->password),
				mysql_real_escape_string($this->emailAddr));

		$result = mysql_query($query, $db_link);
		if(mysql_affected_rows($db_link) == 1)
		{
			$this->uid = mysql_insert_id($db_link);

			$token = md5(uniqid(rand(), true));
			$query = sprintf('insert into user_token(user_id, token) values("%d", "%s")',
					$this->uid, $token);

			mysql_query($query, $db_link);
			if(mysql_affected_rows($db_link) == 1)
			{
				User::send_activate_mail($this->uid, $this->username, $this->emailAddr, $token);
			}
			return true;
		}
		else
		{
			return false;
		}
	}

	public function load($db_link, $uid)
	{
		$query = sprintf('select email, password, username, active, gender, city, avastar, create_date from user where user_id = %d', $uid);
		$result = mysql_query($query, $db_link);
		
		if(mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_assoc($result);
			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->emailAddr = $row['email'];
			$this->active = $row['active'];
			$this->gender = $row['gender'];
		//	$this->nickname = $row['nickname'];
			$this->city = $row['city'];
			$this->avastar = $row['avastar'];
			$this->create_date = $row['create_date'];
			$this->uid = $uid;

			mysql_free_result($result);
			return true;

		}
		return false;
	}

	public static function setActive($uid, $token, $db_link)
	{
		$query = sprintf('select active from user where user_id = %d', $uid);

		$result = mysql_query($query, $db_link);
		if(mysql_num_rows($result) != 1)
		{
			mysql_free_result($result);
			return 1; //用户不存在
		}
		else
		{
			$row = mysql_fetch_assoc($result);
			$active = $row['active'];
			if($active)
			{
				mysql_free_result($result);
				return 2; //用户已经激活
			}

		}

		$query = sprintf('select token from user_token where user_id = %d and token = "%s" ', $uid, 
					mysql_real_escape_string($token));

		$result = mysql_query($query, $db_link);
		if(mysql_num_rows($result) != 1)
		{
			mysql_free_result($result);
			return 3;	//激活信息不存在
		}
		else
		{
			mysql_free_result($result);

			$query = sprintf('update user set active = 1 where user_id = %d', $uid);
			$result = mysql_query($query, $db_link);
			if(mysql_affected_rows($db_link) != 1)
			{
				return 4;	//激活账号失败
			}
			else 
			{
				$query = sprintf('delete from user_token where user_id = %d and token = "%s" ', $uid,
						mysql_real_escape_string($token));

				$result = mysql_query($query, $db_link);
				return 0;	//成功
			}

		}
	}

	public static function changePW($db_link, $uid, $old_passwd, $new_passwd)
	{
		$query = sprintf('select password from user where user_id = %d', $uid);
		$result = mysql_query($query, $db_link);
		
		if(mysql_num_rows($result) != 1) return 1; //用户不存在

		$row = mysql_fetch_assoc($result);
		$password = $row['password'];
		mysql_free_result($result);

		if($password != sha1($old_passwd)) return 2;//密码不一致

		$new_passwd = sha1($new_passwd);
		$query = sprintf('update user set password = "%s" where user_id = %d',
				mysql_real_escape_string($new_passwd), $uid);

		$result = mysql_query($query, $db_link);

		if(mysql_affected_rows($db_link) != 1) return 3;//密码修改失败

		return 0; //成功
	}

	//TBD: 需要做时间检查, 超过多长时间code失效
	public static function createResetCode($email, $uid, $db_link)
	{
		$query = sprintf('select code from user_resetpw where user_id = %d', $uid);
		$result = mysql_query($query, $db_link);
		
		$code = md5(uniqid(rand(), true));

		//已经存在更新
		if(mysql_num_rows($result) == 1) 
		{
			mysql_free_result($result);

			$query = sprintf('update user_resetpw set code = "%s" where user_id = %d', $code, $uid);
			$result = mysql_query($query, $db_link);

			if(mysql_affected_rows($db_link) != 1) return 1; 

			User::send_resetpw_mail($email, $code);
			return 0;
		}
		else
		{
			mysql_free_result($result);

			$query = sprintf('insert into user_resetpw (user_id, email, code) values (%d, "%s", "%s")',
					$uid, mysql_real_escape_string($email), $code); 

			$result = mysql_query($query, $db_link);
			if(mysql_affected_rows($db_link) != 1) return 1; 

			User::send_resetpw_mail($email, $code);
			return 0;

		}
	}

	public static function resetPW($uid, $new_passwd, $db_link)
	{
		$new_passwd = sha1($new_passwd);
		$query = sprintf('update user set password = "%s" where user_id = %d',
				mysql_real_escape_string($new_passwd), $uid);

		$result = mysql_query($query, $db_link);

		if(mysql_affected_rows($db_link) != 1) return 1; //失败 

		return 0; //成功
	}

	public static function CreateAccountStep1()
	{
		echo "1";
		if(empty($_POST['email']) || empty($_POST['passwd1']) || empty($_POST['passwd2']) || empty($_POST['username'])
				|| empty($_POST['captcha']))
		{
			return 1;
		}

		echo "2";
		if(!User::validateEmailAddr($_POST['email'])) return 2;

		$passwd1_len = strlen($_POST['passwd1']);
		$passwd2_len = strlen($_POST['passwd2']);
		if($passwd1_len < 6 || $passwd2_len < 6) return 3;

		if($_POST['passwd1'] != $_POST['passwd2']) return 4;

		//tbd: 中文utf8占用3个字节, 怎么检查不超过8个中文或者16个英文
		if(strlen($_POST['username']) > 24) 
		{
			return 5;
		}

		/*tbd 暂时先屏蔽这个, 因为目前的php不支持gd库
		//检查检验码
		if(!isset($_POST['captcha']) || $_POST['captcha'] != $_SESSION['captcha']) return 6;
		*/


		echo "3";
		$db = new DB();
		$db_link = $db->connect();
		if($db_link == false) return 7;

		//检查账号是否已经注册了
		$user = User::getByUserMail($_POST['email'], $db_link);
		if($user->uid)
		{
			return 8;
		}
		//未注册可以写数据库
		else
		{
			$user = new User();
			$user->emailAddr = $_POST['email'];
			$passwd = $_POST['passwd1'];
			$user->password = sha1($passwd);
			$user->username = $_POST['username'];

			if(!$user->create($db_link))
			{
				return 9;
			}

			$_SESSION['access'] = TRUE;
			$_SESSION['user_id'] = $user->uid; 
			$_SESSION['username'] = $user->username;

		}
		return 0;
	}

	public static function CreateAccountStep2(&$err_msg)
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
			$db = new DB();
			$db_link = $db->connect();
			if($db_link == false)
			{
				$err = true;
				$err_msg = '当前站点发生未知错误';
			}
			else
			{
				$user_id = $_SESSION['user_id'];
				$query = sprintf('update user set gender = %d, city = %d where user_id = %d', $gender, $city_id, $user_id);
				$result = mysql_query($query, $db_link);
				if(mysql_affected_rows($db_link) != 1)
				{
					$err = true;
					$err_msg = '当前站点发生未知错误';
				}
			}
		}
		return $err;
	}
	
	public static function CreateAccountStep3(&$err_msg)
	{
		if(!isset($_FILES['avastar']['name']) || empty($_FILES['avastar']['name']))
		{
			$err_msg =  '上传图片失败，请重新尝试';
			$err = true;
		}
		else
		{
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
			$outputname1 = '../../img/avastar/' . $_SESSION['user_id'] . 'l.jpg';
			$outputname2 = '../../img/avastar/' . $_SESSION['user_id'] . 'm.jpg';

			imagejpeg($image_p1, $outputname1, 100);
			imagejpeg($image_p2, $outputname2, 100);

			$url = "avastar/" . $_SESSION['user_id']; 

			$db = new DB();
			$db_link = $db->connect();
			if($db_link == false)
			{
				$err = true;
				$err_msg = '当前站点发生未知错误';
				@unlink($outputname);
			}
			else
			{
				$user_id = $_SESSION['user_id'];
				$query = sprintf('update user set avastar = "%s" where user_id = %d', mysql_real_escape_string($url), $user_id);
				$result = mysql_query($query, $db_link);

				if(mysql_affected_rows($db_link) != 1)
				{
					$err = true;
					$err_msg = '当前站点发生未知错误';
				}

				$url = '/user/' .  $_SESSION[user_id];
				header("Location: $url");
				exit();
			}
		}
	}

	public static function Login($email, $password, $remember_login, &$msg, &$error)
	{
		$db = new DB();
		$db_link = $db->connect();

		if($db_link == false)
		{
			$msg =  '数据库错误, 请稍后再试';
			$error = true;
		}
		else
		{
			$user = User::getByUserMail($email, $db_link);

			if($user->uid == 0)
			{
				$msg = '该用户不存在';
				$error = true;
			}
			else if($user->password == sha1($password))
			{
				$_SESSION['access'] = TRUE;
				$_SESSION['user_id'] = $user->uid;
				$_SESSION['username'] = $user->username;

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
		}

	}
	
	public static function TryChangePW(&$err_msg, &$error)
	{
		if(empty($_POST['old_passwd']) || empty($_POST['new_passwd1']) || empty($_POST['new_passwd2']))
		{
			$error = TRUE;
			$err_msg = '密码不能为空，请重新输入';

		}
		else if(strlen($_POST['old_passwd']) > 20 || strlen($_POST['old_passwd']) < 6 ||
				strlen($_POST['new_passwd1']) > 20 || strlen($_POST['new_passwd1']) < 6 ||
				strlen($_POST['new_passwd2']) > 20 || strlen($_POST['new_passwd2']) < 6)
		{
			$error = TRUE;
			$err_msg = '密码长度不对，请输入6-20位密码';
		}
		else if($_POST['new_passwd1'] != $_POST['new_passwd2'])
		{
			$error = TRUE;
			$err_msg = '两次输入的新密码不相同，请重新输入';
		}
		else
		{
			$db = new DB();
			$db_link = $db->connect();

			if($db_link == false)
			{
				$error = TRUE;
				$err_msg =  '网站当前发生错误, 请稍后再试';
			}
			else
			{
				$ret = User::changePW($db_link, $_SESSION['user_id'], $_POST['old_passwd'], $_POST['new_passwd2']);
				if($ret == 1)
				{
					$error = TRUE;
					$err_msg = '发生错误，用户不存在'; 
				}
				else if($ret == 2)
				{
					$error = TRUE;
					$err_msg = '旧密码错误，请输入正确的旧密码';
				}
				else if($ret == 3)
				{
					$error = TRUE;
					$err_msg = '密码修改失败';
				}
				else if($ret == 0)
				{
					$error = FALSE;
					$err_msg = '密码修改成功';
				}
			}
		}
	}
	
	public static function ResetPasswdPrepare(&$err, &$err_msg)
	{
		if(empty($_POST['email']))
		{
			$err = true;
			$err_msg = '邮箱不能为空';
		}
		else if(!User::validateEmailAddr($_POST['email']))
		{
			$err = true;
			$err_msg = '邮箱格式不正确';
		}
		else
		{
			$db = new DB();
			$db_link = $db->connect();
			if($db_link == false)
			{
				$err = true;
				$err_msg = '当前站点发生未知错误';
			}
			else
			{
				$query = sprintf('select user_id from user where email = "%s" ', 
						mysql_real_escape_string($_POST['email']));

				$result = mysql_query($query, $db_link);
				if(mysql_num_rows($result) != 1)
				{
					$err = true;
					$err_msg = '该邮箱不存在';
				}
				else
				{
					$row = mysql_fetch_assoc($result);
					$uid = $row['user_id'];

					if(User::createResetCode($_POST['email'], $uid, $db_link) != 0)
					{
						$err = true;
						$err_msg = '重置密码失败，请重新尝试';
					}
					else
					{
						$err = false;
						$err_msg = '重置密码的邮件已经发送，请尽快收取邮件重置密码';
					}
				}

			}
		}
	}
	
	public static function ResetPasswdCheck($code, &$err, &$err_msg)
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link == false)
		{
			$err = true;
			$err_msg = '当前站点发生未知错误';
			return;
		}

		$query = sprintf('select user_id from user_resetpw where code = "%s" ', 
				mysql_real_escape_string($_GET['code']));

		$result = mysql_query($query, $db_link);
		if(mysql_num_rows($result) != 1)
		{
			$err = true;
			$err_msg = '重置code不正确';
		}
		else
		{
			$row = mysql_fetch_assoc($result);
			$uid = $row['user_id'];
			$_SESSION['user_id'] = $uid;

			$err = false;
		}
	}
	
	public static function ResetPasswd(&$err, &$err_msg)
	{
		if(empty($_POST['new_passwd1']) || empty($_POST['new_passwd2']))
		{
			$err = true;
			$err_msg = '密码不能为空';
		}
		else if(strlen($_POST['new_passwd1']) > 20 || strlen($_POST['new_passwd1']) < 6 ||
				strlen($_POST['new_passwd2']) > 20 || strlen($_POST['new_passwd2']) < 6)
		{
			$err = true;
			$err_msg = '密码长度不对，请输入6-20位密码';
		}
		else if($_POST['new_passwd1'] != $_POST['new_passwd2'])
		{
			$err = true;
			$err_msg = '两次输入的新密码不相同，请重新输入';
		}
		else
		{
			$db = new DB();
			$db_link = $db->connect();

			if($db_link == false)
			{
				$err = true;
				$err_msg =  '网站当前发生错误, 请稍后再试';
			}
			else
			{
				if(User::resetPW($_SESSION['user_id'], $_POST['new_passwd1'], $db_link) != 0)
				{
					$err = true;
					$err_msg = '重置密码失败，请重新尝试';
				}
				else
				{
					$err = false;
					$err_msg = '重置密码成功';
				}
			}
		}
	}
}



?>
