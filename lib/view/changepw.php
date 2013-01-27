
<h1> 修改密码 </h1>
<form action="changepw.php" method="post">

	<div class="item">
		<label for="old_passwd">旧密码: </label>
		<input name="old_passwd" maxlength="20" type="password" id="old_passwd" />
		<span class="item_desc" id="oldpwd_desc"></span>
	</div>
	
	<div class="item">
		<label for="new_passwd1">新密码: </label>
		<input name="new_passwd1" maxlength="20" type="password" id="new_passwd1" />
		<span class="item_desc" id="newpwd1_desc"></span>
	</div>
	
	<div class="item">
		<label for="new_passwd2">确认新密码: </label>
		<input name="new_passwd2" maxlength="20" type="password" id="new_passwd2" />
		<span class="item_desc" id="newpwd2_desc"></span>
	</div>
			
	<div>
			<input type="submit" value="确定" name="submit" id="submit" />
	</div>
	

</form>
