
<div id="content">
	<div class="main">
		<h1> 修改队伍资料 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<input id="team_id" name="team_id" type="hidden" value="<?php echo $team->team_id ?>" />
			<div>
				<label for="team_name">队伍名称</label>
				<input id="team_name" name="team_name" type="text" maxlength="64" value="<?php echo $team->team_name?>"/>	
			</div>
			
			<div>
				<label for="team_nickname">队伍简称</label>
				<input id="team_nickname" name="team_nickname" type="text" maxlength="64" value="<?php echo $team->team_nickname?>" />	
			</div>
			
			<div>
				<label for="team_icon">队伍图标</label>
				<input id="team_icon" name="team_icon" type="text" maxlength="64" value="<?php echo $team->team_icon?>" />	
			</div>
			
			<div>
				<label for="team_country">队伍国籍</label>
				<input id="team_country" name="team_country" type="text" maxlength="16" value="<?php echo $team->team_country?>"/>	
			</div>
			
			<div>
				<label for="team_city">队伍城市</label>
				<input id="team_city" name="team_city" type="text" maxlength="16" value="<?php echo $team->team_country?>" />	
			</div>
			
			<div>
				<label for="team_desc">队伍描述</label>
				<textarea id="team_desc" name="team_desc" maxlength="2048" ><?php echo $team->team_desc ?></textarea>	
			</div>
			
			<div>
				<label for="team_weibo">队伍微博</label>
				<input id="team_weibo" name="team_weibo" type="text" maxlength="64" value="<?php echo $team->team_weibo?>" />	
			</div>
			
			<div>
				<label for="team_createtime">创建日期</label>
				<input id="team_createtime" name="team_createtime" type="text" maxlength="24" value="<?php echo $team->team_createtime?>"/>	
			</div>

			<div>
				 <input type="submit" value="提交" name="team_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

