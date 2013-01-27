<?php
include ('../../lib/controller/match.php');

if(isset($_GET['video_id']) && !empty($_GET['video_id']) && is_int(intval($_GET['video_id'])))
{
	if(($match_video = get_match_video($_GET['video_id'])) != false)
	{
		$title = $match_video->match_video_title;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_match_video.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();
?>

