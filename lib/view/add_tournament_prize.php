
<div id="content">
	<div class="main">
		<h1> 添加联赛队伍 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<input id="tournament_id" name="tournament_id" type="hidden" maxlength="64" value=<?php echo $_GET['tournament_id']?> />	
			</div>
			
			<div>
				<label for="tournament_prize_id">奖金id</label>
				<input id="tournament_prize_id" name="tournament_prize_id" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="tournament_prize_name">奖金名字</label>
				<input id="tournament_prize_name" name="tournament_prize_name" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="tournament_prize_num">奖金数量</label>
				<input id="tournament_prize_num" name="tournament_prize_num" type="text" maxlength="8" />	
			</div>
			
			
			<div>
				 <input type="submit" value="提交" name="tournament_prize_submit">
			</div>
		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

