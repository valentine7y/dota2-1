<?php

$title = "添加比赛";
if(isset($_POST['match_submit']))
{
	include ('../../lib/view/header.php');
	include ('../../lib/controller/match.php');

	if(add_match() != false)
	{
		echo "添加比赛成功";
	}
	else
	{
		echo "添加比赛失败";
	}

	include ('../../lib/view/footer.php');
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_match.php');
	include ('../../lib/view/footer.php');
}

?>

