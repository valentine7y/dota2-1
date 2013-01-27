
<div id="content">
	<div class="main">
		<h1> 添加比赛 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="tournament_id">赛事id</label>
				<input id="tournament_id" name="tournament_id" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="match_red_id">红方队伍id</label>
				<input id="match_red_id" name="match_red_id" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="match_purple_id">紫方队伍id</label>
				<input id="match_purple_id" name="match_purple_id" type="text" maxlength="64" />	
			</div>

			<div>
				<label for="match_date">比赛时间</label>
				<input id="match_date" name="match_date" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="match_round_count">比赛轮数</label>
				<input id="match_round_count" name="match_round_count" type="text" maxlength="64" />	
			</div>

			<div>
				<label for="match_live">比赛直播地址</label>
				<input id="match_live" name="match_live" type="text" maxlength="128" />	
			</div>

			<div>
				 <input type="submit" value="提交" name="match_submit">
			</div>
		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

