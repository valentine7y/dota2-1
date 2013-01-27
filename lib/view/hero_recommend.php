<?php

//技能加点推荐
function show_skill_upgrade()
{
	for($i = 0; $i < 18; ++$i)
	{
		echo '<select name="skill_upgrade'. $i . '" id="skill_upgrade' . $i. '">';
		echo '	<option value="q">Q</option>';
		echo '	<option value="w">W</option>';
		echo '	<option value="e">E</option>';
		echo '	<option value="r">R</option>';
		echo '</select>';
		if($i != 17) echo '-';
	}
}

//显示物品推荐
function show_item()
{
	$desc = array('早期出装', '中期出装', '后期出装');

	for($i = 1; $i <= 3; ++$i)
	{
		echo '<li>';
		echo '<p>' . $desc[$i-1] . '</p>';

		for($j = 1; $j <= 6; ++$j)
		{
			echo '<input type="text" id="item_' . $i . $j . '" name="item_' . $i . $j . '" />';
		}
		echo '<div>';
		echo '<p>出装说明:</p>';
		echo '<textarea id="item_rec' . $i . '" name="item_rec' . $i . '"> </textarea>';
		echo '</div>';
		echo '</li>';
	}
}

?>

<div id="content">
	<div class="main">
		<h1> 添加推荐 </h1>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="hero_id">英雄id</label>
				<input type="text" name="hero_id" id="hero_id">
			</div>

			<div>
				<label for="user_id">推荐者id</label>
				<input type="text" name="user_id" id="user_id">
			</div>

			<div>
				<p>加点推荐</p>
				<?php show_skill_upgrade() ?>
			</div>


			<div>
				<p>召唤师技能推荐</p>
				<input type="text" id="summon_skill1" name="summon_skill1" />
				<input type="text" id="summon_skill2" name="summon_skill2" />
			</div>

			<div>
				<p>出装推荐</p>

				<ul>
					<?php show_item() ?>
				</ul>
			</div>

			<div>
				<p>符文推荐</p>
			</div>
			
			<div>
				<p>天赋推荐</p>
			</div>

			<div>
				 <input type="submit" value="提交" name="hero_recommend_submit">
			</div>
		</form>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

