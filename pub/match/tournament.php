<?php
include ('../../lib/controller/tournament.php');

if(isset($_GET['tournament_id']) && !empty($_GET['tournament_id']) && is_int(intval($_GET['tournament_id'])))
{
	if(($tournament = get_tournament($_GET['tournament_id'])) != false)
	{
		$title= $tournament->tournament_name;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_tournament.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();
?>
