<?php
require_once('../../lib/common/db.php');

class Member 
{
	public $member_id;
	public $team_id;
	public $team_name;
	public $member_name;
	public $member_match_name;
	public $member_rname;
	public $member_ename;
	public $member_birthday;
	public $member_pic;
	public $member_account_zone;
	public $member_account_zonename;
	public $member_account_name;
	public $memeber_position;
	public $memeber_position_name;
	public $memeber_desc;
	public $memeber_weibo;


	public function add()
	{
		$sql = 'insert into team_member(team_id, member_name, member_match_name, member_rname, member_ename, 
					member_pic, member_account_zone, member_account_name, member_position, member_desc, member_weibo) 
				values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

		$bind_param = array('dsssssssdss', $this->team_id, $this->member_name, $this->member_match_name, $this->member_rname, $this->member_ename,
				$this->member_pic, $this->member_account_zone, $this->member_account_name, $this->member_position, $this->member_desc, $this->member_weibo);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->team_id = $db->last_insert_id();
		return true;
	}

	public function update()
	{
		$sql = 'update team_member set team_id=?, member_name=?, member_match_name=?, member_rname=?, 
				member_ename=?, member_pic=?, member_account_zone=?, member_account_name=?, member_position=?, 
				member_desc=?, member_weibo=? where member_id=?'; 

		$bind_param = array('dsssssssdssd', $this->team_id, $this->member_name, $this->member_match_name, $this->member_rname, $this->member_ename,
				$this->member_pic, $this->member_account_zone, $this->member_account_name, $this->member_position, $this->member_desc, $this->member_weibo,
				$this->member_id);

		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}


	public function load($member_id)
	{
		$sql = 'select member_name, t1.team_id, team_name, member_match_name, member_rname, member_ename, 
				member_birthday, member_pic, member_account_zone, member_account_name, member_position, member_desc, 
				member_weibo from team_member as t1 inner join team as t2 on t1.team_id = t2.team_id 
				where member_id = ?';
		$bind_param = array('d', $member_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			global $zone_list;
			global $position_list;
			$this->member_id = $member_id;
			$this->team_id = $row['team_id'];
			$this->team_name = $row['team_name'];
			$this->member_name = $row['member_name'];
			$this->member_match_name = $row['member_match_name'];
			$this->member_rname = $row['member_rname'];
			$this->member_ename = $row['member_ename'];
			$this->member_birthday = $row['member_birthday'];
			$this->member_pic = $row['member_pic'];
			$this->member_account_zone  = $row['member_account_zone'];
			$this->member_account_zonename  = $zone_list[$row['member_account_zone']];
			$this->member_account_name  = $row['member_account_name'];
			$this->member_position = $row['member_position'];
			$this->member_position_name = $position_list[$row['member_position']];
			$this->member_desc = $row['member_desc'];
			$this->member_weibo = $row['member_weibo'];
			return true;
		}
		return false;
	}

}


?>
