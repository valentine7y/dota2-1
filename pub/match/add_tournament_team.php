<?php
$title = "添加联赛分组";

if(isset($_POST['tournament_team_submit']))
{
	include ('../../lib/controller/tournament.php');
	include ('../../lib/view/header.php');
	$ret = add_tournament_team();
	if($ret == true)
	{
		echo "添加联赛队伍成功";
	}
	else
	{
		echo "添加联赛队伍失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_tournament_team.php');
	include ('../../lib/view/footer.php');
	exit();
}

?>
