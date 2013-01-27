
<?php

function show_match_round()
{
	global $match;
	foreach($match->match_rounds as $round)
	{
		$round_result = '';
		if($round['match_round_result'] == 1)
		{
			$round_result = '红方获胜';
		}
		else if($round['match_round_result'] == 2)
		{
			$round_result = '紫方获胜';
		}

		echo '<h3> 第' . $round['match_round_seq'] . '轮</h3>';
		echo '<p>结果:' . $round_result . '</p>'; 
		echo '<p>比赛日期: ' . $round['match_round_date'] . '</p>';
//		if($round['match_round_video_id'] > 0)
		{
			echo '<a href="'. BASE_URL. 'match/video.php?video_id=' . $round['match_round_video_id'] . '">视频</a>';
		}

		echo '<h3> 比赛点评 </h3>';
		echo $round['match_round_comment'];
	}
}

?>


<div id="content">
	<div class="main">

		<img src=<?php echo $match->tournament_icon?> />

		<div>
			<label> 
					<a href="team.php?team_id=<?php echo $match->match_red_id ?>"><img src="<?php echo $match->match_red_icon?>"></a> 
					VS
					<a href="team.php?team_id=<?php echo $match->match_purple_id ?>"><img src="<?php echo $match->match_purple_icon?>"></a> 
			</label>
		</div>
		
		<div>
			<label>队伍: <?php echo $match->match_red_name ?> VS  <?php echo $match->match_purple_name?> </label>
		</div>

		<div>
			<label>比分: <?php echo $match->match_red_score ?> VS  <?php echo $match->match_purple_score?> </label>
		</div>
		
		<div>
			<label>支持率: <?php echo $match->match_red_support?> VS  <?php echo $match->match_purple_support?> </label>
		</div>
		
		<div>
			<label>时间: <?php echo $match->match_date ?> </lable>
		</div>
		
		<div>
			<label>直播链接: <?php echo $match->match_live ?> </label>
		</div>

		<div>
			<?php show_match_round() ?>	
		</div>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

