<?php

function show_hero_skill_icon()
{
	global $hero;

	foreach($hero->hero_skills as $skill)
	{
		echo '<li>';
		echo '<img src=' . DOMAIN_IMAGES .  $skill['skill_icon'] . ' />';
		echo '</li>';
	}
}


?>


<div id="content">
	<div class="main">
		<div id="basic-info">
		<div class="hero-pic">
			<img src=<?php echo DOMAIN_IMAGES . $hero->hero_icon?> />
		</div>
		
		<div class="hero-name">
			<h1 class="red"> 
				<?php echo $hero->hero_nickname ?>
				<span class="hero-enickname">Crystal Maiden</span>
			</h1>

			<span class="hero-cname green">
				<?php echo $hero->hero_cname ?>
				<span class="hero-ename"><?php echo $hero->hero_ename?></span>
			</span>
		</div>

		<div class="hero-story">
			<p>   <?php echo $hero->hero_story ?> </p>
		</div>
		

		<div class="hero-motto yellow">
			<p> <?php echo stripslashes ($hero->hero_motto) ?> </p>
		</div>
		<div class="hero-skill-icon">
			<ul>
			<?php show_hero_skill_icon() ?>
			</ul>
		</div>
		</div>


	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->
