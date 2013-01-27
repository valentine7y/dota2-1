<?php
$title = "英雄资料";
include ('../../lib/hero.php');
include ('../../lib/skill.php');

if(isset($_GET['hero_id']) && !empty($_GET['hero_id']) && is_int(intval($_GET['hero_id'])))
{
	$hero = new Hero();
	$ret = $hero->load($_GET['hero_id']);
	if(!$ret)
	{
		echo "cannot find the hero data";
		include ('../../lib/common/footer.php');
		exit();
	}

	$skill_0 = new Skill();
	$skill_1 = new Skill();
	$skill_2 = new Skill();
	$skill_3 = new Skill();
	$skill_4 = new Skill();

	$skill_0->load($hero->skill_id0);
	$skill_1->load($hero->skill_id1);
	$skill_2->load($hero->skill_id2);
	$skill_3->load($hero->skill_id3);
	$skill_4->load($hero->skill_id4);
}
else
{
		echo "wrong url";
		include ('../../lib/common/footer.php');
		exit();
}

?>

<div id="content">
	<div class="main">	
		<div id="hero_info">
			<div id="hero_basic">
				<h2>英雄: <?php echo "$hero->hero_cname($hero->hero_ename)" ?></h2>
				<img src="<?php echo $hero->hero_icon ?>" />
				
				<div id="hero_price">
					<label>国服价格:</label>
					<span>点券<?php echo $hero->cash_price ?>  金币<?php echo $hero->gold_price ?> </span>
				</div>

				<div id="hero_basic_prop">
					<ul>
						<li>
							<label>生命值:</label>
							<span> <?php echo "$hero->hp" ?> (+<?php echo "$hero->lvlup_hp" ?>)/每级) </span>
						</li>
						<li>
							<label>魔法值:</label>
							<span> <?php echo "$hero->mp" ?> (+<?php echo "$hero->lvlup_mp" ?>)/每级) </span>
						</li>
						<li>
							<label>攻击力:</label>
							<span> <?php echo "$hero->damage" ?> (+<?php echo "$hero->lvlup_damage" ?>)/每级) </span>
						</li>
						<li>
							<label>攻击速度:</label>
							<span> <?php echo "$hero->attack_speed" ?> (+<?php echo "$hero->lvlup_attack_speed" ?>)/每级) </span>
						</li>
						<li>
							<label>移动速度:</label>
							<span> <?php echo "$hero->move_speed" ?> </span>
						</li>
						<li>
							<label>攻击范围:</label>
							<span> <?php echo "$hero->attack_range" ?> </span>
						</li>
						<li>
							<label>护甲值:</label>
							<span> <?php echo "$hero->armor" ?> (+<?php echo "$hero->lvlup_armor" ?>)/每级) </span>
						</li>
						<li>
							<label>法术抗性:</label>
							<span> <?php echo "$hero->resist" ?> (+<?php echo "$hero->lvlup_resist" ?>)/每级) </span>
						</li>
						<li>
							<label>生命回复:</label>
							<span> <?php echo "$hero->hp_regen" ?> (+<?php echo "$hero->hp_lvlup_regen" ?>)/每级) </span>
						</li>
						<li>
							<label>魔法回复:</label>
							<span> <?php echo "$hero->mp_regen" ?> (+<?php echo "$hero->mp_lvlup_regen" ?>)/每级) </span>
						</li>
					</ul>
				</div>
			</div>

			<div id="hero_skill">
				<ul>
					<li>
						<p>
							<h3> <?php echo $skill_0->skill_name ?>[被动] </h3>
							<img src="<?php echo $skill_0->skill_icon ?>" />
						</p>

						<p>
							<label>施法距离:</label>
							<span> <?php echo $skill_0->skill_range ?> </span>	
						</p>
						<p>
							<label>冷却时间:</label>
							<span> <?php echo "$skill_0->level1_cd / $skill_0->level2_cd / $skill_0->level3_cd / 
										$skill_0->level4_cd / $skill_0->level5_cd 秒" ?> </span>	
						</p>
						<p>
							<label>施法消耗:</label>
							<span> <?php echo "$skill_0->level1_mp / $skill_0->level2_mp / $skill_0->level3_mp / 
										$skill_0->level4_mp / $skill_0->level5_mp 魔法" ?> </span>	
						</p>
						<p>
							<span> <?php echo $skill_0->skill_desc ?> </span>
						</p>
					</li>

					<li>
						<p>
							<h3> <?php echo $skill_1->skill_name ?>[Q] </h3>
							<img src="<?php echo $skill_1->skill_icon ?>" />
						</p>

						<p>
							<label>施法距离:</label>
							<span> <?php echo $skill_1->skill_range ?> </span>	
						</p>
						<p>
							<label>冷却时间:</label>
							<span> <?php echo "$skill_1->level1_cd / $skill_1->level2_cd / $skill_1->level3_cd / 
										$skill_1->level4_cd / $skill_1->level5_cd 秒" ?> </span>	
						</p>
						<p>
							<label>施法消耗:</label>
							<span> <?php echo "$skill_1->level1_mp / $skill_1->level2_mp / $skill_1->level3_mp / 
										$skill_1->level4_mp / $skill_1->level5_mp 魔法" ?> </span>	
						</p>
						<p>
							<span> <?php echo $skill_1->skill_desc ?> </span>
						</p>
					</li>

					<li>
						<p>
							<h3> <?php echo $skill_2->skill_name ?>[W] </h3>
							<img src="<?php echo $skill_2->skill_icon ?>" />
						</p>

						<p>
							<label>施法距离:</label>
							<span> <?php echo $skill_2->skill_range ?> </span>	
						</p>
						<p>
							<label>冷却时间:</label>
							<span> <?php echo "$skill_2->level1_cd / $skill_2->level2_cd / $skill_2->level3_cd / 
										$skill_2->level4_cd / $skill_2->level5_cd 秒" ?> </span>	
						</p>
						<p>
							<label>施法消耗:</label>
							<span> <?php echo "$skill_2->level1_mp / $skill_2->level2_mp / $skill_2->level3_mp / 
										$skill_2->level4_mp / $skill_2->level5_mp 魔法" ?> </span>	
						</p>
						<p>
							<span> <?php echo $skill_2->skill_desc ?> </span>
						</p>
					</li>

					<li>
						<p>
							<h3> <?php echo $skill_3->skill_name ?>[E] </h3>
							<img src="<?php echo $skill_3->skill_icon ?>" />
						</p>

						<p>
							<label>施法距离:</label>
							<span> <?php echo $skill_3->skill_range ?> </span>	
						</p>
						<p>
							<label>冷却时间:</label>
							<span> <?php echo "$skill_3->level1_cd / $skill_3->level2_cd / $skill_3->level3_cd / 
										$skill_3->level4_cd / $skill_3->level5_cd 秒" ?> </span>	
						</p>
						<p>
							<label>施法消耗:</label>
							<span> <?php echo "$skill_3->level1_mp / $skill_3->level2_mp / $skill_3->level3_mp / 
										$skill_3->level4_mp / $skill_3->level5_mp 魔法" ?> </span>	
						</p>
						<p>
							<span> <?php echo $skill_3->skill_desc ?> </span>
						</p>
					</li>
					
					<li>
						<p>
							<h3> <?php echo $skill_4->skill_name ?>[R] </h3>
							<img src="<?php echo $skill_4->skill_icon ?>" />
						</p>

						<p>
							<label>施法距离:</label>
							<span> <?php echo $skill_4->skill_range ?> </span>	
						</p>
						<p>
							<label>冷却时间:</label>
							<span> <?php echo "$skill_4->level1_cd / $skill_4->level2_cd / $skill_4->level3_cd / 
										$skill_4->level4_cd / $skill_4->level5_cd 秒" ?> </span>	
						</p>
						<p>
							<label>施法消耗:</label>
							<span> <?php echo "$skill_4->level1_mp / $skill_4->level2_mp / $skill_4->level3_mp / 
										$skill_4->level4_mp / $skill_4->level5_mp 魔法" ?> </span>	
						</p>
						<p>
							<span> <?php echo $skill_4->skill_desc ?> </span>
						</p>
					</li>

				</ul>
			</div>

			<div id="hero_hint">
			</div>

		</div>

		<div id="hero_recommend">
			<div id="recomend_skill">
				<div id="skill_upgrade">
				</div>
				
				<div id="summon_skill">
				</div>
			</div>

			<div id="recommend_item">
			</div>

			<div id="recommend_rune">
			</div>

			<div id="recommend_talent">
			</div>
			
			<div id="recommend_strategy">
			</div>
		</div>

		<div id="hero_video">
		</div>

		<div id="hero_box">
		</div>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

