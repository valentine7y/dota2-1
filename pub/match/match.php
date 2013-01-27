<?php
include ('../../lib/controller/match.php');

if(isset($_GET['match_id']) && !empty($_GET['match_id']) && is_int(intval($_GET['match_id'])))
{
	if(($match = get_match($_GET['match_id'])) != false)
	{
		$title = "赛事信息";
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_match.php');
		include ('../../lib/view/footer.php');
		exit();
		
	}
	
}

error_page();
?>
