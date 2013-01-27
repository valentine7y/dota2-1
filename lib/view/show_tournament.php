<?php

function show_tournament_prize()
{
	global $tournament;

	foreach($tournament->tournament_prize as $prize)
	{
		echo '<li>';
		if($prize['tournament_prize_team_id'] > 0)
		{
			echo '<label>' . $prize['tournament_prize_name'] . $prize['tournament_prize_num'] . '</label>';
			echo '<a href="team.php?team_id=' . $prize['tournament_prize_team_id'] . '"> <img src="' . $prize['tournament_prize_team_icon'] . '">'
				. $prize['tournament_prize_team_name'] . '</a>';
		}
		else
		{
			echo '<label>' . $prize['tournament_prize_name'] . $prize['tournament_prize_num'] . '</label>';
			echo '<img src="http://rnimg.cn/match/images/flag/0.gif">';
		}
		echo '</li>';
	}
}


function show_tournament_team()
{
	global $tournament;
	foreach($tournament->tournament_team as $team)
	{
		echo '<li>';
		echo '<a href="team.php?team_id='. $team['team_id'] . '" target="_blank">' . '<img src="' . $team['team_icon'] . '"> ';
		echo '<h3>' . '<img src="http://rnimg.cn/match/images/flag/1.gif" alt="">' . $team['team_name'] . '</h3>';
		echo '</a>';
		echo '</li>';
	}
}

function show_tournament_group()
{
	global $tournament;
	foreach($tournament->tournament_group as $group)
	{
		echo '<li>';
		echo '分组:';
		foreach($group as $key=>$value)
		{
			echo '<a href="team.php?team_id='. $value['team_id'] .  '"target="_blank">'. '<img src="' . $value['team_icon'] . '">';
			echo '</a>';
		}
		echo '</li>';
	}
}

?>

<div id="content">
	<div class="main">

		<img src=<?php echo $tournament->tournament_icon?> />

		<h1> <?php echo $tournament->tournament_name?></h1>
		
		<div>
			<label>联赛全称:</label> <?php echo $tournament->tournament_fullname?>
		</div>
		
		<div>
			<label>联赛类型:</label> <?php echo $tournament->tournament_type_name?>
		</div>

		<div>
			<label>所在国家:</label> <?php echo $tournament->tournament_country ?>
		</div>
		
		<div>
			<label>所在城市</label> <?php echo $tournament->tournament_city?>
		</div>

		<div>
			<label>开始时间</label> <?php echo $tournament->tournament_date_begin ?>
			<label>结束时间</label> <?php echo $tournament->tournament_date_end ?>
		</div>
		
		<div>
			<label>简介</label> <?php echo $tournament->tournament_desc ?>
		</div>

		<div>
			<div>
				<a href="add_tournament_team.php?tournament_id=<?php echo $tournament->tournament_id?>">添加参赛队伍</a>
			</div>

			<div>
				<a href="add_tournament_prize.php?tournament_id=<?php echo $tournament->tournament_id?>">添加参赛奖金</a>
			</div>
			
		</div>
	</div> <!-- main -->


	<div class="aside">
		<div id="tournament_prize">
			<div>
				<h3> 奖金 </h3>
			</div>
			<div>
				<ul>
					<?php show_tournament_prize(); ?>
				</ul>
			</div>
		</div>

		<div id="tournament_team">
			<div>
				<h3>参赛队伍</h3>
			</div>
			<div>
				<ul>
					<?php show_tournament_team(); ?>
				</ul>
			</div>
		</div>

		<div id="tournament_group">
			<div>
				<h3>分组</h3>
			</div>
			<div>
				<ul>
					<?php show_tournament_group(); ?>
				</ul>
			</div>
		</div>

	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

