
<?php

function show_team_member()
{
	global $team;
	foreach($team->team_member as $member)
	{
		echo '<li>';
		echo '<a href="' . BASE_URL. 'match/member.php?member_id=' . $member['member_id'] . '" target="_blank"> <img src="' .
			$member['member_pic'].  '" /> </a>';
		echo '<h3>' . $member['member_name'] . '</h3>';
		echo '</li>';
	}
}

?>

<div id="content">
	<div class="main">

		<img src=<?php echo $team->team_icon ?> />

		<h1> <?php echo $team->team_name ?></h1>

		<div>
			<a href="./modify_team.php?team_id=<?php echo $team->team_id; ?>">修改资料</a>
		</div>

		<div>
			<label>战队全名</label>: <?php echo $team->team_nickname ?>
		</div>

		<div>
			<label>所属国家</label>: <?php echo $team->team_country?>
		</div>

		<div>
			<label>所在城市</label>: <?php echo $team->team_city?>
		</div>
		
		<div>
			<label>队伍介绍</label>: <?php echo $team->team_desc?>
		</div>
		
		<div>
			<label>微博</label>: <a href="<?php echo $team->team_weibo?>"><?php echo $team->team_weibo ?></a>
		</div>
		
		<div>
			<label>队伍创建时间</label>: <?php echo $team->team_createtime?>
		</div>

		<div>
			<ul>
			<?php show_team_member() ?>
			</ul>
		</div>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->
