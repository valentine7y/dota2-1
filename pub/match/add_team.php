<?php
$title = "添加战队";
include ('../../lib/view/header.php');
include ('../../lib/controller/team.php');

if(isset($_POST['team_submit']))
{
	$ret = add_team();
	if($ret == true)
	{
		echo "添加队伍成功";
	}
	else
	{
		echo "添加队伍失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else
{
	include ('../../lib/view/add_team.php');
}

include ('../../lib/view/footer.php');
?>



