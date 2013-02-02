<?php
require_once('../../lib/common/db.php');

class Hero
{
	//基本信息
	public $hero_id;
	public $hero_name; 
	public $hero_nickname; 
	public $hero_enickname; 
	public $hero_cname;
	public $hero_ename; 
	public $hero_icon;
	public $hero_prop_icon;

	//属性
	public $hero_hp;
	public $hero_mp;
	public $hero_str;
	public $hero_lvlup_str;
	public $hero_agi;
	public $hero_lvlup_agi;
	public $hero_int;
	public $hero_lvlup_int;
	public $hero_attack_min;
	public $hero_attack_max;
	public $hero_armor;
	public $hero_attack_range;
	public $hero_sight_day;
	public $hero_sight_night;
	public $hero_move_speed;
	public $hero_missile_speed;
	public $hero_attack_anim1;
	public $hero_attack_anim2;
	public $hero_cast_anim1;
	public $hero_cast_anim2;
	public $hero_attack_time;

	//描述
	public $hero_motto;
	public $hero_story;

	//技能数据
	public $hero_skills;
	
	public function __construct()
	{
		$this->hero_skills = array();
	}


	public function add()
	{
		$sql = 'insert into hero(hero_id, hero_name, hero_nickname, hero_enickname, hero_cname, hero_ename, hero_icon, hero_prop_icon, hero_hp, hero_mp,
			hero_str, hero_lvlup_str, hero_agi, hero_lvlup_agi, hero_int, hero_lvlup_int, hero_attack_min, hero_attack_max, hero_armor,
			hero_attack_range, hero_sight_day, hero_sight_night, hero_move_speed, hero_missile_speed, hero_attack_anim1, 
			hero_attack_anim2, hero_cast_anim1, hero_cast_anim2, hero_attack_time, hero_motto, hero_story) 
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

