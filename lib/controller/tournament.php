<?php
require_once('../../lib/model/tournament.php');
require_once('../../lib/common/util.php');

function add_tournament()
{
	if(!isset($_POST['tournament_name']) || !isset($_POST['tournament_type']) || !isset($_POST['tournament_icon']) || 
			!isset($_POST['tournament_desc']))
	{
		return false;	
	}


	$tournament = new Tournament();
	$tournament->tournament_name = $_POST['tournament_name'];
	$tournament->tournament_fullname =  $_POST['tournament_fullname'];
	$tournament->tournament_icon =  $_POST['tournament_icon'];
	$tournament->tournament_type =  intval($_POST['tournament_type']);
	$tournament->tournament_country =  $_POST['tournament_country'];
	$tournament->tournament_city=  $_POST['tournament_city'];
	$tournament->tournament_date_begin =  $_POST['tournament_date_begin'];
	$tournament->tournament_date_end =  $_POST['tournament_date_end'];
	$tournament->tournament_desc =  $_POST['tournament_desc'];

	if(!is_int($tournament->tournament_type)) 
	{
		return false;
	}
	
	if($tournament->add() == false) return false;

	set_cache(get_key('tournament', $tournament->tournament_id), $tournament);
	return true;
}


function add_tournament_team()
{
	if(!isset($_POST['tournament_id']) || !isset($_POST['tournament_group_id']) || !isset($_POST['team_id'])) 
	{
		return false;	
	}

	$t_team = new Tournament_team();
	$t_team->tournament_id = intval($_POST['tournament_id']);
	$t_team->tournament_group_id = intval($_POST['tournament_group_id']);
	$t_team->tournament_team_id = intval($_POST['team_id']);

	if(!is_int($t_team->tournament_id) || !is_int($t_team->tournament_group_id) || !is_int($t_team->tournament_team_id))
	{
		return false;
	}

	if($t_team->add() == false) return false;

	clr_cache(get_key('tournament', $t_team->tournament_id));
	return true;
}


function add_tournament_prize()
{
	if(!isset($_POST['tournament_id']) || !isset($_POST['tournament_prize_id']) || !isset($_POST['tournament_prize_name']) 
			|| !isset($_POST['tournament_prize_num'])) 
	{
		return false;	
	}

	$t_prize = new Tournament_prize();
	$t_prize->tournament_id = intval($_POST['tournament_id']);
	$t_prize->tournament_prize_id = intval($_POST['tournament_prize_id']);
	$t_prize->tournament_prize_name = $_POST['tournament_prize_name'];
	$t_prize->tournament_prize_num = $_POST['tournament_prize_num'];

	if(!is_int($t_prize->tournament_id) || !is_int($t_prize->tournament_prize_id))
	{
		return false;
	}
	
	if($t_prize->add() == false) return false;

	clr_cache(get_key('tournament', $t_prize->tournament_id));
	return true;
}


function get_tournament($id)
{
	if(($cache = get_cache(get_key('tournament', $id))) != false)
	{
		return $cache;
	}

	$tournament = new Tournament();
	if($tournament->load($id) == false) return false;

	set_cache(get_key('tournament', $tournament->tournament_id), $tournament);
	return $tournament;
}

?>
