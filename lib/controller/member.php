<?php
require_once('../../lib/model/member.php');
require_once('../../lib/common/util.php');

function add_member()
{
	if(!isset($_POST['member_name']) || !isset($_POST['team_id']) || !isset($_POST['member_pic']) || 
			!isset($_POST['member_desc'])) 
	{
		return false;
	}			

	$member = new Member();
	$member->member_name = $_POST['member_name'];
	$member->member_match_name = $_POST['member_match_name'];
	$member->member_rname = $_POST['member_rname'];
	$member->member_ename = $_POST['member_ename'];
	$member->team_id = intval($_POST['team_id']);
	$member->member_pic = $_POST['member_pic'];
	$member->member_account_zone = $_POST['member_account_zone'];
	$member->member_account_name = $_POST['member_account_name'];
	$member->member_position = intval($_POST['member_position']);
	$member->member_desc = $_POST['member_desc'];
	$member->member_weibo = $_POST['member_weibo'];

	if(!is_int($member->team_id) || !is_int($member->member_position)) return false;

	if($member->add() == false) return false;

	clr_cache(get_key('team', $member->team_id));
	set_cache(get_key('member', $member->member_id), $member);
	return true; 
}


function update_member()
{
	if(!isset($_POST['member_name']) || !isset($_POST['team_id']) || !isset($_POST['member_id']) || !isset($_POST['member_pic']) || 
			!isset($_POST['member_desc'])) 
	{
		return false;
	}			
	$old_member = get_member($member_id);

	$member = new Member();
	$member->member_id = intval($_POST['member_id']);
	$member->team_id = intval($_POST['team_id']);
	$member->member_name = $_POST['member_name'];
	$member->member_match_name = $_POST['member_match_name'];
	$member->member_rname = $_POST['member_rname'];
	$member->member_ename = $_POST['member_ename'];
	$member->member_pic = $_POST['member_pic'];
	$member->member_account_zone = $_POST['member_account_zone'];
	$member->member_account_name = $_POST['member_account_name'];
	$member->member_position = intval($_POST['member_position']);
	$member->member_desc = $_POST['member_desc'];
	$member->member_weibo = $_POST['member_weibo'];

	if(!is_int($member->team_id) || !is_int($member->member_id) || !is_int($member->member_position)) return false;
	if($member->update() == false) return false;

	//清除cache
	if($old_member->team_id != $member->team_id)
	{
		clr_cache(get_key('team', $old_member->team_id));
		clr_cache(get_key('team', $member->team_id));
	}
	else
	{
		clr_cache(get_key('team', $member->team_id));
	}

	set_cache(get_key('member', $member->member_id), $member);
	return $member;
}

function get_member($id)
{
	if(($cache = get_cache(get_key('member', $id))) != false)
	{
		return $cache;
	}

	$member = new Member();
	if($member->load($id) == false) return false;

	set_cache(get_key('member', $member->member_id), $member);
	return $member;
}

?>
