<?php
require_once('../../lib/common/db.php');

class Team
{
	public $team_id;
	public $team_name;
	public $team_nickname;
	public $team_icon;
	public $team_country;
	public $team_city;
	public $team_desc;
	public $team_weibo;
	public $team_createtime;	
	public $team_member;


	public function __construct()
	{
		$this->team_member = array();
	}

	public function add()
	{
		$sql = 'insert into team(team_name, team_nickname, team_icon, team_country, team_city, team_desc, team_weibo,
					team_createtime) values (?, ?, ?, ?, ?, ?, ?, ?)';
		$bind_param = array('ssssssss', $this->team_name, $this->team_nickname, $this->team_icon, $this->team_country, $this->team_city,
				 $this->team_desc, $this->team_weibo, $this->team_createtime);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->team_id = $db->last_insert_id();
		return true;
	}

	public function update()
	{
		$sql = 'update team set team_name=?, team_nickname=?, team_icon=?, team_country=?, team_city=?, team_desc=?, team_weibo=?,
				team_createtime=? where team_id = ?';
		$bind_param = array('ssssssssd', $this->team_name, $this->team_nickname, $this->team_icon, $this->team_country, $this->team_city,
				 $this->team_desc, $this->team_weibo, $this->team_createtime, $this->team_id);

		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}

	public function load($team_id)
	{
		$sql = 'select team_name, team_nickname, team_icon, team_country, team_city, team_desc, team_weibo, team_createtime 
						from team where team_id = ?';
		$bind_param = array('i', $team_id);
		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) != false) 
			{
				$this->team_id = $team_id;
				$this->team_name = $row['team_name'];
				$this->team_nickname = $row['team_nickname'];
				$this->team_icon = $row['team_icon'];
				$this->team_country = $row['team_country'];
				$this->team_city = $row['team_city'];
				$this->team_desc = $row['team_desc'];
				$this->team_weibo = $row['team_weibo'];
				$this->team_createtime = $row['team_createtime'];
				$result->close();

				$sql= 'select member_id, member_name, member_pic from team_member where team_id = ?';
				$bind_param = array('d', $team_id);
				if(($result = $db->execute($sql, $bind_param)) != false)
				{
					$this->team_member = $db->fetch_all($result); 
				}
				return true;
			}
		}
		return false;
	}

}


?>
