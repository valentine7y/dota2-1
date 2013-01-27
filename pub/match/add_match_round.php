<?php

$title = "添加比赛轮次";
if(isset($_POST['match_round_submit']))
{
	include ('../../lib/controller/match.php');
	include ('../../lib/view/header.php');

	if(add_match_round() != false)
	{
		echo "添加比赛轮次成功";
	}
	else
	{
		echo "添加比赛轮次失败";
	}
	include ('../../lib/view/footer.php');
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_match_round.php');
	include ('../../lib/view/footer.php');
}

?>

