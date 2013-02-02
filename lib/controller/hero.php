<?php
require_once('../../lib/model/hero.php');
require_once('../../lib/common/util.php');

function add_hero($update)
{
	$hero = new Hero();
	$hero->hero_id = intval($_POST['hero_id']);
	$hero->hero_name = $_POST['hero_name'];
	$hero->hero_nickname = $_POST['hero_nickname'];
	$hero->hero_enickname = $_POST['hero_enickname'];
	$hero->hero_cname = $_POST['hero_cname'];
	$hero->hero_ename = $_POST['hero_ename'];
	$hero->hero_icon = $_POST['hero_icon'];
	$hero->hero_prop_icon = $_POST['hero_prop_icon'];
	
	$hero->hero_hp = intval($_POST['hero_hp']);
	$hero->hero_mp = intval($_POST['hero_mp']);
	$hero->hero_str = intval($_POST['hero_str']);
	$hero->hero_lvlup_str = floatval($_POST['hero_lvlup_str']);
	$hero->hero_agi = intval($_POST['hero_agi']);
	$hero->hero_lvlup_agi = floatval($_POST['hero_lvlup_agi']);
	$hero->hero_int = intval($_POST['hero_int']);
	$hero->hero_lvlup_int = floatval($_POST['hero_lvlup_int']);

	$hero->hero_attack_min = intval($_POST['hero_attack_min']);
	$hero->hero_attack_max = intval($_POST['hero_attack_max']);
	$hero->hero_armor = floatval($_POST['hero_armor']);
	$hero->hero_attack_range = intval($_POST['hero_attack_range']);
	$hero->hero_sight_day = intval($_POST['hero_sight_day']);
	$hero->hero_sight_night = intval($_POST['hero_sight_night']);
	$hero->hero_move_speed = intval($_POST['hero_move_speed']);
	$hero->hero_missile_speed = intval($_POST['hero_missile_speed']);
	$hero->hero_attack_anim1 = floatval($_POST['hero_attack_anim1']);
	$hero->hero_attack_anim2 = floatval($_POST['hero_attack_anim2']);
	$hero->hero_cast_anim1 = floatval($_POST['hero_cast_anim1']);
	$hero->hero_cast_anim2 = floatval($_POST['hero_cast_anim2']);
	$hero->hero_attack_time = floatval($_POST['hero_attack_time']);
	$hero->hero_motto = $_POST['hero_motto'];
	$hero->hero_story = $_POST['hero_story'];

	if($update == true)
	{
		if($hero->update() == false) return false;
	}
	else
	{
		if($hero->add() == false) return false;
	}
	return true;
}

function add_hero_skill()
{
	$skill = new Hero_skill();
	$skill->hero_id = intval($_POST['hero_id']);
	$skill->skill_name = $_POST['skill_name'];
	$skill->skill_icon = $_POST['skill_icon'];
	$skill->skill_seq = intval($_POST['skill_seq']);
	$skill->skill_type = intval($_POST['skill_type']);
	$skill->skill_mp = $_POST['skill_mp'];
	$skill->skill_cd = $_POST['skill_cd'];
	$skill->skill_scope  = $_POST['skill_scope'];
	$skill->skill_target = $_POST['skill_target'];
	$skill->skill_dmg_type = $_POST['skill_dmg_type'];
	$skill->skill_desc = $_POST['skill_desc'];
	$skill->skill_effect = $_POST['skill_effect'];
	$skill->skill_hint = $_POST['skill_hint'];
	
	if($skill->add() == false) return false;
	return true;

}

function update_hero_skill()
{
	$skill = new Hero_skill();
	$skill->skill_id = intval($_POST['skill_id']);
	$skill->hero_id = intval($_POST['hero_id']);
	$skill->skill_name = $_POST['skill_name'];
	$skill->skill_icon = $_POST['skill_icon'];
	$skill->skill_seq = intval($_POST['skill_seq']);
	$skill->skill_type = intval($_POST['skill_type']);
	$skill->skill_mp = $_POST['skill_mp'];
	$skill->skill_cd = $_POST['skill_cd'];
	$skill->skill_scope  = $_POST['skill_scope'];
	$skill->skill_target = $_POST['skill_target'];
	$skill->skill_dmg_type = $_POST['skill_dmg_type'];
	$skill->skill_desc = $_POST['skill_desc'];
	$skill->skill_effect = $_POST['skill_effect'];
	$skill->skill_hint = $_POST['skill_hint'];
	
	if($skill->update() == false) return false;
	return $skill;
}


function get_hero_by_id($hero_id)
{
	$hero = new Hero();
	if($hero->load($hero_id) != false)
	{
		return $hero; 
	}
	return false;
}



function get_hero_by_name($hero_name)
{
	$hero = new Hero();
	if($hero->load_by_name($hero_name) != false)
	{
		return $hero; 
	}
	return false;
}

function get_skill($skill_id)
{
	$skill = new Hero_skill();
	if($skill->load($skill_id) != false)
	{
		return $skill; 
	}
	return false;
}

?>
