<?php
include ('../../lib/controller/team.php');

if(isset($_GET['team_id']) && !empty($_GET['team_id']) && is_int(intval($_GET['team_id'])))
{
	if(($team = get_team($_GET['team_id'])) != false)
	{
		$title= $team->team_name;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_team.php');
		include ('../../lib/view/footer.php');
		exit();
	}

}

error_page();
?>

