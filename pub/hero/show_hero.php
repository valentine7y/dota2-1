<?php
include ('../../lib/controller/hero.php');

if(isset($_GET['hero_id']) && !empty($_GET['hero_id']) && is_int(intval($_GET['hero_id'])))
{
	if(($hero = get_hero_by_id($_GET['hero_id'])) != false)
	{
		$title= $hero->team_nickname;
		include ('../../lib/view/header.php');
		print_r($hero);
		include ('../../lib/view/footer.php');
		exit();
	}
}
else if(isset($_GET['hero_name']) && !empty($_GET['hero_name']) && is_int(intval($_GET['hero_name'])))
{
	if(($hero = get_hero_by_name($_GET['hero_name'])) != false)
	{
		$title= $hero->team_nickname;
		include ('../../lib/view/header.php');
		print_r($hero);
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();


?>
