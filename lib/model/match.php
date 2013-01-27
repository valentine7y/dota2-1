<?php
require_once('../../lib/common/db.php');

class Match
{
	public $match_id;
	public $tournament_id;
	public $tournament_name;
	public $tournament_icon;
	public $match_round_count;
	public $match_red_id;
	public $match_red_name;
	public $match_red_icon;
	public $match_purple_id;
	public $match_purple_name;
	public $match_purple_icon;
	public $match_red_support;
	public $match_purple_support;
	public $match_date;
	public $match_live;
	public $match_red_score;
	public $match_purple_score;

	public $match_rounds;

	public function __construct()
	{
		$this->match_red_score = 0;
		$this->match_purple_score = 0;
		$this->match_rounds = array();
	}
	
	//添加赛事信息
	public function add()
	{
		$query = 'insert into team_match(tournament_id, match_round_count, match_red_id, match_purple_id, match_date, match_live) 
					values(?, ?, ?, ?, ?)';
		$bind_param = array('dddss', $this->tournament_id, $this->match_round_count, $this->match_red_id, $this->match_purple_id,
					$this->match_date, $this->match_live);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->match_id = $db->last_insert_id();
		return true;
	}

	
	public function load($match_id)
	{
		$sql = 'select m.tournament_id, t.tournament_icon, t.tournament_name,match_red_id, match_purple_id, t2.team_name as match_red_name, 
	t2.team_icon as match_red_icon, t3.team_name as match_purple_name, t3.team_icon as match_purple_icon, match_red_support, match_purple_support, 
	match_date, match_live from team_match as m inner join tournament as t on m.tournament_id = t.tournament_id inner join team as t2 
	on m.match_red_id = t2.team_id inner join team as t3 on m.match_purple_id = t3.team_id  where match_id=?';
		$bind_param = array('d', $match_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->match_id = $match_id;
			$this->tournament_id = $row['tournament_id'];
			$this->tournament_name = $row['tournament_name'];
			$this->tournament_icon = $row['tournament_icon'];
			$this->match_red_id = $row['match_red_id'];
			$this->match_purple_id = $row['match_purple_id'];
			$this->match_red_support = $row['match_red_support'];
			$this->match_purple_support = $row['match_purple_support'];
			$this->match_date = $row['match_date'];
			$this->match_live = $row['match_live'];
			$this->match_red_name = $row['match_red_name'];
			$this->match_red_icon = $row['match_red_icon'];
			$this->match_purple_name = $row['match_purple_name'];
			$this->match_purple_icon = $row['match_purple_icon'];
			$this->match_rounds = Match_round::load_by_match_id($this->match_id);

			foreach($this->match_rounds as $match_round)
			{
				if($match_round['match_round_result'] == 1)
				{
					$this->match_red_score++;
				}
				if($match_round['match_round_result'] == 2)
				{
					$this->match_purple_score++;
				}
			}
			return true;
		}
		return false;
	}

} 

class Match_round
{
	public $match_round_id;
	public $match_id;
	public $match_round_seq;
	public $match_round_result;
	public $match_round_map;
	public $match_round_date;
	public $match_round_comment;
	

	//添加比赛轮次信息
	public function add()
	{
		$sql = 'insert into team_match_round(match_id, match_round_seq, match_round_result, match_round_map, 
					match_round_date, match_round_comment) values (?, ?, ?, ?, ?, ?)';
		$bind_param = array('iiiss', $this->match_id, $this->match_round_seq, $this->match_round_result, $this->match_round_map,
					$this->match_round_date, $this->match_round_comment);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->match_id = $db->last_insert_id();
		return true;
	}

	public function load($match_round_id)
	{
		$sql = 'select match_round_id, match_round_seq, match_round_result, match_round_date, 
				match_round_comment from team_match_round where match_round_id = ?';
		$bind_param = array('i', $this->match_round_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->match_round_id = $row['match_round_id'];
			$this->match_round_seq = $row['match_round_seq'];
			$this->match_round_result = $row['match_round_result'];
			$this->match_round_map = $row['match_round_map'];
			$this->match_round_date = $row['match_round_date'];
			$this->match_round_comment = $row['match_round_comment'];
			return true;
		}
		return false;
	}

	public static function load_by_match_id($match_id)
	{
		$sql = 'select match_round_id, match_round_seq, match_round_result, match_round_date, 
				match_round_comment from team_match_round where match_id = ?';
		$bind_param = array('i', $match_id);

		$db = new DB();
		$m_round= array();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			while($row= $db->fetch($result))
			{
				$m_video = new Match_video();
				$m_video->load_by_round_id( $row['match_round_id']);

				$round = array('match_round_id' => $row['match_round_id'], 'match_round_seq' => $row['match_round_seq'], 
						'match_round_result' => $row['match_round_result'], 'match_round_date' => $row['match_round_date'],
						'match_round_comment' => $row['match_round_comment'], 'match_round_video_id' => $m_video->match_video_id);

				array_push($m_round, $round);
			}
		}
		return $m_round;
	}
}

class Match_video
{
	public $match_video_id;
	public $match_round_id;
	public $match_video_title;
	public $match_video_url;
	public $match_video_desc;
	public $match_video_hit;
	public $match_video_date;



	public function __construct()
	{
		$match_video_id = 0;
		$match_round_id = 0;
		$match_video_hit = 0;
	}

	public function add()
	{
		$sql = 'insert into team_match_video(match_round_id, match_video_title, match_video_url, match_video_desc, match_video_date)
			values(?, ?, ?, ?, ?")';
		$bind_param = array('dssss', $this->match_round_id, $this->match_video_title, $this->match_video_url, $this->match_video_desc,
					$this->match_video_date);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->match_video_id = $db->last_insert_id();
		return true;
	}


	public function load($match_video_id)
	{
		$sql = 'select match_round_id, match_video_title, match_video_url, match_video_desc, match_video_date from team_match_video
			where match_video_id = ?';
		$bind_param = array('d', $match_video_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->match_video_id = $match_video_id; 
			$this->match_round_id = $row['match_round_id'];
			$this->match_video_title = $row['match_video_title'];
			$this->match_video_url = $row['match_video_url'];
			$this->match_video_desc = $row['match_video_desc'];
			$this->match_video_date = $row['match_video_date'];
			return true;
		}
		return false;
	}


	public function load_by_round_id($match_round_id)
	{
		$sql = 'select match_video_id, match_video_title, match_video_url, match_video_desc, match_video_date from team_match_video
			where match_round_id = ?';
		$bind_param = array('d', $match_round_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->match_video_id = $row['match_video_id'];
			$this->match_round_id = $match_round_id;
			$this->match_video_title = $row['match_video_title'];
			$this->match_video_url = $row['match_video_url'];
			$this->match_video_desc = $row['match_video_desc'];
			$this->match_video_date = $row['match_video_date'];
			return true;
		}
		return false;
	}
}

