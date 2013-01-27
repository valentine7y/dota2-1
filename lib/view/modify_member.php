
<?php

function show_zone_list()
{
	global $zone_list;
	global $member;
	foreach($zone_list as $key => $value)
	{
		if($member->member_account_zone == $key)
		{
			echo '<option value="'. $key. '" selected="selected">' . $value. '</option>"';
		}
		else
		{
			echo '<option value="'. $key. '">' . $value. '</option>"';
		}
	}
}

function show_position_list()
{
	global $position_list;
	global $member;
	foreach($position_list as $key => $value)
	{
		if($member->member_position == $key)
		{
			echo '<option value="'. $key. '" selected="selected">' . $value. '</option>"';
		}
		else
		{
			echo '<option value="'. $key. '">' . $value. '</option>"';
		}
	}
}

?> 

<div id="content">
	<div class="main">
		<h1> 修改队员资料 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<input id="member_id" name="member_id" type="hidden" value="<?php echo $member->member_id ?>" />

			<div>
				<label for="team_id">战队id</label>
				<input id="team_id" name="team_id" type="text" maxlength="8" value="<?php echo $member->team_id?>" />	
			</div>

			<div>
				<label for="member_name">队员名称</label>
				<input id="member_name" name="member_name" type="text" maxlength="64" value="<?php echo $member->member_name?>"/>	
			</div>
			
			<div>
				<label for="member_match_name">比赛ID</label>
				<input id="member_match_name" name="member_match_name" type="text" maxlength="64" value="<?php echo $member->member_match_name?>" />	
			</div>
			
			<div>
				<label for="member_rname">队员姓名</label>
				<input id="member_rname" name="member_rname" type="text" maxlength="64" value="<?php echo $member->member_rname?>"/>	
			</div>
			
			<div>
				<label for="member_ename">队员英文名</label>
				<input id="member_ename" name="member_ename" type="text" maxlength="64" value="<?php echo $member->member_ename?>"/>	
			</div>
			
			
			<div>
				<label for="member_pic">队员头像</label>
				<input id="member_pic" name="member_pic" type="text" maxlength="64" value="<?php echo $member->member_pic ?>" />	
			</div>

			<div>
				<label for="member_account_zone">账号所在区</label>
				<select name="member_account_zone" id="member_account_zone"> 
					<?php show_zone_list() ?>
				</select>
				
				<label for="member_account_name">账号名字</label>
				<input id="member_account_name" name="member_account_name" type="text" maxlength="64" 
						value="<?php echo $member->member_account_name?>" />	
				
				<label for="member_position">主打位置</label>
				<select name="member_position" id="member_position" >
					<?php show_position_list() ?>
				</select>
			</div>
			
			<div>
				<label for="member_weibo">队员微博</label>
				<input id="member_weibo" name="member_weibo" type="text" maxlength="64" 
						value="<?php echo $member->member_weibo ?>" />	
			</div>
			
			<div>
				<label for="member_desc">队员描述</label>
				<textarea id="member_desc" name="member_desc" maxlength="2048"><?php echo $member->member_desc ?></textarea>	
			</div>

			<div>
				 <input type="submit" value="提交" name="member_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

