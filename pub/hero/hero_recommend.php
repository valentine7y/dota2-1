<?php
$title = "添加英雄推荐";
include ('../../lib/common/header.php');
include ('../../lib/hero.php');

if(isset($_POST['hero_recommend_submit']))
{
	$ret = Hero::add_recommend();
	if($ret == true)
	{
		echo "添加英雄推荐成功";
	}
	else
	{
		echo "添加英雄推荐失败";
	}
	include ('../../lib/common/footer.php');
	exit();
}
else
{
	include ('../../lib/template/hero_recommend.php');
}

include ('../../lib/common/footer.php');
?>



