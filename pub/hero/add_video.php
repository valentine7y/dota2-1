<?php
$title = "添加英雄视频";
include ('../../lib/common/header.php');
include ('../../lib/hero_video.php');

if(isset($_POST['hero_video_submit']))
{
	$ret = Hero_video::add_video();
	if($ret == true)
	{
		echo "添加视频成功";
	}
	else
	{
		echo "添加视频失败";
	}
	include ('../../lib/common/footer.php');
	exit();
}
else
{
	include ('../../lib/template/add_hero_video.php');
}
include ('../../lib/common/footer.php');
?>