		$bind_param = array('isssssssiiidididiidiiiiidddddss', $this->hero_id, $this->hero_name, $this->hero_nickname, $this->hero_enickname,
			$this->hero_cname, $this->hero_ename, $this->hero_icon, $this->hero_prop_icon, $this->hero_hp, $this->hero_mp, $this->hero_str, 
			$this->hero_lvlup_str, $this->hero_agi, $this->hero_lvlup_agi, $this->hero_int, $this->hero_lvlup_int, $this->hero_attack_min, 
			$this->hero_attack_max, $this->hero_armor, $this->hero_attack_range, $this->hero_sight_day, $this->hero_sight_night, $this->hero_move_speed,
			$this->hero_missile_speed, $this->hero_attack_anim1, $this->hero_attack_anim2, $this->hero_cast_anim1, $this->hero_cast_anim2, 
			$this->hero_attack_time, $this->hero_motto, $this->hero_story);

		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		return true;

	}

	public function update()
	{
		$sql = 'update hero set hero_name=?, hero_nickname=?, hero_enickname=?, hero_cname=?, hero_ename=?, hero_icon=?, hero_prop_icon=?, hero_hp=?, 
			hero_mp=?, hero_str=?, hero_lvlup_str=?, hero_agi=?, hero_lvlup_agi=?, hero_int=?, hero_lvlup_int=?, hero_attack_min=?, hero_attack_max=?, 
			hero_armor=?, hero_attack_range=?, hero_sight_day=?, hero_sight_night=?, hero_move_speed=?, hero_missile_speed=?, hero_attack_anim1=?, 
			hero_attack_anim2=?, hero_cast_anim1=?, hero_cast_anim2=?, hero_attack_time=?, hero_motto=?, hero_story=? where hero_id=?'; 

		$bind_param = array('sssssssiiidididiidiiiiidddddssi', $this->hero_name, $this->hero_nickname, $this->hero_enickname,
			$this->hero_cname, $this->hero_ename, $this->hero_icon, $this->hero_prop_icon, $this->hero_hp, $this->hero_mp, $this->hero_str, 
			$this->hero_lvlup_str, $this->hero_agi, $this->hero_lvlup_agi, $this->hero_int, $this->hero_lvlup_int, $this->hero_attack_min, 
			$this->hero_attack_max, $this->hero_armor, $this->hero_attack_range, $this->hero_sight_day, $this->hero_sight_night, $this->hero_move_speed,
			$this->hero_missile_speed, $this->hero_attack_anim1, $this->hero_attack_anim2, $this->hero_cast_anim1, $this->hero_cast_anim2, 
			$this->hero_attack_time, $this->hero_motto, $this->hero_story, $this->hero_id);
		
		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}

	public function load($hero_id)
	{
		$sql = 'select hero_name, hero_nickname, hero_enickname, hero_cname, hero_ename, hero_icon, hero_prop_icon, hero_hp, hero_mp, hero_str,
				hero_lvlup_str, hero_agi, hero_lvlup_agi, hero_int, hero_lvlup_int, hero_attack_min, hero_attack_max,
				hero_armor, hero_attack_range, hero_sight_day, hero_sight_night, hero_move_speed, hero_missile_speed,
				hero_attack_anim1, hero_attack_anim2, hero_cast_anim1, hero_cast_anim2, hero_attack_time, hero_motto, hero_story
				from hero where hero_id = ?';

		$bind_param = array('i', $hero_id);
		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) != false) 
			{
				$this->hero_id = $hero_id; 
				$this->hero_name = $row['hero_name'];
				$this->hero_nickname = $row['hero_nickname'];
				$this->hero_enickname = $row['hero_enickname'];
				$this->hero_cname = $row['hero_cname'];
				$this->hero_ename = $row['hero_ename'];
				$this->hero_icon = $row['hero_icon'];
				$this->hero_prop_icon = $row['hero_prop_icon'];
				$this->hero_hp = $row['hero_hp'];
				$this->hero_mp = $row['hero_mp'];
				$this->hero_str = $row['hero_str'];
				$this->hero_lvlup_str = $row['hero_lvlup_str'];
				$this->hero_agi = $row['hero_agi'];
				$this->hero_lvlup_agi = $row['hero_lvlup_agi'];
				$this->hero_int = $row['hero_int'];
				$this->hero_lvlup_int = $row['hero_lvlup_int'];
				$this->hero_attack_min = $row['hero_attack_min'];
				$this->hero_attack_max = $row['hero_attack_max'];
				$this->hero_armor = $row['hero_armor'];
				$this->hero_attack_range = $row['hero_attack_range'];
				$this->hero_sight_day = $row['hero_sight_day'];
				$this->hero_sight_night = $row['hero_sight_night'];
				$this->hero_move_speed = $row['hero_move_speed'];
				$this->hero_missile_speed = $row['hero_missile_speed'];
				$this->hero_attack_anim1 = $row['hero_attack_anim1'];
				$this->hero_attack_anim2 = $row['hero_attack_anim2'];
				$this->hero_cast_anim1 = $row['hero_cast_anim1'];
				$this->hero_cast_anim2 = $row['hero_cast_anim2'];
				$this->hero_attack_time = $row['hero_attack_time'];
				$this->hero_motto = $row['hero_motto'];
				$this->hero_story = $row['hero_story'];
				$this->hero_skills = Hero_skill::load_by_hero_id($this->hero_id);
				return true;
			}
		}
		return false;
	}


	public function load_by_name($hero_name)
	{
		$sql = 'select hero_id, hero_nickname, hero_enickname, hero_cname, hero_ename, hero_icon, hero_prop_icon, hero_hp, hero_mp, hero_str,
				hero_lvlup_str, hero_agi, hero_lvlup_agi, hero_int, hero_lvlup_int, hero_attack_min, hero_attack_max,
				hero_armor, hero_attack_range, hero_sight_day, hero_sight_night, hero_move_speed, hero_missile_speed,
				hero_attack_anim1, hero_attack_anim2, hero_cast_anim1, hero_cast_anim2, hero_attack_time, hero_motto, hero_story
				from hero where hero_name = ?';

		$bind_param = array('s', $hero_name);
		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) != false) 
			{
				$this->hero_id = $row['hero_id']; 
				$this->hero_name  = $hero_name; 
				$this->hero_name = $row['hero_name'];
				$this->hero_nickname = $row['hero_nickname'];
				$this->hero_enickname = $row['hero_enickname'];
				$this->hero_cname = $row['hero_cname'];
				$this->hero_ename = $row['hero_ename'];
				$this->hero_icon = $row['hero_icon'];
				$this->hero_prop_icon = $row['hero_prop_icon'];
				$this->hero_hp = $row['hero_hp'];
				$this->hero_mp = $row['hero_mp'];
				$this->hero_str = $row['hero_str'];
				$this->hero_lvlup_str = $row['hero_lvlup_str'];
				$this->hero_agi = $row['hero_agi'];
				$this->hero_lvlup_agi = $row['hero_lvlup_agi'];
				$this->hero_int = $row['hero_int'];
				$this->hero_lvlup_int = $row['hero_lvlup_int'];
				$this->hero_attack_min = $row['hero_attack_min'];
				$this->hero_attack_max = $row['hero_attack_max'];
				$this->hero_armor = $row['hero_armor'];
				$this->hero_attack_range = $row['hero_attack_range'];
				$this->hero_sight_day = $row['hero_sight_day'];
				$this->hero_sight_night = $row['hero_sight_night'];
				$this->hero_move_speed = $row['hero_move_speed'];
				$this->hero_missile_speed = $row['hero_missle_speed'];
				$this->hero_attack_anim1 = $row['hero_attack_anim1'];
				$this->hero_attack_anim2 = $row['hero_attack_anim2'];
				$this->hero_cast_anim1 = $row['hero_cast_anim1'];
				$this->hero_cast_anim2 = $row['hero_cast_anim2'];
				$this->hero_motto = $row['hero_motto'];
				$this->hero_story = $row['hero_story'];
				$this->hero_skills = Hero_skill::load_by_hero_id($this->hero_id);
				return true;
			}
		}
		return false;
	}

}


