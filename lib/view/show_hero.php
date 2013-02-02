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


function show_hero_skill()
{
	global $hero;
	foreach($hero->hero_skills as $skill)
	{
		if($skill['skill_type'] == 1)
		{
			$skill_type_desc = "主动";
		}
		if($skill['skill_type'] == 2)
		{
			$skill_type_desc = "被动";
		}


		echo '<li class="clearfix">';
			echo '<div class="skill-icon">';
			echo '<img src=' . DOMAIN_IMAGES .  $skill['skill_icon'] . ' />';
			echo '<p class="skill-icon-name">' . $skill['skill_name'] . '</p>';
			echo '<p class="skill-type">' . $skill_type_desc . '  ' . $skill['skill_dmg_type']. '</p>';
			echo '<p class="skill-type">' . $skill['skill_scope'] . '  ' .  $skill['skill_target'];
			echo '</div>';


		echo '<div class="skill-detail">';
			echo '<div class="skill-desc">';
			echo '<p>' . ($skill['skill_desc']) . '</p>';
			echo '</div>';

			echo '<div class="skill-hint">';
			echo '<p>' . nl2br($skill['skill_hint']) . '</p>';
			echo '</div>';
			
	
			echo '<div class="skill-effect">';
			if(!empty($skill['skill_mp']))
			{
				echo '<p>魔法消耗:' . $skill['skill_mp']. '</p>';
			}
			if(!empty($skill['skill_cd']))
			{
				echo '<p>冷却时间:' . $skill['skill_cd']. '</p>';
			}
			$effects = explode("\r\n", $skill['skill_effect']);
			foreach($effects as $effect)
			{
				echo '<p>' . $effect. '</p>';
			}
			echo '</div>';

		
		echo '</div>';
		echo '</li>';
	}
}

?>


<div id="content">
	<div class="main">
		<div class="hero-info clearfix">
			<div class="hero-left">
				<div class="hero-pic">
					<img src=<?php echo DOMAIN_IMAGES . $hero->hero_icon?> />
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
			
			<div class="hero-right">
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
			</div>

		</div> <!-- basic info -->

		
		<div class="hero-prop">
			<p>
				初始生命: <?php echo $hero->hero_hp ?>	
			</p>
			<p>
				初始魔法: <?php echo $hero->hero_mp ?>	
			</p>
			<p>
				力量: <?php echo $hero->hero_str?>(每等级+<?php echo round($hero->hero_lvlup_str, 1) ?>) 
			</p>
			<p>
				敏捷: <?php echo $hero->hero_agi?>(每等级+<?php echo round($hero->hero_lvlup_agi, 1)?>)
			</p>
			<p>
				智慧: <?php echo $hero->hero_int?>(每等级+<?php echo round($hero->hero_lvlup_int, 1)?>)
			</p>
			<p>
				初始攻击: <?php echo $hero->hero_attack_min ?>-<?php echo $hero->hero_attack_max?>
			</p>
			<p>
				初始护甲: <?php echo round($hero->hero_armor,2)?>
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
				攻击间隔: <?php echo round($hero->hero_attack_time,2)?>
			</p>
			<p>
				攻击(前摇/后摇): <?php echo round($hero->hero_attack_anim1,2) . '/' . round($hero->hero_attack_anim2,2)?>
			</p>
			<p>
				施法(前摇/后摇): <?php echo round($hero->hero_cast_anim1,2) . '/' . round($hero->hero_cast_anim2,2)?>
			</p>
		</div> <!-- hero prop -->	

		<div class="hero-skill">
			<ul>
			<?php show_hero_skill() ?>
			</ul>
		</div>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

