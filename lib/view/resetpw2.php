
<form id="restpw_form" method="POST" action="resetpw_form.php">
	<div>
		<label for="new_passwd1">新密码: </label>
		<input name="new_passwd1" maxlength="20" type="password" id="new_passwd1" />
		<span class="item_desc" id="new_passwd1_desc"></span>
	</div>
	
	<div>
		<label for="new_passwd2">确认密码: </label>
		<input name="new_passwd2" maxlength="20" type="password" id="new_passwd2" />
		<span class="item_desc" id="new_passwd2_desc"></span>
	</div>

	<div>
			<input type="submit" value="重置密码" name="reset_submit" id="reset_submit" />
	</div>

</form>

