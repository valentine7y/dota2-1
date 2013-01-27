<?php
require_once('../../lib/model/team.php');
require_once('../../lib/common/util.php');

function add_team()
{
	if(!isset($_POST['team_name']) || !isset($_POST['team_country']) || !isset($_POST['team_city']) )
	{
		return false;
	}			

	$team = new Team();
	$team->team_name = $_POST['team_name'];
	$team->team_nickname = $_POST['team_nickname'];
	$team->team_icon = $_POST['team_icon'];
	$team->team_country = $_POST['team_country'];
	$team->team_city = $_POST['team_city'];
	$team->team_desc = $_POST['team_desc'];
	$team->team_weibo = $_POST['team_weibo'];
	$team->team_createtime = $_POST['team_createtime'];

	if(!check_date($team->team_createtime)) return false;
	if($team->add() == false) return false;

	set_cache(get_key('team', $team->team_id), $team);
	return true; 
}

function update_team()
{
	if(!isset($_POST['team_id']) || !isset($_POST['team_name']) || !isset($_POST['team_country']) || !isset($_POST['team_city']) )
	{
		return false;
	}			

	$team = new Team();
	$team->team_id = intval($_POST['team_id']);
	$team->team_name = $_POST['team_name'];
	$team->team_nickname = $_POST['team_nickname'];
	$team->team_icon = $_POST['team_icon'];
	$team->team_country = $_POST['team_country'];
	$team->team_city = $_POST['team_city'];
	$team->team_desc = $_POST['team_desc'];
	$team->team_weibo = $_POST['team_weibo'];
	$team->team_createtime = $_POST['team_createtime'];
	if(!is_int($team->team_id)) return false;
	if(!check_date($team->team_createtime)) return false;
	
	if($team->update() == false) return false;
	set_cache(get_key('team', $team->team_id), $team);
	return $team; 
}


function get_team($id)
{
	if(($cache = get_cache(get_key('team', $id))) != false)
	{
		return $cache;
	}

	$team = new Team();
	if($team->load($id) != false)
	{
		set_cache(get_key('team', $id), $team);
		return $team;
	}
	return false;
}


?>
