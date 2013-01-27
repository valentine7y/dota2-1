<?php
include ('../../lib/controller/team.php');

$title = "修改队伍资料"; 
if(isset($_POST['team_submit']) && isset($_POST['team_id']))
{
	$ret = update_team();
	include ('../../lib/view/header.php');
	if($ret == true)
	{
		echo "修改队伍信息成功";
	}
	else
	{
		echo "修改队伍信息失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else if(isset($_GET['team_id']) && !empty($_GET['team_id']) && is_int(intval($_GET['team_id'])))
{
	$team = get_team($_GET['team_id']);
	if($team != false)
	{
		include ('../../lib/view/header.php');
		include ('../../lib/view/modify_team.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();

?>
