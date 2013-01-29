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
		<div class="basic-info">
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
		</div> <!-- basic info -->

		
		<div class="hero-prop clearfix">
			<p>
				初始生命: <?php echo $hero->hero_hp ?>	
			</p>
			<p>
				初始魔法: <?php echo $hero->hero_mp ?>	
			</p>
			<p>
				力量: <?php echo $hero->hero_str?>(每等级+<?php echo $hero->hero_lvlup_str?>)
			</p>
			<p>
				敏捷: <?php echo $hero->hero_agi?>(每等级+<?php echo $hero->hero_lvlup_agi?>)
			</p>
			<p>
				智慧: <?php echo $hero->hero_int?>(每等级+<?php echo $hero->hero_lvlup_int?>)
			</p>
			<p>
				初始攻击: <?php echo $hero->hero_attack_min ?>-<?php echo $hero->hero_attack_max?>
			</p>
			<p>
				初始护甲: <?php echo $hero->hero_armor?>
			</p>
			<p>
				攻击范围: <?php echo $hero->hero_attack_range?>
			</p>
			<p>
				视野(白天/黑夜): <?php echo $hero->hero_sight_day . '/' . $hero->hero_sight_night?>
			</p>
			<p>
				移动速度: <?php echo $hero->hero_move_speed?>
			</p>
			<p>
				弹道速度: <?php echo $hero->hero_missile_speed?>
			</p>
			<p>
				攻击间隔: <?php echo $hero->hero_attack_time?>
			</p>
			<p>
				攻击(前摇/后摇): <?php echo $hero->hero_attack_anim1 . '/' . $hero->hero_attack_anim2?>
			</p>
			<p>
				施法(前摇/后摇): <?php echo $hero->hero_cast_anim1 . '/' . $hero->hero_cast_anim2?>
			</p>
		</div> <!-- hero prop -->	

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->
