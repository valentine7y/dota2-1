<?php

$title = "添加联赛";
if(isset($_POST['tournament_submit']))
{
	include ('../../lib/controller/tournament.php');
	include ('../../lib/view/header.php');
	$ret = add_tournament();
	if($ret == true)
	{
		echo "添加联赛成功";
	}
	else
	{
		echo "添加联赛失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_tournament.php');
	include ('../../lib/view/footer.php');
	exit();
}

?>



