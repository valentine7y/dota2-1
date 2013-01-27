
<div id="content">
	<div class="main">
		<h1> 添加联赛 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="tournament_name">联赛名称</label>
				<input id="tournament_name" name="tournament_name" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="tournament_fullname">联赛全称</label>
				<input id="tournament_fullname" name="tournament_fullname" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="tournament_icon">联赛图标</label>
				<input id="tournament_icon" name="tournament_icon" type="text" maxlength="128" />	
			</div>

			<div>
				<label for="tournament_type">联赛类型</label>
				<select id="tournament_type" name="tournament_type">
					<option value="0">未知</option>
					<option value="1">线上</option>
					<option value="2">线下</option>
					<option value="3">混合</option>
				</select>
			</div>
			
			<div>
				<label for="tournament_country">所在国家</label>
				<input id="tournament_country" name="tournament_country" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="tournament_city">所在城市</label>
				<input id="tournament_city" name="tournament_city" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="tournament_date_begin">开始日期</label>
				<input id="tournament_date_begin" name="tournament_date_begin" type="text" maxlength="64" />	
				
				<label for="tournament_date_end">结束日期</label>
				<input id="tournament_date_end" name="tournament_date_end" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="tournament_desc">赛事描述</label>
				<textarea id="tournament_desc" name="tournament_desc" maxlength="2048" ></textarea>	
			</div>
			
			<div>
				 <input type="submit" value="提交" name="tournament_submit">
			</div>
		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

