<?php
require_once('../../lib/model/match.php');
require_once('../../lib/common/util.php');


function add_match()
{
	$match = new Match();
	$match->tournament_id = intval($_POST['tournament_id']);
	$match->match_round_count = intval($_POST['match_round_count']);
	$match->match_red_id = intval($_POST['match_red_id']);
	$match->match_purple_id = intval($_POST['match_purple_id']);
	$match->match_date = $_POST['match_date'];
	$match->match_live = $_POST['match_live'];


	if(!is_int($match->tournament_id) || !is_int($match->match_round_count) || !is_int($match->match_red_id) || !is_int($match->match_purple_id))
	{
		return false;
	}

	if($match->add() == false) return false;

	set_cache(get_key('match', $match->match_id), $match);
	return true; 
}


function add_match_round()
{
	$m_round = new Match_round();
	$m_round->match_id = intval($_POST['match_id']);
	$m_round->atch_round_seq = intval($_POST['match_round_seq']);
	$m_round->match_round_result = intval($_POST['match_round_result']);
	$m_round->match_round_map = intval($_POST['match_round_map']);
	$m_round->match_round_date = $_POST['match_round_date'];
	$m_round->match_round_comment = $_POST['match_round_comment'];

	if(!is_int($m_round->match_id) || !is_int($m_round->match_round_seq) || !is_int($m_round->match_round_result) || !is_int($m_round->match_round_map))
	{
		return false;
	}

	if($m_round->add() == false) return false;

	clr_cache(get_key('match', $m_round->match_id));
	return true; 
}


function add_match_video()
{
	if(empty($_POST['match_round_id']) || empty($_POST['match_video_title']) || empty($_POST['match_video_url']))
	{
		return false;
	}

	$m_video = new Match_video();
	$m_video->match_round_id = intval($_POST['match_round_id']);
	$m_video->match_video_title = $_POST['match_video_title'];
	$m_video->match_video_url = $_POST['match_video_url'];
	$m_video->match_video_desc = $_POST['match_video_desc'];
	$m_video->match_video_date = $_POST['match_video_date'];
	if(!is_int($match_round_id)) return false; 
	$m_round = new Match_round();
	$m_round->load($m_video->match_round_id);

	if($m_round->add() == false) return false;

	clr_cache(get_key('match', $m_round->match_id));
	return true; 

}

function get_match($id)
{
	if(($cache = get_cache(get_key('match', $id))) != false)
	{
		return $cache;
	}

	$match = new Match();
	if($match->load($id) == false) return false;

	set_cache(get_key('match', $match->match_id), $match);
	return $match;
}


//TBD: 是否需要使用cache
//hit_count怎么cache
function get_match_video($id)
{
	$match_video = new Match_video();
	if($match_video->load($id) == false) return false;

	return $match_video;
}

?>
