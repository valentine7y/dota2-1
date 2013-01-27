
<div id="content">
	<div class="main">
		<h1> 添加联赛队伍 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<input id="tournament_id" name="tournament_id" type="hidden" maxlength="64" value=<?php echo $_GET['tournament_id']?> />	
			</div>
			
			<div>
				<label for="tournament_group_id">分组id</label>
				<input id="tournament_group_id" name="tournament_group_id" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="team_id">队伍id</label>
				<input id="team_id" name="team_id" type="text" maxlength="128" />	
			</div>
			
			<div>
				 <input type="submit" value="提交" name="tournament_team_submit">
			</div>
		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

