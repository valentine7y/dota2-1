<?php
require_once('common/db.php');


class Narrator
{
	public $narrator_id;
	public $narrator_name;
	public $narrator_nickname;
	public $narrator_pic;
	public $narrator_weibo;
	public $narrator_qq;
	public $narrator_yy;
	public $narrator_intro;
	

	public static function add_narrator()
	{
		if(!isset( $_POST['narrator_name']) || !isset($_POST['narrator_nickname']) 
				|| !isset($_POST['narrator_pic']) || !isset( $_POST['narrator_weibo']) || !isset($_POST['narrator_qq']) 
				|| !isset($_POST['narrator_yy']) || !isset($_POST['narrator_intro']))
		{
			return false;
		}	
		
		if(empty( $_POST['narrator_name']) || empty($_POST['narrator_nickname']) 
				|| empty($_POST['narrator_pic']) || empty( $_POST['narrator_weibo']) || empty($_POST['narrator_qq']) 
				|| empty($_POST['narrator_yy']) || empty($_POST['narrator_intro']))
		{
			return false;
		}	


		$narrator = new Narrator();
		$narrator->narrator_name =  $_POST['narrator_name'];
		$narrator->narrator_nickname = $_POST['narrator_nickname'];
		$narrator->narrator_pic = $_POST['narrator_pic'];
		$narrator->narrator_weibo = $_POST['narrator_weibo'];
		$narrator->narrator_qq = $_POST['narrator_qq'];
		$narrator->narrator_yy = $_POST['narrator_yy'];
		$narrator->narrator_intro =  $_POST['narrator_intro'];
		
		return $narrator->save();
	}

	public function save()
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('insert into narrator(narrator_name, narrator_nickname, narrator_pic, narrator_weibo, narrator_qq, narrator_yy, narrator_intro) values("%s", "%s", "%s", "%s", "%s", "%s", "%s")',
					mysql_real_escape_string($this->narrator_name),
					mysql_real_escape_string($this->narrator_nickname),
					mysql_real_escape_string($this->narrator_pic),
					mysql_real_escape_string($this->narrator_weibo),
					mysql_real_escape_string($this->narrator_qq),
					mysql_real_escape_string($this->narrator_yy),
					mysql_real_escape_string($this->narrator_intro));


			if(mysql_query($query, $db_link))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}
	
	
	public function load($narrator_id)
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('select narrator_name, narrator_nickname, narrator_pic, narrator_weibo, narrator_qq, narrator_yy, narrator_intro from narrator where narrator_id = %d', $narrator_id);
		
			echo $query;
			$result = mysql_query($query, $db_link);
			if(mysql_num_rows($result))
			{
				$row = mysql_fetch_assoc($result);

				$this->narrator_id = $narrator_id; 
				$this->narrator_name = $row['narrator_name'];
				$this->narrator_nickname = $row['narrator_nickname'];
				$this->narrator_pic = $row['narrator_pic'];
				$this->narrator_weibo = $row['narrator_weibo'];
				$this->narrator_qq = $row['narrator_qq'];
				$this->narrator_yy = $row['narrator_yy'];
				$this->narrator_intro = $row['narrator_intro'];
				return true;
			}
		}
		return false;
	}

}