class Hero_skill
{
	public $skill_id;
	public $hero_id;
	public $skill_name;
	public $skill_icon;
	public $skill_seq;
	public $skill_type;
	public $skill_mp;
	public $skill_cd;
	public $skill_scope;
	public $skill_target;
	public $skill_dmg_type;
	public $skill_desc;
	public $skill_effect;
	public $skill_hint;
	
	public function add()
	{
		$sql = 'insert into hero_skill(hero_id,  skill_name, skill_icon, skill_seq, skill_type, skill_mp, skill_cd, skill_scope, skill_target,
			skill_dmg_type, skill_desc, skill_effect, skill_hint) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$bind_param = array('issiissssssss', $this->hero_id, $this->skill_name, $this->skill_icon, $this->skill_seq, $this->skill_type, 
			$this->skill_mp, $this->skill_cd, $this->skill_scope, $this->skill_target, $this->skill_dmg_type, $this->skill_desc, $this->skill_effect, 
			$this->skill_hint);


		$db = new DB();
		if($db->execute($sql, $bind_param) == false) return false;

		$this->team_id = $db->last_insert_id();
		return true;

	}

	public function update()
	{
		$sql = 'update hero_skill set hero_id=?, skill_name=?, skill_icon=?, skill_seq=?, skill_type=?, skill_mp=?, skill_cd=?, skill_scope=?, 
				skill_target=?, skill_dmg_type=?, skill_desc=?, skill_effect=?, skill_hint=? where skill_id=?';

		$bind_param = array('issiissssssssd', $this->hero_id, $this->skill_name, $this->skill_icon, $this->skill_seq, $this->skill_type, 
			$this->skill_mp, $this->skill_cd, $this->skill_scope, $this->skill_target, $this->skill_dmg_type, $this->skill_desc, $this->skill_effect, 
			$this->skill_hint, $this->skill_id);

		$db = new DB();
		return $db->execute($sql, $bind_param); 
	}

	public function load($skill_id)
	{
		$sql = 'select hero_id, skill_name, skill_icon, skill_type, skill_seq, skill_mp, skill_cd, skill_scope, skill_target, skill_dmg_type,
					skill_desc, skill_effect, skill_hint from hero_skill where skill_id = ?';
		$bind_param = array('i', $skill_id);

		$db = new DB();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			if(($row = $db->fetch($result)) == false) return false; 

			$this->skill_id = $skill_id;
			$this->hero_id = $row['hero_id'];
			$this->skill_name = $row['skill_name'];
			$this->skill_icon = $row['skill_icon'];
			$this->skill_type = $row['skill_type'];
			$this->skill_seq = $row['skill_seq'];
			$this->skill_mp = $row['skill_mp'];
			$this->skill_cd = $row['skill_cd'];
			$this->skill_scope = $row['skill_scope'];
			$this->skill_target = $row['skill_target'];
			$this->skill_dmg_type = $row['skill_dmg_type'];
			$this->skill_desc = $row['skill_desc'];
			$this->skill_effect = $row['skill_effect'];
			$this->skill_hint = $row['skill_hint'];
			return true;
		}
		return false;
	}

	public static function load_by_hero_id($hero_id)
	{
		$sql = 'select skill_name, skill_icon, skill_type, skill_mp, skill_cd, skill_scope, skill_target, skill_dmg_type,
					skill_desc, skill_effect, skill_hint from hero_skill where hero_id = ?';
		$bind_param = array('i', $hero_id);
		
		$db = new DB();
		$skills = array();
		if(($result = $db->execute($sql, $bind_param)) != false)
		{
			while($row= $db->fetch($result))
			{
				array_push($skills, $row);
			}
		}
		return $skills;
	}

}
?>
