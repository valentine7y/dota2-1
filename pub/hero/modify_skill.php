<?php
include ('../../lib/controller/hero.php');

$title = "修改技能信息"; 

if(isset($_POST['skill_submit']) && isset($_POST['skill_id']))
{
	$ret = update_hero_skill();

	include ('../../lib/view/header.php');
	if($ret == true)
	{
		echo "修改技能信息成功";
	}
	else
	{
		echo "修改技能信息失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else if(isset($_GET['skill_id']) && !empty($_GET['skill_id']) && is_int(intval($_GET['skill_id'])))
{
	$skill = get_skill($_GET['skill_id']);
	if($skill != false)
	{
		include ('../../lib/view/header.php');
		include ('../../lib/view/hero_skill.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();

?>

