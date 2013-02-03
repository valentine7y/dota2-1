<?php
require_once('../../lib/common/db.php');

class User
{
	public $user_id;
	public $email;
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
		$this->user_id = 0;
		$this->email = '';
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


	//创建角色第一步
	public function create()
	{
		$sql = 'insert into user (username, password, email) values(?, ?, ?)';
		$bind_param = array('sss', $this->username, $this->password, $this->email);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;
		
		$this->user_id = $db->last_insert_id();

		$token = md5(uniqid(rand(), true));
		$sql = 'insert into user_token(user_id, token) values(?, ?)';
		$bind_param = array('ds', $this->user_id, $token);

		if($db->execute($sql, $bind_param) != false) 
		{
			send_activate_mail($this->user_id, $this->username, $this->email, $token);

		}
		return true;
	}
	
	//创建角色第二步
	public function create_step2( $gender, $city_id, $user_id)
	{
		$sql = 'update user set gender = ?, city = ? where user_id = ?';
		$bind_param = array('ddd',  $gender, $city_id, $user_id);
		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}
	
	//创建角色第三步
	public function create_step3($user_id, $url)
	{
		$sql = sprintf('update user set avastar = ? where user_id = ?', mysql_real_escape_string($url), $user_id);
		$bind_param = array('sd',  $url, $user_id);

		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}


	public static function isEmailExist($email)
	{
		$sql = 'select user_id, password, username, active from user where email = ?'; 
		$bind_param = array('s', $email);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) != false) 
			{
				return true;
			}
		}
		return false;
	}

	public function load($user_id)
	{
		$sql = 'select email, password, username, active, gender, city, avastar, create_date from user where user_id = ?';
		$bind_param = array('d',  $user_id); 

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->email = $row['email'];
			$this->active = $row['active'];
			$this->gender = $row['gender'];
		//	$this->nickname = $row['nickname'];
			$this->city = $row['city'];
			$this->avastar = $row['avastar'];
			$this->create_date = $row['create_date'];
			$this->user_id= $user_id;
		}
		return true;
	}

	public function load_by_email($email) 
	{
		$sql = 'select user_id, password, username, active from user where email = ?'; 
		$bind_param = array('s',  $email); 

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->active = $row['active'];
			$this->email = $email;
			$this->user_id = $row['user_id'];
		}
		return true;
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


	public static function setActive($user_id, $token, $db_link)
	{
		$query = sprintf('select active from user where user_id = %d', $user_id);

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

		$query = sprintf('select token from user_token where user_id = %d and token = "%s" ', $user_id, mysql_real_escape_string($token));

		$result = mysql_query($query, $db_link);
		if(mysql_num_rows($result) != 1)
		{
			mysql_free_result($result);
			return 3;	//激活信息不存在
		}
		else
		{
			mysql_free_result($result);

			$query = sprintf('update user set active = 1 where user_id = %d', $user_id);
			$result = mysql_query($query, $db_link);
			if(mysql_affected_rows($db_link) != 1)
			{
				return 4;	//激活账号失败
			}
			else 
			{
				$query = sprintf('delete from user_token where user_id = %d and token = "%s" ', $user_id,
						mysql_real_escape_string($token));

				$result = mysql_query($query, $db_link);
				return 0;	//成功
			}

		}
	}

	public static function changePW($db_link, $user_id, $old_passwd, $new_passwd)
	{
		$query = sprintf('select password from user where user_id = %d', $user_id);
		$result = mysql_query($query, $db_link);
		
		if(mysql_num_rows($result) != 1) return 1; //用户不存在

		$row = mysql_fetch_assoc($result);
		$password = $row['password'];
		mysql_free_result($result);

		if($password != sha1($old_passwd)) return 2;//密码不一致

		$new_passwd = sha1($new_passwd);
		$query = sprintf('update user set password = "%s" where user_id = %d',
				mysql_real_escape_string($new_passwd), $user_id);

		$result = mysql_query($query, $db_link);

		if(mysql_affected_rows($db_link) != 1) return 3;//密码修改失败

		return 0; //成功
	}

	//TBD: 需要做时间检查, 超过多长时间code失效
	public static function createResetCode($email, $user_id, $db_link)
	{
		$query = sprintf('select code from user_resetpw where user_id = %d', $user_id);
		$result = mysql_query($query, $db_link);
		
		$code = md5(uniqid(rand(), true));

		//已经存在更新
		if(mysql_num_rows($result) == 1) 
		{
			mysql_free_result($result);

			$query = sprintf('update user_resetpw set code = "%s" where user_id = %d', $code, $user_id);
			$result = mysql_query($query, $db_link);

			if(mysql_affected_rows($db_link) != 1) return 1; 

			User::send_resetpw_mail($email, $code);
			return 0;
		}
		else
		{
			mysql_free_result($result);

			$query = sprintf('insert into user_resetpw (user_id, email, code) values (%d, "%s", "%s")',
					$user_id, mysql_real_escape_string($email), $code); 

			$result = mysql_query($query, $db_link);
			if(mysql_affected_rows($db_link) != 1) return 1; 

			User::send_resetpw_mail($email, $code);
			return 0;

		}
	}

	public static function resetPW($user_id, $new_passwd, $db_link)
	{
		$new_passwd = sha1($new_passwd);
		$query = sprintf('update user set password = "%s" where user_id = %d',
				mysql_real_escape_string($new_passwd), $user_id);

		$result = mysql_query($query, $db_link);

		if(mysql_affected_rows($db_link) != 1) return 1; //失败 

		return 0; //成功
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
		else if(!User::validateemail($_POST['email']))
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
					$user_id = $row['user_id'];

					if(User::createResetCode($_POST['email'], $user_id, $db_link) != 0)
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
			$user_id = $row['user_id'];
			$_SESSION['user_id'] = $user_id;

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
