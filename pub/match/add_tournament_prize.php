<?php
$title = "添加联赛奖金";

if(isset($_POST['tournament_prize_submit']))
{
	include ('../../lib/controller/tournament.php');
	include ('../../lib/view/header.php');
	$ret = add_tournament_prize();
	if($ret == true)
	{
		echo "添加联赛奖金成功";
	}
	else
	{
		echo "添加联赛奖金失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_tournament_prize.php');
	include ('../../lib/view/footer.php');
	exit();
}

?>
