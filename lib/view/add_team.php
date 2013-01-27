
<div id="content">
	<div class="main">
		<h1> 添加队伍 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="basic-form">
			<div class="field">
				<label for="team_name" class="field-label">队伍名称:</label>
				<input id="team_name" name="team_name" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="team_fullname" class="field-label">队伍全称:</label>
				<input id="team_fullname" name="team_fullname" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="team_country" class="field-label">队伍国籍:</label>
				<input id="team_country" name="team_country" type="text" class="basic-input" maxlength="16" />	
			</div>
			
			<div class="field">
				<label for="team_desc" class="field-label">队伍描述:</label>
				<textarea id="team_desc" name="team_desc" class="basic-textarea" maxlength="2048" ></textarea>	
			</div>
			
			<div class="field">
				<label for="team_createtime" class="field-label">创建日期:</label>
				<input id="team_createtime" name="team_createtime" type="text" class="basic-input" maxlength="24" />	
			</div>

			<div class="field">
				<label for="team_weibo" class="field-label">队伍微博:</label>
				<input id="team_weibo" name="team_weibo" class="basic-input" type="text" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="team_yy" class="field-label">队伍YY:</label>
				<input id="team_yy" name="team_yy" class="basic-input" type="text" maxlength="64" />	
			</div>

			<div class="form-submit">
				 <input type="submit" value="提交" name="team_submit" class="form-submit-btn">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
		<h2> 创建职业战队 · · ·  </h2>
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

