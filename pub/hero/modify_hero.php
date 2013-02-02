<?php
include ('../../lib/controller/hero.php');

$title = "修改技能信息"; 
if(isset($_POST['hero_submit']) && isset($_POST['hero_id']))
{
	$update = true;
	$ret = add_hero($update);

	include ('../../lib/view/header.php');
	if($ret == true)
	{
		echo "修改英雄信息成功";
	}
	else
	{
		echo "修改英雄信息失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else if(isset($_GET['hero_id']) && !empty($_GET['hero_id']) && is_int(intval($_GET['hero_id'])))
{
	$hero = get_hero_by_id($_GET['hero_id']);
	if($hero != false)
	{
		include ('../../lib/view/header.php');
		include ('../../lib/view/hero.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();

?>

