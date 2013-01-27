
<div id="content">
	<div class="main">
		<h1> 添加比赛场次 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="match_id">比赛id</label>
				<input id="match_id" name="match_id" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="match_round_seq">比赛轮次</label>
				<select id="match_round_seq" name="match_round_seq">
					<option value="1">第一轮</option>
					<option value="2">第二轮</option>
					<option value="3">第三轮</option>
					<option value="4">第四轮</option>
					<option value="5">第五轮</option>
					<option value="6">第六轮</option>
					<option value="7">第七轮</option>
				</select>
			</div>
			
			<div>
				<label for="match_round_result">比赛结果</label>
				<select id="match_round_result" name="match_round_result">
					<option value="1">红方胜</option>
					<option value="2">紫方胜</option>
				</select>
			</div>
			
			<div>
				<label for="match_round_map">地图选择</label>
				<select id="match_round_map" name="match_round_map">
					<option value="1">红方上</option>
					<option value="2">红方下</option>
				</select>
			</div>

			<div>
				<label for="match_round_date">比赛时间</label>
				<input id="match_round_date" name="match_round_date" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="match_round_comment">比赛点评</label>
				<textarea id="match_round_comment" name="match_round_comment"></textarea>
			</div>

			<div>
				 <input type="submit" value="提交" name="match_round_submit">
			</div>
		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

