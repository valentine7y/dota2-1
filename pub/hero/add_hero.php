<?php

$title = "添加英雄";
if(isset($_POST['hero_submit']))
{
	include ('../../lib/view/header.php');
	include ('../../lib/controller/hero.php');
	if(add_hero(false) != false)
	{
		echo "添加英雄成功";
	}
	else
	{
		echo "添加英雄失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/hero.php');
	include ('../../lib/view/footer.php');
}
?>



