<?php
require_once('../../lib/common/db.php');


class Tournament
{
	public $tournament_id;
	public $tournament_name;
	public $tournament_fullname;
	public $tournament_icon;
	public $tournament_type;
	public $tournament_type_name;
	public $tournament_group_count;
	public $tournament_country;
	public $tournament_city;
	public $tournament_date_begin;
	public $tournament_date_end;
	public $tournament_desc;

	public $tournament_team;
	public $tournament_prize;
	public $tournament_group;


	public function __construct()
	{
		$this->tournament_team = array();
		$this->tournament_prize = array();
		$this->tournament_group = array();
	}

	public function add()
	{
		$sql = 'insert into tournament(tournament_name, tournament_fullname, tournament_icon, tournament_type,
					tournament_country, tournament_city, tournament_date_begin, tournament_date_end, tournament_desc) 
				values(?, ?, ?, ?, ?, ?, ?, ?, ?)';

		$bind_param = array('sssdsssss', $this->tournament_name, $this->tournament_fullname, $this->tournament_icon, $this->tournament_type,
			$this->tournament_country, $this->tournament_city, $this->tournament_date_begin, $this->tournament_date_end, $this->tournament_desc);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->team_id = $db->last_insert_id();
		return true;
	}

	
	public function load($tournament_id)
	{
		$sql = 'select tournament_name, tournament_fullname, tournament_icon, tournament_type, tournament_group_count, tournament_country,
			tournament_city, tournament_date_begin, tournament_date_end, tournament_desc from tournament where tournament_id=?';
		$bind_param = array('d', $tournament_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			//获取赛事基本信息
			$this->tournament_id = $tournament_id;
			$this->tournament_name = $row['tournament_name'];
			$this->tournament_fullname = $row['tournament_fullname'];
			$this->tournament_icon = $row['tournament_icon'];

			$type_list = array('未知', '线上', '线下', '混合');
			$this->tournament_type = $row['tournament_type'];
			$this->tournament_type_name = $type_list[$this->tournament_type];
			$this->tournament_group_count = $row['tournament_group_count'];
			$this->tournament_country = $row['tournament_country'];
			$this->tournament_city = $row['tournament_city'];
			$this->tournament_date_begin = $row['tournament_date_begin'];
			$this->tournament_date_end = $row['tournament_date_end'];
			$this->tournament_desc = $row['tournament_desc'];

			//获取参赛队伍信息
			$this->tournament_team = Tournament_team::load($this->tournament_id );
			
			//获取奖金信息
			$this->tournament_prize = Tournament_prize::load($this->tournament_id); 

			//获取分组信息
			$this->tournament_group = Tournament_group::load($this->tournament_id, $this->tournament_group_count);
			return true;
		}
		return false;
	}
} 

class Tournament_team
{
	public $tournament_id;
	public $tournament_group_id;
	public $tournament_team_id;

	public function add()
	{
		$sql = 'insert into tournament_team(tournament_id, tournament_group_id, team_id) values(?, ?, ?)'; 
		$bind_param = array('ddd', $this->tournament_id, $this->tournament_group_id, $this->tournament_team_id);

		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}


	//获取参赛队伍信息
	public static function load($tournament_id)
	{
		$sql = 'select t1.team_id, team_name, team_icon from tournament_team as t1 inner join team as t2 using(team_id)
			where tournament_id=?';
		$bind_param = array('d', $tournament_id);
		
		$db = new DB();
		$t_team = array();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			$t_team = $db->fetch_all($result); 
		}
		return $t_team;
	}
}


class Tournament_prize
{
	public $tournament_id;
	public $tournament_prize_id;
	public $tournament_prize_name;
	public $tournament_prize_num;

	public function add()
	{
		$sql = 'insert into tournament_prize(tournament_id, tournament_prize_id, tournament_prize_name, tournament_prize_num) values(?, ?, ?, ?)'; 
		$bind_param = array('ddss', $this->tournament_id, $this->tournament_prize_id, $this->tournament_prize_name, $this->tournament_prize_num);

		$db = new DB();
		if($db->execute($sql, $bind_param) != false)
		{
			$this->team_id = $db->last_insert_id();
			return true;
		}
		return false;
	}

	
	public static function load($tournament_id)
	{
		$sql = 'select tournament_prize_name, tournament_prize_num, tournament_prize_team_id from tournament_prize
			where tournament_id = ? order by tournament_prize_id';
		$bind_param = array('d', $tournament_id);

		$db = new DB();
		$t_prize = array();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			while($row = $db->fetch($result))
			{
				$team_icon = '';
				$team_name = '';
				if($row['tournament_prize_team_id'] > 0)
				{
					$sql = 'select team_name, team_icon from team where team_id =?';
					$bind_param = array('d', $row['tournament_prize_team_id']);

					if(($result2 = $db->execute($sql, $bind_param)) != false)
					{
						$row2 = $db->fetch($result2);
						$team_icon = $row2['team_icon'];
						$team_name = $row2['team_name'];
					} 
					$result2->close();

				}
				$prize = array('tournament_prize_name' => $row['tournament_prize_name'], 'tournament_prize_num' => $row['tournament_prize_num'],
						'tournament_prize_team_id' => $row['tournament_prize_team_id'], 'tournament_prize_team_icon' => $team_icon,
						'tournament_prize_team_name' => $team_name);

				array_push($t_prize, $prize);
			}
			return $t_prize;
		}
		return $t_prize;
	}

}

class Tournament_group
{

	public static function load($tournament_id, $tournament_group_count) 
	{
		$t_group = array();
		for($i = 1; $i <= $tournament_group_count; ++$i)
		{
			$sql = 'select t1.team_id, team_name, team_icon from tournament_team as t1 inner join team as t2 using(team_id)
				where tournament_id=? and tournament_group_id=?';
			$bind_param = array('dd', $tournament_id, $i); 

			$db = new DB();
			if(($result = $db->execute($sql, $bind_param)) != false)
			{
				$team = $db->fetch_all($result); 
			}

			array_push($t_group, $team);
		}
		return $t_group;
	} 

}

?>

