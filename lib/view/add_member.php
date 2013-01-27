<?php

function show_zone_list()
{
	global $zone_list;
	foreach($zone_list as $key => $value)
	{
		echo '<option value="'. $key. '">' . $value. '</option>"';
	}
}

function show_position_list()
{
	global $position_list;
	global $member;
	foreach($position_list as $key => $value)
	{
		echo '<option value="'. $key. '">' . $value. '</option>"';
	}
}


?> 

<div id="content">
	<div class="main">
		<h1> 添加队员 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="basic-form">
			<div class="field">
				<label for="team_id" class="field-label">战队id</label>
				<input id="team_id" name="team_id" type="text" class="basic-input" maxlength="8" />	
			</div>

			<div class="field">
				<label for="member_name" class="field-label">队员名字</label>
				<input id="member_name" name="member_name" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				 <label for="member_match_name" class="field-label">比赛ID</label>
				<input id="member_match_name" name="member_match_name" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="member_rname" class="field-label">队员真名</label>
				<input id="member_rname" name="member_rname" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="member_ename" class="field-label">队员英文名</label>
				<input id="member_ename" name="member_ename" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			
			<div class="field">
				<label for="member_pic" class="field-label">队员头像</label>
				<input id="member_pic" name="member_pic" type="text" class="basic-input" maxlength="128" />	
			</div>

			<div class="field">
				<label for="member_account_zone" class="field-label">账号所在区</label>
				<select name="member_account_zone" id="member_account_zone">
				<?php show_zone_list() ?>
				</select>
			</div>
			
			<div class="field">	
				<label for="member_account_name" class="field-label">账号名字</label>
				<input id="member_account_name" name="member_account_name" type="text" class="basic-input" maxlength="64" />	
			</div>
				
			<div class="field">
				<label for="member_position" class="field-label">主打位置</label>
				<select name="member_position" id="member_position">
					<?php show_position_list() ?>
				</select>
			</div>
			
			<div class="field">
				<label for="member_weibo" class="field-label">队员微博</label>
				<input id="member_weibo" name="member_weibo" type="text" class="basic-input" maxlength="64" />	
			</div>
			
			<div class="field">
				<label for="member_desc" class="field-label">队员描述</label>
				<textarea id="member_desc" name="member_desc" class="basic-textarea" maxlength="2048" ></textarea>	
			</div>

			<div class="form-submit">
				 <input type="submit" value="提交" name="member_submit" class="form-submit-btn">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

