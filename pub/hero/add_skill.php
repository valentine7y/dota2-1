<?php

$title = "添加技能";
if(isset($_POST['skill_submit']))
{
	include ('../../lib/view/header.php');
	include ('../../lib/controller/hero.php');
	if(add_hero_skill() == true)
	{
		echo "添加技能成功";
	}
	else
	{
		echo "添加技能失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else 
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_skill.php');
	include ('../../lib/view/footer.php');
}


?>


