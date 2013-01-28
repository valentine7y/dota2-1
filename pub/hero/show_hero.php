<?php
include ('../../lib/controller/hero.php');

if(isset($_GET['hero_id']) && !empty($_GET['hero_id']) && is_int(intval($_GET['hero_id'])))
{
	if(($hero = get_hero_by_id($_GET['hero_id'])) != false)
	{
		$title= $hero->hero_nickname;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_hero.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}
else if(isset($_GET['hero_name']) && !empty($_GET['hero_name']) && is_int(intval($_GET['hero_name'])))
{
	if(($hero = get_hero_by_name($_GET['hero_name'])) != false)
	{
		$title= $hero->hero_nickname;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_hero.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();


?>
