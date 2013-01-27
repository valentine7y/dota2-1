<?php

$title = "添加比赛视频";

if(isset($_POST['match_video_submit']))
{
	include ('../../lib/view/header.php');
	include ('../../lib/controller/match.php');
	if(add_match_video() != false)
	{
		echo "添加比赛视频成功";
	}
	else
	{
		echo "添加比赛视频失败";
	}

	include ('../../lib/view/footer.php');
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_match_video.php');
	include ('../../lib/view/footer.php');
}

?>


