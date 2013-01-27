
<div id="content">
	<div class="main">

		<img src=<?php echo $member->member_pic?> />

		<h1> <?php echo $member->member_name ?></h1>
		<div>
			<a href="./modify_member.php?member_id=<?php echo $member->member_id?>">修改资料</a>
		</div>

		<div>
			<label>姓名</label>: <?php echo $member->member_rname ?>
		</div>
		
		<div>
			<label>比赛ID</label>: <?php echo $member->member_match_name ?>
		</div>
		
		<div>
			<label>所属战队</label>: <?php echo $member->team_name?>
		</div>
		
		<div>
			<label>生日</label>: <?php echo $member->member_birthday ?>
		</div>
		
		<div>
				<label>所在大区 </label>: <?php echo $member->member_account_zonename?>
				<label>账号</label>: <?php echo $member->member_account_name?>
		</div>
		<div>
			<label>主打位置</label>: <?php echo $member->member_position_name?>
		</div>

		<div>
			<label>简介</label>: <?php echo $member->member_desc ?>
		</div>
		
		<div>
			<label>微博</label>: <a href="<?php echo $member->member_weibo ?>"><?php echo $member->member_weibo ?></a>
		</div>
		
		<iframe id="question" src="http://lolbox.duowan.com/playerDetail.php?serverName=<?php echo $member->member_account_zone?>
	&playerName=<?php echo $member->member_account_name?>"  border="0" vspace="0" hspace="0" marginwidth="0" marginheight="0" framespacing="0" frameborder="0" scrolling="no" width="650" height="490" ></iframe>

		
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->
